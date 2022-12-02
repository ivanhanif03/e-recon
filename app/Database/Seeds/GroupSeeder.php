<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'group_id' => 1,
                'user_id'    => 1,
            ],
            [
                'group_id' => 2,
                'user_id'    => 2,
            ],
            [
                'group_id' => 3,
                'user_id'    => 3,
            ],
            [
                'group_id' => 4,
                'user_id'    => 4,
            ],
            [
                'group_id' => 4,
                'user_id'    => 5,
            ],
            [
                'group_id' => 5,
                'user_id'    => 6,
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}
