<?php

namespace App\Controllers;
use App\Models\Item;
use App\Models\ItemCategory;

class HomeController extends BaseController
{
    public function index()
    {
        $itemModel = new Item();
        $itemCategoryModel = new ItemCategory();

        $data['items'] = $itemModel->findAll();
        $data['categories'] = $itemCategoryModel->findAll();
        
        return view('main/home', $data);
    }
    public function showDetailItem($itemId)
    {
        $itemModel = new Item();
        $data['item'] = $itemModel->find($itemId);
        return view('main/detail_item', $data);
    }
}
