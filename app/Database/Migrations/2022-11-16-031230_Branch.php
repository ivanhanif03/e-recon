<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Branch extends Migration
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
			'kode_branch'       => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'nama_branch'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'no_telp'      => [
				'type'           => 'CHAR',
				'constraint'     => '15'
			],
			'id_regional'      => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'id_provider'      => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'id_jenis_branch'      => [
				'type'           => 'INT',
				'constraint'     => '10'
			],
			'id_klasifikasi_branch'      => [
				'type'           => 'INT',
				'constraint'     => '10'
			],

		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat foreign key
		$this->forge->addForeignKey('id_regional','regional','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('id_provider','provider','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('id_jenis_branch','jenis branch','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('id_klasifikasi_branch','klasifikasi branch','id','CASCADE','CASCADE');

		// Membuat tabel 
		$this->forge->createTable('branch', TRUE);
    }

	public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('branch');
    }
}