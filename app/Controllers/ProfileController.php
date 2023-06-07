<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        $name = $session->get('name');
        return view('/admin/home');
        // echo "Hello : " . $session->get('name');
    }
}
