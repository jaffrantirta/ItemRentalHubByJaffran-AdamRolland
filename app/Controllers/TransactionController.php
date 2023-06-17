<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionController extends BaseController
{
    public function index()
    {
        
    }
    public function store()
{
    if(session()->get('id') === null) return redirect()->to('/signin');
    $transactionModel = new Transaction();
    $transactionModel->db->transStart();
            $transactionData = [
                'user_id' => session()->get('id'),
                'reference_code' => time(),
                'grand_total' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 'unpaid'
            ];
            $transactionModel->save($transactionData);
            $transactionId = $transactionModel->insertID();
    $cart = session()->get('cart');
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
        $transactionModel->db->transComplete();
        session()->set('cart', null);
    }

    return redirect()->to('/home')->with('success', 'Transaction created successfully');
}

}
