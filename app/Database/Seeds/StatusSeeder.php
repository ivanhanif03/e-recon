<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'on process'
            ],
            [
                'kategori' => 'waiting approval'
            ],
            [
                'kategori' => 'over sla'
            ],
            [
                'kategori' => 'stop clock'
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
