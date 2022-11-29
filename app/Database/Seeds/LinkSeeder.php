<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'               => 1,    
                'nama_link'        => 'Jakarta Harmoni Telkom',
                'id_branch'        => 1,
                'id_provider'      => 1,
                'id_pic'           => 4
            ],
        ];

        // Using Query Builder
        $this->db->table('link')->insertBatch($data);
    }
}