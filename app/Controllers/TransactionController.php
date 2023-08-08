<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use CodeIgniter\Files\File;
use App\Models\Item;

class TransactionController extends BaseController
{
    protected $itemModel;
    public function __construct()
    {
        $this->itemModel = new Item();
    }

    public function index()
    {
        $transactionModel = new Transaction();
        $data['transactions'] = $transactionModel->where('user_id', session()->get('id'))->findAll();
        return view('main/order', $data);

    }
    public function show($transaction_id)
    {
        $transactionDetailModel = new TransactionDetail();
        $transactionModel = new Transaction();
        $data['transaction_details'] = $transactionDetailModel->where('transaction_id', $transaction_id)
        ->join('items', 'items.id = transaction_details.item_id')
        ->findAll();
        $data['transaction'] = $transactionModel->find($transaction_id);
        return view('main/detail_order', $data);

    }
    function storeReceipt($transaction_id) {
        $file = $this->request->getFile('file');
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('./uploads', $file->getName());
            $transactionModel = new Transaction();
            $transactionModel->update($transaction_id, ['receipt' => $file->getName(), 'status' => 'checking']);
            return redirect('transaction');
        }
        return 'error';
        
    }
    public function store()
    {
        if (session()->get('id') === null) return redirect()->to('/signin');
        $transactionModel = new Transaction();
        $transactionModel->db->transStart();
        $cart = session()->get('cart');
        $session = session();
        if(empty($cart)){
            $session->setFlashdata('error', 'Keranjang kosong.');
            return redirect()->to('/cart');
        }
        $transactionData = [
            'user_id' => session()->get('id'),
            'reference_code' => time(),
            'grand_total' => 0, // Initialize the grand total to 0
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'status' => 'unpaid'
        ];
        $transactionModel->save($transactionData);
        $transactionId = $transactionModel->insertID();
        $totalPrice = 0;
        foreach ($cart as $item) {
            $x = $item['item'];
    
            $pricePerDay = $x['price_per_day'];
            $startDate = new \DateTime($item['start_date']);
            $endDate = new \DateTime($item['end_date']);
            $diffInDays = $startDate->diff($endDate)->days;
    
            $itemCount = $item['qty'];
    
            $subtotal = $pricePerDay * $diffInDays * $itemCount;
            $totalPrice += $subtotal;
    
            $itemid = $this->itemModel->find($x['id']);
    
            $dataitemModel = [
                'quantity_available' => $itemid['quantity_available'] - $item['qty'],
            ];
    
            $this->itemModel->update($x['id'], $dataitemModel);
    
            $transactionDetailModel = new TransactionDetail();
            $transactionDetails = [
                'transaction_id' => $transactionId,
                'item_id' => $x['id'],
                'qty' => $item['qty'],
                'price' => $x['price_per_day'],
                'total' => $subtotal,
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date'],
            ];
            $transactionDetailModel->save($transactionDetails);
            session()->set('cart', null);
        }
    
        // Update the grand_total in $transactionData with the calculated value
        $transactionData['grand_total'] = $totalPrice;
        $transactionModel->update($transactionId, $transactionData);
        $transactionModel->db->transComplete();
    
        return redirect()->to('/')->with('success', 'Transaction created successfully');
    }
    

}
