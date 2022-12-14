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
				'constraint'     => '11',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'kode_branch'       => [
				'type'           => 'INT',
				'constraint'     => '11'
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
				'constraint'     => '255'
			],
			// 'id_link'      => [
			// 'type'           => 'INT',
			// 	'constraint'     => '11',
			// 	'unsigned'       => true,
			// ],
			'id_regional'      => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			// 'id_provider'      => [
			// 	'type'           => 'INT',
			// 	'constraint'     => '11',
			// 	'unsigned'       => true,
			// ],
			'id_jenis_branch'      => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'id_klasifikasi_branch'      => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
				'null'			 => true,
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

		// Membuat foreign key
		//$this->forge->addForeignKey('id_link','link','id','','CASCADE');
		$this->forge->addForeignKey('id_regional','regional','id','','CASCADE');
		// $this->forge->addForeignKey('id_provider','provider','id','','CASCADE');
		$this->forge->addForeignKey('id_jenis_branch','jenis_branch','id','','CASCADE');
		$this->forge->addForeignKey('id_klasifikasi_branch','klasifikasi_branch','id','','CASCADE');

		// Membuat tabel 
		$this->forge->createTable('branch', TRUE);
    }

	public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('branch');
    }
}