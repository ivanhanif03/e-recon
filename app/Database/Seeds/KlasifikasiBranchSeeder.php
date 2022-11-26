<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KlasifikasiBranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_klasifikasi' => 'Kelas 1A',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_klasifikasi' => 'Kelas 1B',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_klasifikasi' => 'Kelas 2',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('klasifikasi_branch')->insertBatch($data);
    }
}