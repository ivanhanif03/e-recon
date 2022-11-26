<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;


class JenisBranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jenis_branch' => 'Kantor Cabang',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'jenis_branch' => 'Kantor Cabang Pembantu',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'jenis_branch' => 'Kantor Cabang Syariah',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'jenis_branch' => 'Kantor Cabang Syariah Pembantu',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('jenis_branch')->insertBatch($data);
    }
}