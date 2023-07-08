<?php

namespace App\Database\Seeds;

use App\Models\Role;
use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $customerRole = $this->db->table('roles')->where('name', 'admin')->get()->getRow();
        $adminRoleId = $customerRole ? $customerRole->id : null;

        for ($i = 0; $i < 20; $i++) {
            $faker = \Faker\Factory::create();
            $phone = $faker->phoneNumber();
            $data = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'phone' => $phone,
                'password' => password_hash($phone, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('users')->insert($data);
            $userId = $this->db->insertID();
            $userRoleData = [
                'user_id' => $userId,
                'role_id' => $adminRoleId,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->table('user_roles')->insert($userRoleData);
        }

    }
}
