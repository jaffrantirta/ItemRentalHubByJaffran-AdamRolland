<?php

namespace App\Controllers;

use App\Models\ItemCategory;
use App\Controllers\BaseController;

class ItemController extends BaseController
{
    public function index()
    {
        return view('/admin/item/index');
    }

    public function create()
    {
        $itemcategory = new ItemCategory();
        $data['itemcategory'] = $itemcategory->findAll();
        return view('/admin/item/create',$data);
    }
    public function store()
    {
        //
    }
}
