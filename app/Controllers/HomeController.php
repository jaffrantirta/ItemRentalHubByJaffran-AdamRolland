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
    public function addToCart()
    {
        $rules = [
            'item_id' => 'required',
            'qty' => 'required',
            'start_date' => 'required|date',
            'end_date'    => 'required|date',
        ];

        if (!$this->validate($rules)) {
            return 'semua bidang harus diisi!';
        }

        
        $item_id = $this->request->getPost('item_id');
        $qty = $this->request->getPost('qty');
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        
        // Load the session library (if not already loaded)
        $session = session();

        // Get the current cart from session (if exists)
        $cart = $session->get('cart');

        // Check if the cart is empty or not
        if (empty($cart)) {
            // If the cart is empty, initialize a new empty array
            $cart = [];
        }

        // Add the new item to the cart
        $newItem = [
            'item_id' => $item_id,
            'qty' => $qty,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
        $cart[] = $newItem;

        // Save the updated cart back to the session
        $session->set('cart', $cart);

        return redirect('home');
    }
}
