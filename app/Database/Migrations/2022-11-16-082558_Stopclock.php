<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stopclock extends Migration
public function up()
    {
        $this->forge->addField([
			'no_tiket'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'unsigned'       => true,
				'auto_increment' => true
			],
			'start_pause'       => [
				'type'           => 'DATETIME',
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
		$this->forge->createTable('Regional', TRUE);
    }

