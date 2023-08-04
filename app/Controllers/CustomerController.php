<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Role;
use App\Models\User;

class CustomerController extends BaseController
{
    protected $model;
    protected $currentDateTime;
    protected $modelRoles;
    protected $db;
    public function __construct()
    {
        $this->model = new User();
        $this->modelRoles = new Role();
        $this->currentDateTime = date('Y-m-d H:i:s');
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $customerRole = $this->modelRoles->where('name', 'customer')->find();
        
        $customerRoleId = $customerRole[0]['id'] ?? null;

        $query = $this->db->table('user_roles')
        ->select('users.id, users.name, users.email')
        ->join('users', 'users.id = user_roles.user_id')
        ->where('user_roles.role_id', $customerRoleId);

        $result = $query->get()->getResultArray();

        $data = [
            'users' => $result,
        ];
        return view('/admin/customers/index', $data);
    }
}
