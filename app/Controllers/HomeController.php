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
        $data['item'] = $itemModel->join('items_category', 'items_category.id = items.id_category')
        ->select('items.*, items_category.name as category_name, items_category.id as category_id')
        ->find($itemId);
        $data['items'] = $itemModel->where('id_category', $data['item']['category_id'])->limit(10)->find();
        return view('main/detail_item', $data);
    }
}
