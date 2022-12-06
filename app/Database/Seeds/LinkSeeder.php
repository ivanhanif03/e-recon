<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LinkSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_link'        => 'Jakarta Harmoni Telkom',
                'id_branch'        => 1,
                'id_provider'      => 1,
                'id_pic'           => 4,
                'bandwidth'        => 20000,
                'jenis_link'   => 'MPLS',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_link'        => 'Antapani Tigatra',
                'id_branch'        => 2,
                'id_provider'      => 2,
                'id_pic'           => 5,
                'bandwidth'        => 2000,
                'jenis_link'   => 'Internet',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama_link'        => 'Cempaka Putih Permai Telkom',
                'id_branch'        => 3,
                'id_provider'      => 1,
                'id_pic'           => 4,
                'bandwidth'        => 128,
                'jenis_link'   => 'MPLS',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Using Query Builder
        $this->db->table('link')->insertBatch($data);
    }
}
