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
        $itemCategoryModel = new ItemCategory();

        // Retrieve the form input values
        $name = $this->request->getPost('name');

        // Prepare the data to be inserted
        $data = [
            'name' => $name,
        ];

        // Insert the data into the database
        $itemCategoryModel->insert($data);

        // Redirect to the desired page after successful insertion
        return redirect()->back();
    }

}
