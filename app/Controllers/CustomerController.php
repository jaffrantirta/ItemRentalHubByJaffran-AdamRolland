<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class CustomerController extends BaseController
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
         // Fetch the list of users from the model
         $users = $this->model->findAll();

         // Pass the user data to the view
         $data = [
             'users' => $users,
         ];
        return view('/admin/customers/index', $data);
    }
}
