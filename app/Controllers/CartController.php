<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Item;

class CartController extends BaseController
{
    public function index()
    {
        $data['cart'] = session()->get('cart') ?? [];
        return view('main/cart', $data);
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

        $item = (new Item())->find(request()->getPost('item_id'));
        
        $item = $item;
        $qty = request()->getPost('qty');
        $start_date = request()->getPost('start_date');
        $end_date = request()->getPost('end_date');
        
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
            'item' => $item,
            'qty' => $qty,
            'start_date' => $start_date,
            'end_date' => $end_date
        ];
        $cart[] = $newItem;

        // Save the updated cart back to the session
        $session->set('cart', $cart);

        return redirect('cart');
    }
}
