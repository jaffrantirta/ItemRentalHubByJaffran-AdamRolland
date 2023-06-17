<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePrice extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaction_details', [
            'price' => [
                'type' => 'FLOAT',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
