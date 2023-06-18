<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldInTransactiosnsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transactions', [
            'receipt' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
