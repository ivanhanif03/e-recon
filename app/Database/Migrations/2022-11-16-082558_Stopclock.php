<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Stopclock extends Migration
{
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
			],
			'dateline'      => [
				'type'           => 'DATETIME',
				
            ]

		]);
        	
        // Membuat primary key
		$this->forge->addKey('no_tiket', TRUE);

		// Membuat tabel 
		$this->forge->createTable('stopclock', TRUE);
    }
    public function down()
    {
        // menghapus tabel
		$this->forge->dropTable('stopclock');
    }
}

    

