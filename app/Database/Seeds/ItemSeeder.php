<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        for($i=0; $i<20; $i++) {
            $faker = \Faker\Factory::create();
            $data = [
                'id_category' => random_int(1,10),
                'name' => $faker->name,
                'description' => $faker->text,
                'price_per_day' => random_int(1000, 10000000),
                'quantity_available' => random_int(0, 20),
                'image' => $faker->imageUrl
            ];
             $this->db->table('items')->insert($data);
        }
    }
}
