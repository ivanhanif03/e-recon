<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'fullname' => 'Admin',
                'email'    => 'admin@admin.com',
                'username'    => 'admin',
                'no_hp'    => '085200001111',
                'hak_akses'    => 'admin',
                'alamat'    => 'harmoni',
                'user_image'    => 'user-default.png',
                //PASSWORD : batara123
                'password_hash'    => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'    => '1',
                'force_pass_reset'    => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'fullname' => 'Supervisor',
                'email'    => 'supervisor@supervisor.com',
                'username'    => 'supervisor',
                'no_hp'    => '085222221111',
                'hak_akses'    => 'supervisor',
                'alamat'    => 'harmoni',
                'user_image'    => 'user-default.png',
                //PASSWORD : batara123
                'password_hash'    => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'    => '1',
                'force_pass_reset'    => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'fullname' => 'User BTN',
                'email'    => 'userbtn@user.com',
                'username'    => 'userbtn',
                'no_hp'    => '085333335555',
                'hak_akses'    => 'user-btn',
                'alamat'    => 'harmoni',
                'user_image'    => 'user-default.png',
                //PASSWORD : batara123
                'password_hash'    => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'    => '1',
                'force_pass_reset'    => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'fullname' => 'User Telkom',
                'email'    => 'userprovider@telkom.com',
                'username'    => 'userprovider',
                'no_hp'    => '085388889999',
                'hak_akses'    => 'user-provider',
                'alamat'    => 'harmoni',
                'user_image'    => 'user-default.png',
                //PASSWORD : batara123
                'password_hash'    => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'    => '1',
                'force_pass_reset'    => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'fullname' => 'User General',
                'email'    => 'user@user.com',
                'username'    => 'user',
                'no_hp'    => '082177778888',
                'hak_akses'    => 'user',
                'alamat'    => 'harmoni',
                'user_image'    => 'user-default.png',
                //PASSWORD : batara123
                'password_hash'    => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'    => '1',
                'force_pass_reset'    => '0',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}