<?php

namespace App\Controllers;
use App\Models\ItemCategory;

use App\Controllers\BaseController;

class ItemCategoryController extends BaseController
{
    public function index()
    {
        $itemcategory = new ItemCategory();
        $data['itemcategory'] = $itemcategory->findAll();
        return view('/admin/itemcategory/index',$data);
    }

    public function create()
    {
        return view('/admin/itemcategory/create');
    }

    public function store()
    {
        // Mengambil data yang di post oleh user
        $request = service('request');
        $postData = $request->getPost();
// var_dump($postData['name']);
// die();
        $input = $this->validate([
            'name' => 'required'
        ]);

        if (!$input) {
            // Tampilkan bila ada masalah
            session()->setFlashdata(['message' => 'Data tidak valid!', 'validation' => $this->validator]);
            session()->setFlashdata('alert-class', 'alert-danger');

            return redirect()->to(base_url('/itemcategory/create'));
        }

        $itemcategpry = new ItemCategory();
        // Data yang akan di masukkan ke database
        $data = [
            'name' => $postData['name']
        ];

        if ($itemcategpry->insert($data)) {
            // Bila berhasil
            session()->setFlashdata('message', 'Data berhasil disimpan!');
            session()->setFlashdata('alert-class', 'alert-success');

            return redirect()->to(base_url('/itemcategory'));
        } else {
            // bila gagal
            session()->setFlashdata('message', 'Data gagal disimpan!');
            session()->setFlashdata('alert-class', 'alert-danger');
            return redirect()->to(base_url('/itemcategory/create'));
        }
    }

}
