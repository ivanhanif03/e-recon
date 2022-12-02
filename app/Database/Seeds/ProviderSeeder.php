<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_provider' => 'TLK',
                'nama_provider' => 'Telkom',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'TGR',
                'nama_provider' => 'Trigatra',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'PML',
                'nama_provider' => 'PrimaLink',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'LTA',
                'nama_provider' => 'LintasArta',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'IPW',
                'nama_provider' => 'IPWAN',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'BAS',
                'nama_provider' => 'BAS',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'CMT',
                'nama_provider' => 'ComNet',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'IFT',
                'nama_provider' => 'IForte',
                'alamat'        => 'Jakarta'
            ],
            [
                'kode_provider' => 'MLN',
                'nama_provider' => 'Millenial',
                'alamat'        => 'Jakarta'
            ],

        ];

        // Using Query Builder
        $this->db->table('provider')->insertBatch($data);
    }
}
