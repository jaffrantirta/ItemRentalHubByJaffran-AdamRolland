<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemsCategorySeeder extends Seeder
{
    public function run()
    {
        for($i=0; $i<10; $i++) {
        $faker = \Faker\Factory::create();
        $data = [
            'name' => $faker->name,
        ];
         $this->db->table('items_category')->insert($data);
    }
    }
}
