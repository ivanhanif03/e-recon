<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBwVsat extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 25,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Harga' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bw_vsat');
    }

    public function down()
    {
        //
        $this->forge->dropTable('bw_vsat');
    }
}
