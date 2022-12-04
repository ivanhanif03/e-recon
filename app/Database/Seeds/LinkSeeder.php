<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_link'        => 'Jakarta Harmoni Telkom',
                'id_branch'        => 1,
                'id_provider'      => 1,
                'id_pic'           => 4
            ],
            [
                'nama_link'        => 'Antapani Trigatra',
                'id_branch'        => 2,
                'id_provider'      => 2,
                'id_pic'           => 5
            ],
            [
                'nama_link'        => 'Cempaka Putih Permai Telkom',
                'id_branch'        => 3,
                'id_provider'      => 1,
                'id_pic'           => 4
            ],
        ];

        // Using Query Builder
        $this->db->table('link')->insertBatch($data);
    }
}
