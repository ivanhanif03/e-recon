<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gangguan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomor_tiket' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'provider' => [
                'type'      => 'VARCHAR',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tiket');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tiket');
    }
}
