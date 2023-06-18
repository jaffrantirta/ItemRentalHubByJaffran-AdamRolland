<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class SigninController extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('auths/signin');
    }

    public function loginAuth()
{
    $session = session();
    $userModel = new User();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    // Retrieve the user with roles
    $user = $userModel->where('email', $email)
    ->join('user_roles', 'user_roles.user_id = users.id')
    ->join('roles', 'roles.id = user_roles.role_id')
    ->select('users.*, roles.name as role_name')
    ->first();

    if ($user) {
        $pass = $user['password'];
        $authenticatePassword = password_verify($password, $pass);

        if ($authenticatePassword) {
            $ses_data = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'isLoggedIn' => true,
                'role' => $user['role_name']
            ];

            $session->set($ses_data);
            if($user['role_name'] === 'customer'){
                return redirect()->to('/home');
            }else{
                return redirect()->to('/profile');
            }
        } else {
            $session->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to('/signin');
        }
    } else {
        $session->setFlashdata('msg', 'Email does not exist.');
        return redirect()->to('/signin');
    }
}
function logout() {
    session()->destroy();
    return redirect('signin');
    
}

}
