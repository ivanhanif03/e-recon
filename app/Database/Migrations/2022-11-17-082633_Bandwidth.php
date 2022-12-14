<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bandwidth extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'bandwidth'       => [
                'type'           => 'INT',
                'constraint'     => '10'
            ],
            'biaya_bulanan'       => [
                'type'           => 'FLOAT',
                'constraint'     => '20'
            ],
            'created_at'      => [
                'type'           => 'DATETIME',
            ],
            'updated_at'      => [
                'type'           => 'DATETIME',
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel 
        $this->forge->createTable('bandwidth', TRUE);
    }

    public function down()
    {
        // menghapus tabel
        $this->forge->dropTable('bandwidth');
    }
}
