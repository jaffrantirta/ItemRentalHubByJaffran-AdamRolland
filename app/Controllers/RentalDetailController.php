<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RentalDetailController extends BaseController
{
    public function index()
    {
        return view('/admin/rentaldetail/index');
    }
}
