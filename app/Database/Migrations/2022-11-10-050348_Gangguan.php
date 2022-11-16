<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gangguan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'nomor_tiket' => [
                'type'       => 'INT',
                'constraint' => '20',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_gangguan' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_branch' => [
                'type'      => 'INT',
                'constraint' => '5'
            ],
            'id_provider' => [
                'type'      => 'INT',
                'constraint' => '5'
            ],
            'id_regional' => [
                'type'      => 'INT',
                'constraint' => '5'
            ],
            'detail' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'start' => [
                'type'      => 'DATETIME',
                
            ],
            'end' => [
                'type'      => 'DATETIME',
                'constraint' => '???'
            ],
            'status' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'approval' => [
                'type'      => 'ARRAY',
                'constraint' => '255'
            ]
        ]);
        //Membuat primary key
        $this->forge->addKey('no_tiket', true);

        //membuat foreign key
		$this->forge->addForeignKey('id_branch','branch','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('id_provider','provider','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('id_regional','regional','id','CASCADE','CASCADE');
		
        //membuat tabel
        $this->forge->createTable('gangguan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('gangguan');
    }
}