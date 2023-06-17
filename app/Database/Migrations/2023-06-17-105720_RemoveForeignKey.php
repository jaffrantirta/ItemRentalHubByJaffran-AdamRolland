<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveForeignKey extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks(); // Disable foreign key checks temporarily
        
        $this->forge->dropForeignKey('transaction_details', 'transaction_details_rental_id_foreign');
        
        $this->db->enableForeignKeyChecks(); // Enable foreign key checks again
    }

    public function down()
    {
        //
    }
}
