<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'role_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'role_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');

        // Insert default roles
        $roles = [
            ['role_name' => 'admin', 'role_description' => 'Administrator with full system access', 'created_at' => date('Y-m-d H:i:s')],
            ['role_name' => 'teacher', 'role_description' => 'Teacher who can create courses and materials', 'created_at' => date('Y-m-d H:i:s')],
            ['role_name' => 'student', 'role_description' => 'Student who can enroll in courses', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('roles')->insertBatch($roles);
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}

