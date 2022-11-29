<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_branch'      => 14,
                'nama_branch'      => 'Jakarta Harmoni',
                'alamat'           => 'Menara Bank BTN, Jl. Gajah Mada No. 1 Jakarta Pusat 10130',
                'no_telp'          => '0216336789',
                'id_regional'      => 2,
                'id_jenis_branch'  => 1
            ],
        ];

        // Using Query Builder
        $this->db->table('branch')->insertBatch($data);
    }
}