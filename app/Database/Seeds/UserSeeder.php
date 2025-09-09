<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a sample user
        $data = [
            'name'  => 'john_doe',
            'email'     => 'john.doe@example.com',
            'password'  => password_hash('secret_password', PASSWORD_DEFAULT),  // Using password_hash for security
            'created_at' => date('Y-m-d H:i:s'),  // Current timestamp
            'updated_at' => date('Y-m-d H:i:s'),  // Current timestamp
           
        ];

        // Insert sample user into the 'users' table
        $this->db->table('users')->insert($data);
    }
}
