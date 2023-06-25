<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaction;

class RentalDataController extends BaseController
{
    protected $model;
    protected $currentDateTime;
    public function __construct()
    {
        $this->model = new Transaction();
        $this->currentDateTime = date('Y-m-d H:i:s');
    }
    public function index()
    {
        $data['transactions'] = $this->model->findAll();
        return view('/admin/rentaldata/index', $data);
    }
    function show($id) {
        $data['transaction_details'] = $this->model->getTransactionDetails($id);
        $data['transaction'] = $this->model->find($id);
        // dd($data);
        return view('/admin/rentaldetail/index', $data);
    }
    function action() {
        $action = $this->request->getPost('action');
        $transactionId = $this->request->getPost('transaction_id');
        if ($action === 'confirm') {
            $this->model->update($transactionId, ['status' => 'confirm']);
            return redirect()->back()->with('success', 'Pesanan terkonfirmasi');
        }else if($action === 'reject'){
            $this->model->update($transactionId, ['status' => 'rejected']);
            return redirect()->back()->with('success', 'Pesanan ditolak');
        }else if($action === 'return'){
            $this->model->update($transactionId, ['status' => 'returned']);
            return redirect()->back()->with('success', 'Pesanan dikembalikan');
        }else{
            return redirect()->back()->with('error', 'Aksi tidak valid');
        }
    }
}
