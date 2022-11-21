<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisBranch extends Migration
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
			'jenis_branch'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
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
		$this->forge->createTable('jenisBranch', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('jenisBranch');
    }
}