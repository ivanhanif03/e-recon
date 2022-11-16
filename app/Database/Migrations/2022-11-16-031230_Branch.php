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
				'constraint'     => 5,
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
        //
    }
}