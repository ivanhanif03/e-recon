<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stopclock extends Migration
{
public function up()
    {
        $this->forge->addField([
			'nomor_tiket'          => [
				'type'           => 'INT',
				'constraint'     => '11',
				'unsigned'       => true,
			],
			'start_pause'       => [
				'type'           => 'DATETIME',
			],
			'dateline'      => [
				'type'           => 'DATETIME',
				
            ]

		]);
        	
        // Membuat primary key
		$this->forge->addKey('nomor_tiket', TRUE);

		// Membuat tabel 
		$this->forge->createTable('stopclock', TRUE);
    }
    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('stopclock');
    }
}

    

