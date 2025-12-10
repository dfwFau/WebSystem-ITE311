<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\RoleModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Assuming roles are seeded in order: admin=1, teacher=2, student=3
        $data = [
            [
                'name' => 'Admin User',
                'email'    => 'admin@gmail.com',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'role_id'     => 1, // admin
            ],
            [
                'name' => 'Teacher User',
                'email'    => 'teacher@gmail.com',
                'password' => password_hash('teacher', PASSWORD_DEFAULT),
                'role_id'     => 2, // teacher
            ],
            [
                'name' => 'Student User',
                'email'    => 'student@gmail.com',
                'password' => password_hash('student', PASSWORD_DEFAULT),
                'role_id'     => 3, // student
            ],
            [
                'name' => 'Student User',
                'email'    => 'student1@gmail.com',
                'password' => password_hash('student', PASSWORD_DEFAULT),
                'role_id'     => 3, // student
            ],
            [
                'name' => 'Teacher User',
                'email'    => 'teacher1@gmail.com',
                'password' => password_hash('teacher', PASSWORD_DEFAULT),
                'role_id'     => 2, // teacher
            ],
        ];

        // Insert multiple users
        $this->db->table('users')->insertBatch($data);
    }
}
