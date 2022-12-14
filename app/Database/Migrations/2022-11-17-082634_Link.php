<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Link extends Migration
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
			'nama_link'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
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
			],
			'id_bandwidth'      => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'jenis_link'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at'      => [
				'type'           => 'DATETIME',
			],
			'updated_at'      => [
				'type'           => 'DATETIME',
			],

		]);

		// Membuat primary key
		$this->forge->addKey('id', true);

		// Membuat foreign key
		$this->forge->addForeignKey('id_branch', 'branch', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('id_provider', 'provider', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('id_pic', 'users', 'id', '', 'CASCADE');
		$this->forge->addForeignKey('id_bandwidth', 'bandwidth', 'id', '', 'CASCADE');

		// Membuat tabel 
		$this->forge->createTable('link', TRUE);
	}

	public function down()
	{
		// menghapus tabel
		$this->forge->dropTable('link');
	}
}
