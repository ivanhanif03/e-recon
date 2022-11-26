<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RegionalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_regional' => 1,
                'nama_regional' => 'Regional 1',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_regional' => 2,
                'nama_regional' => 'Regional 2',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_regional' => 3,
                'nama_regional' => 'Regional 3',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_regional' => 4,
                'nama_regional' => 'Regional 4',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_regional' => 5,
                'nama_regional' => 'Regional 5',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_regional' => 6,
                'nama_regional' => 'Regional 6',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('regional')->insertBatch($data);
    }
}