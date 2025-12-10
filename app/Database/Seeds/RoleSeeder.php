<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'role_name' => 'admin',
                'role_description' => 'Administrator with full access',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'role_name' => 'teacher',
                'role_description' => 'Teacher with course management access',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'role_name' => 'student',
                'role_description' => 'Student with limited access',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert roles
        $this->db->table('roles')->insertBatch($data);
    }
}
