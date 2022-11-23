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
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_gangguan' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            // 'id_branch' => [
            //     'type'      => 'INT',
            //     'constraint' => '11',
            //     'unsigned'       => true,
            // ],
            // 'id_provider' => [
            //     'type'      => 'INT',
            //     'constraint' => '11',
            //     'unsigned'       => true,
            // ],
            // 'id_regional' => [
            //     'type'      => 'INT',
            //     'constraint' => '11',
            //     'unsigned'       => true,
            //],
            'id_link' => [
                'type'      => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
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
                
            ],
            'id_status' => [
                'type'      => 'INT',
                'constraint' => '11'
                'unsigned'       => true,
            ],
            'approval' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'created_at'      => [
				'type'           => 'DATETIME',
			],
			'updated_at'      => [
				'type'           => 'DATETIME',
			],
        ]);
        //Membuat primary key
        $this->forge->addKey('nomor_tiket', true);

        //membuat foreign key
        $this->forge->addForeignKey('id_link','link','id','','CASCADE');
        $this->forge->addForeignKey('id_status','status','id','','CASCADE');
		// $this->forge->addForeignKey('id_branch','branch','id','','CASCADE');
		// $this->forge->addForeignKey('id_provider','provider','id','','CASCADE');
		// $this->forge->addForeignKey('id_regional','regional','id','','CASCADE');
		
        //membuat tabel
        $this->forge->createTable('gangguan', true );
    }

    public function down()
    {
        //menghapus tabel
        $this->forge->dropTable('gangguan');
    }
}