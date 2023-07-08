<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Item;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\UserRole;

class ProfileController extends BaseController
{
    protected $modelItem;
    protected $modelTransactions;
    protected $modelUserRoles;
    protected $modelRoles;
    protected $currentDateTime;
    public function __construct()
    {
        $this->modelItem = new Item();
        $this->modelTransactions = new Transaction();
        $this->modelUserRoles = new UserRole();
        $this->modelRoles = new Role();
        $this->currentDateTime = date('Y-m-d H:i:s');
    }
    public function index()
    {

        $customerRole = $this->modelRoles->where('name', 'customer')->find();
        
        $customerRoleId = $customerRole[0]['id'] ?? null;

        $data['items'] = $this->modelItem->countAllResults();
        $data['transactions'] = $this->modelTransactions->countAllResults();
        $data['customers'] = $this->modelUserRoles->where('role_id', $customerRoleId)->countAllResults();
        $data['transactionsNeedChecks'] = $this->modelTransactions->where('status', 'checking')->findAll();

        $session = session();
        $name = $session->get('name');
        return view('/admin/home', $data);
        // echo "Hello : " . $session->get('name');
    }
}
