<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\Role;

class AssignRoleCommand extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'insert:role';
    protected $description = 'Create a new role in the roles table.';

    public function run(array $params)
    {
        $roleModel = new Role();

        $roleModel->insert(['name' => 'super-admin']);
        $roleModel->insert(['name' => 'admin']);
        $roleModel->insert(['name' => 'customer']);

        CLI::write('Roles created successfully!', 'green');
    }
}
