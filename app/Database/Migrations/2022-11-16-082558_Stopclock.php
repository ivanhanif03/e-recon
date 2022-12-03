<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stopclock extends Migration
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
			'keterangan_stopclock'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'start_pause'       => [
				'type'           => 'DATETIME',
			],
			'dateline'      => [
				'type'           => 'DATETIME',
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
		$this->forge->createTable('stopclock', TRUE);
	}
	public function down()
	{
		// menghapus tabel
		$this->forge->dropTable('stopclock');
	}
}
