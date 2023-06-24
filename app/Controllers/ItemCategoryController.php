<?php

namespace App\Controllers;
use App\Models\ItemCategory;

use App\Controllers\BaseController;

class ItemCategoryController extends BaseController
{
    protected $model;
    public function __construct()
    {
        $this->model = new ItemCategory();
    }
    public function index()
    {
        $data['itemcategory'] = $this->model->findAll();
        return view('/admin/itemcategory/index',$data);
    }

    public function create()
    {
        return view('/admin/itemcategory/create');
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();
        $input = $this->validate([
            'name' => 'required'
        ]);

        if (!$input) {
            session()->setFlashdata(['error' => 'Data tidak valid!', 'validation' => $this->validator]);
            return redirect()->to('/itemcategory/create');
        }

        $data = [
            'name' => $postData['name']
        ];

        if ($this->model->insert($data)) {
            session()->setFlashdata('success', 'Berhasil');
            return redirect()->to('/itemcategory');
        } else {
            session()->setFlashdata('error', 'Gagal');
            return redirect()->to('/itemcategory/create');
        }
    }
    function edit($id) {
        $categoryModel = new ItemCategory();
        $category = $categoryModel->find($id);

        $data = [
            'category' => $category,
        ];

        return view('admin/itemcategory/edit', $data);
    }
    public function update()
{
    $categoryId = $this->request->getPost('category_id');
    $name = $this->request->getPost('name');

    // Validate the form data
    $validation = \Config\Services::validation();
    $validation->setRules([
        'name' => 'required',
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('error', $validation);
    }
    $data = [
        'name' => $name,
    ];
    $this->model->update($categoryId, $data);
    return redirect()->to('itemcategory/edit/' . $categoryId)->with('success', 'Item category updated successfully');
}

function destroy($id) {
     $category = $this->model->find($id);
     if (!$category) {
         return redirect()->back()->with('error', 'Gagal');
     }
     $this->model->delete($id);

     return redirect()->to('itemcategory')->with('success', 'Berhasil');
}

}
