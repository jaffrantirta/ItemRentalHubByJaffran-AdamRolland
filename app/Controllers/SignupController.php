<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class SignupController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('auths/signup', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'phone'          => 'required|min_length[8]|max_length[20]|is_unique[users.phone]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new User();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'phone'    => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);

            // Get the user ID of the latest saved user
    $userId = $userModel->insertID();

    //get role customer
    $roleModel = new Role();
    $role = $roleModel->where('name', 'customer')->first();

    // Save the user role
    $userRoleModel = new UserRole();
    $userRoleData = [
        'user_id' => $userId,
        'role_id' => $role->id
    ];
    $userRoleModel->save($userRoleData);

    return redirect()->to('/signin');
            return redirect()->to('/signin');
        } else {
            $data['validation'] = $this->validator;
            echo view('auths/signup', $data);
        }
    }
}
