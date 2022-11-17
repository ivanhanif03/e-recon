<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Link extends Migration
{
    public function up()
    {
        $this->forge->addField([
			// 'id'          => [
			// 	'type'           => 'INT',
			// 	'constraint'     => '11',
			// 	'unsigned'       => true,
			// 	'auto_increment' => true
			// ],
			'id_branch'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'id_provider'       => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'id_pic'      => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
            ]

		]);

		// Membuat primary key
		$this->forge->addKey(['id_branch','id_provider','id_pic']);

        // Membuat foreign key
		$this->forge->addForeignKey('id_branch','branch','id','','CASCADE');
		$this->forge->addForeignKey('id_provider','provider','id','','CASCADE');
        $this->forge->addForeignKey('id_pic','users','id',' ','CASCADE');

		// Membuat tabel 
		$this->forge->createTable('link', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('link');
    }
}