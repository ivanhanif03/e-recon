<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_provider' => 'TLK',
                'nama_provider' => 'Telkom',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'TGR',
                'nama_provider' => 'Trigatra',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'PML',
                'nama_provider' => 'PrimaLink',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'LTA',
                'nama_provider' => 'LintasArta',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'IPW',
                'nama_provider' => 'IPWAN',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'BAS',
                'nama_provider' => 'BAS',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'CMT',
                'nama_provider' => 'ComNet',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'IFT',
                'nama_provider' => 'IForte',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_provider' => 'MLN',
                'nama_provider' => 'Millenial',
                'alamat'        => 'Jakarta',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],

        ];

        // Using Query Builder
        $this->db->table('provider')->insertBatch($data);
    }
}
