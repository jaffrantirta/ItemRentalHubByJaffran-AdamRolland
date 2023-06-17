<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateNew extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('transaction_details', [
            'rental_id' => [
                'name' => 'item_id',
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        //
    }
}
