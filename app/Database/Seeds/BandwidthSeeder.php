<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class BandwidthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'bandwidth' => 32,
                'biaya_bulanan' => 1250000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 64,
                'biaya_bulanan' => 1125000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 128,
                'biaya_bulanan' => 1550000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 256,
                'biaya_bulanan' => 2500000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 512,
                'biaya_bulanan' => 2950000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 1000,
                'biaya_bulanan' => 3750000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 2000,
                'biaya_bulanan' => 4550000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'bandwidth' => 4000,
                'biaya_bulanan' => 6100000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('bandwidth')->insertBatch($data);
    }
}
