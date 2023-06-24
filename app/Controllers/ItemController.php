<?php

namespace App\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Controllers\BaseController;

class ItemController extends BaseController
{
    protected $model;
    protected $itemCategoryModel;
    protected $currentDateTime;
    public function __construct()
    {
        $this->model = new Item();
        $this->itemCategoryModel = new ItemCategory();
        $this->currentDateTime = date('Y-m-d H:i:s');
    }
    public function index()
    {
        $data['items'] = $this->model->findAll();
        return view('/admin/item/index', $data);
    }

    public function create()
    {
        $data['itemcategory'] = $this->itemCategoryModel->findAll();
        return view('/admin/item/create',$data);
    }
    public function store()
    {
        $validation = \Config\Services::validation();
        
        // Set validation rules
        $validation->setRules([
            'name' => 'required',
            'id_category' => 'required',
            'description' => 'required',
            'price_per_day' => 'required|numeric',
            'quantity_available' => 'required|integer',
            'image' => 'uploaded[image]|max_size[image,2048]|mime_in[image,image/jpeg,image/png]'
        ]);

        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            // dd($validation->getErrors());
        }

        // Get validated form data
        $data = [
            'name' => $this->request->getPost('name'),
            'id_category' => $this->request->getPost('id_category'),
            'description' => $this->request->getPost('description'),
            'price_per_day' => $this->request->getPost('price_per_day'),
            'quantity_available' => $this->request->getPost('quantity_available'),
            'created_at' => $this->currentDateTime,
            'updated_at' => $this->currentDateTime
        ];

        // Upload image if provided
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move('./uploads', $newName);
            $data['image'] = $newName;
        }

        // Insert data into the database
        $this->model->insert($data);

        return redirect()->to('item')->with('success', 'Berhasil');
    }

}
