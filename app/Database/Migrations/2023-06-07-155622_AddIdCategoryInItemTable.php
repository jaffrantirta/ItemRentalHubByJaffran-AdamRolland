<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIdCategoryInItemTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('items', [
            'id_category' => [
                'type' => 'INT',
                'null' => true,
                'after' => 'id',
            ]
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('items', 'id_category');
    }
}
