<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provider extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel 
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama_provider'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'pic'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'no_hp' => [
				'type'           => 'VARCHAR',
				'constraint'     => '15'
			],
			'alamat'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel 
		$this->forge->createTable('provider', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('provider');
    }
}