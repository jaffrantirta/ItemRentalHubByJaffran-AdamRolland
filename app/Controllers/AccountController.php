<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AccountController extends BaseController
{
    public function index()
    {
        return view('main/account');
    }
}
