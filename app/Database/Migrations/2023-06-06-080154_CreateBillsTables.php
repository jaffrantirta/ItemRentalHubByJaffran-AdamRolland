<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBillsTables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'transaction_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'payment_method_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'due_date' => [
                'type' => 'DATETIME'
            ],
            'amount' => [
                'type' => 'FLOAT'
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'payment_date' => [
                'type' => 'DATETIME'
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('payment_method_id', 'payment_methods', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bills');
    }

    public function down()
    {
        $this->forge->dropTable('bills');
    }
}
