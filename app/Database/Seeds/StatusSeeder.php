<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'menunggu perbaikan'
            ],
            [
                'kategori' => 'sedang perbaikan'
            ],
            [
                'kategori' => 'menunggu approval perbaikan'
            ],
            [
                'kategori' => 'menunggu approval stopclock'
            ],
            [
                'kategori' => 'over sla'
            ],
            [
                'kategori' => 'stopclock'
            ],
            [
                'kategori' => 'finish'
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('status')->insertBatch($data);
    }
}
