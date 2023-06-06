<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneInUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'email',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'phone');
        $this->forge->dropColumn('users', 'created_at');
        $this->forge->dropColumn('users', 'updated_at');
    }
}
