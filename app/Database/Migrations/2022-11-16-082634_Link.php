<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Link extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_branch'          => [
				'type'           => 'INT',
				'constraint'     => '5',
			],
			'id_provider'       => [
				'type'           => 'INT',
				'constraint'     => '5',
			],
			'id_pic'      => [
				'type'           => 'INT',
				'constraint'     => '5'
            ]

		]);

		// Membuat primary key
		//$this->forge->addKey('id', TRUE);

		// Membuat tabel 
		$this->forge->createTable('regional', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('regional');
    }
}