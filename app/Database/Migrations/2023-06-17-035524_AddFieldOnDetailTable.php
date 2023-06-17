<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldOnDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('transaction_details', [
            'total' => [
                'type' => 'FLOAT',
            ],
            'qty' => [
                'type' => 'INT'
            ]
        ]);
        $this->forge->addColumn('transactions', [
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
