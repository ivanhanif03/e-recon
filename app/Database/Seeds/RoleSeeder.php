<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'description'    => 'Super Admin',
            ],
            [
                'name' => 'supervisor',
                'description'    => 'Supervisor Aprroval',
            ],
            [
                'name' => 'user-btn',
                'description'    => 'User BTN',
            ],
            [
                'name' => 'user-provider',
                'description'    => 'User Provider',
            ],
            [
                'name' => 'user',
                'description'    => 'General User',
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}