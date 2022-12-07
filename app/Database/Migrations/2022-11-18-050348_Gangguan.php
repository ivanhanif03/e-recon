<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gangguan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'no_tiket' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'nama_gangguan' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_link' => [
                'type'      => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
            ],
            'detail' => [
                'type'      => 'VARCHAR',
                'constraint' => '255'
            ],
            'start' => [
                'type'      => 'DATETIME',

            ],
            'end' => [
                'type'      => 'DATETIME',

            ],
            'id_status' => [
                'type'      => 'INT',
                'constraint' => '11',
                'unsigned'       => true,
            ],
            'approval' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'keterangan_submit' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'bukti_submit' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'waktu_submit' => [
                'type'      => 'DATETIME',
                'null' => true
            ],
            'keterangan_reject' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'keterangan_stopclock' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'start_stopclock' => [
                'type'      => 'DATETIME',
                'null' => true
            ],
            'extra_time_stopclock' => [
                'type'      => 'VARCHAR',
                'constraint' => '5',
                'null' => true
            ],
            'approval_stopclock' => [
                'type'      => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
            'ket_reject_stopclock' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'approval_stopclock_spv' => [
                'type'      => 'VARCHAR',
                'constraint' => '50',
                'null' => true
            ],
            'ket_reject_stopclock_spv' => [
                'type'      => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'offline' => [
                'type'      => 'INT',
                'constraint' => '11',
                'null' => true
            ],
            'sla' => [
                'type'      => 'FLOAT',
                'constraint' => '11',
                'null' => true
            ],
            'restitusi' => [
                'type'      => 'FLOAT',
                'constraint' => '50',
                'null' => true
            ],
            'tagihan_bulanan' => [
                'type'      => 'FLOAT',
                'constraint' => '50',
                'null' => true
            ],
            'created_at'      => [
                'type'           => 'DATETIME',
            ],
            'updated_at'      => [
                'type'           => 'DATETIME',
            ],
        ]);
        //Membuat primary key
        $this->forge->addKey('id', true);

        //membuat foreign key
        $this->forge->addForeignKey('id_link', 'link', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('id_status', 'status', 'id', '', 'CASCADE');

        //membuat tabel
        $this->forge->createTable('gangguan', true);
    }

    public function down()
    {
        //menghapus tabel
        $this->forge->dropTable('gangguan');
    }
}
