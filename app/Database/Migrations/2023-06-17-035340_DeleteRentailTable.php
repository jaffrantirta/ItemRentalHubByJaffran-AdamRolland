<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeleteRentailTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('rentals');
    }

    public function down()
    {
        //
    }
}
