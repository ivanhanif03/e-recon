<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KlasifikasiBranch extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => '5'
			],
			'nama_klasifikasi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],

		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel 
		$this->forge->createTable('klasifikasiBranch', TRUE);
    }

    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('klasifikasiBranch');
    }
}
