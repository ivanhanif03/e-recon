<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regional extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => '5',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'kode_regional'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'nama_regional'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
            ]

		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel 
		$this->forge->createTable('regional', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('regional');
    }
}
