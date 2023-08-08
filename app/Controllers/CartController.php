<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Item;

class CartController extends BaseController
{
    public function index()
    {
        $data['cart'] = session()->get('cart') ?? [];
        // dd($data);
        return view('main/cart', $data);
    }
    public function addToCart()
    {
        $rules = [
            'item_id' => 'required',
            'qty' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];

        if (!$this->validate($rules)) {
            return 'semua bidang harus diisi!';
        }

        $item = (new Item())->find(request()->getPost('item_id'));
        $identifier = $item['id']; // Use the item ID as the identifier
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

        // Check if the item already exists in the cart
        $existingItemIndex = null;
        foreach ($cart as $index => $cartItem) {
            if ($cartItem['identifier'] === $identifier) {
                $existingItemIndex = $index;
                break;
            }
        }

        // If the item already exists in the cart, update the quantity
        if ($existingItemIndex !== null) {
            $cart[$existingItemIndex]['qty'] += $qty;
        } else {
            // Otherwise, add the new item to the cart
            $newItem = [
                'item' => $item,
                'identifier' => $identifier,
                'qty' => $qty,
                'start_date' => $start_date,
                'end_date' => $end_date
            ];
            $cart[] = $newItem;
        }

        // Save the updated cart back to the session
        $session->set('cart', $cart);

        return redirect('cart');
    }

    public function removeFromCart($identifier)
    {
        // Load the session library (if not already loaded)
        $session = session();

        // Get the current cart from session
        $cart = $session->get('cart');

        // Check if the cart is empty or the item does not exist
        if (empty($cart)) {
            return redirect()->to('cart');
        }

        // Check if the item exists in the cart
        $itemIndex = null;
        foreach ($cart as $index => $cartItem) {
            if ($cartItem['identifier'] === $identifier) {
                $itemIndex = $index;
                break;
            }
        }

        // If the item exists, remove it from the cart
        if ($itemIndex !== null) {
            unset($cart[$itemIndex]);

            // Save the updated cart back to the session
            $session->set('cart', $cart);
        }

        return redirect()->to('cart');
    }
}
