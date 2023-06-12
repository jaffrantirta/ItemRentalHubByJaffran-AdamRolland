<?php

namespace App\Controllers;
use App\Models\Item;

class HomeController extends BaseController
{
    public function index()
    {
        return view('main/home');
    }
    public function showDetailItem($itemId)
    {
        $itemModel = new Item();
        $item = $itemModel->find($itemId);
        return view('main/detail_item', ['item' => $item]);
    }
}
