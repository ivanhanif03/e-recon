<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BandwidthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'bandwidth' => 32,
                'harga' => 1250000
            ],
            [
                'bandwidth' => 64,
                'biaya_bulanan' => 1125000
            ],
            [
                'bandwidth' => 128,
                'biaya_bulanan' => 1550000
            ],
            [
                'bandwidth' => 256,
                'biaya_bulanan' => 2500000
            ],
            [
                'bandwidth' => 512,
                'biaya_bulanan' => 2950000
            ],
            [
                'bandwidth' => 1000,
                'biaya_bulanan' => 3750000
            ],
            [
                'bandwidth' => 2000,
                'biaya_bulanan' => 4550000
            ],
            [
                'bandwidth' => 4000,
                'biaya_bulanan' => 6100000
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('bandwidth')->insertBatch($data);
    }
}
