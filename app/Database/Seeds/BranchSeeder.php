<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_branch'      => 14,
                'nama_branch'      => 'JAKARTA HARMONI',
                'alamat'           => 'Menara Bank BTN, Jl. Gajah Mada No. 1 Jakarta Pusat 10130',
                'no_telp'          => '0216336789',
                'id_regional'      => 2,
                'id_jenis_branch'  => 1,
                'id_klasifikasi_branch'  => null,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_branch'      => 90,
                'nama_branch'      => 'ANTAPANI',
                'alamat'           => 'Jl. Purwakarta No. 142 Bandung 40291',
                'no_telp'          => '0227200720',
                'id_regional'      => 1,
                'id_jenis_branch'  => 2,
                'id_klasifikasi_branch'  => 2,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'kode_branch'      => 396,
                'nama_branch'      => 'Cempaka Putih Permai',
                'alamat'           => 'Jl. Letjen Suprapto, Perum Cempaka Putih Permai Blok A6',
                'no_telp'          => '021-91274176',
                'id_regional'      => 2,
                'id_jenis_branch'  => 2,
                'id_klasifikasi_branch'  => 3,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Using Query Builder
        $this->db->table('branch')->insertBatch($data);
    }
}
