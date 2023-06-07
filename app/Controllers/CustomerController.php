<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function index()
    {
        return view('/admin/customers/index');
    }
}
