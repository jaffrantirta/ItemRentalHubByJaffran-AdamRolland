<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Item extends BaseController
{
    public function index()
    {
        return view('/admin/item/index');
    }
}
