<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RentalDataController extends BaseController
{
    public function index()
    {
        return view('/admin/rentaldata/index');
    }
}
