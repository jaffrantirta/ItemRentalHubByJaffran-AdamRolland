<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AccountController extends BaseController
{
    protected $model;
    protected $currentDateTime;
    public function __construct()
    {
        $this->model = new User();
        $this->currentDateTime = date('Y-m-d H:i:s');
    }
    public function index()
    {
        return view('main/account');
    }
    public function adminAccount()
    {
        $data['user'] = $this->model->find(session()->get('id'));
        return view('admin/account/index', $data);
    }
    function update() {
        // Save the updated user data
        $this->model->update(session()->get('id'), [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'updated_at' => $this->currentDateTime
        ]);

        // Redirect to the profile page or any other appropriate page
        return redirect()->back()->with('success', 'Berhasil diedit');
    }
}
