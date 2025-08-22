<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Create 'users' table
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
                'null'       => false,
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
                'null'       => false,
            ],
            'password'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'created_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Add primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Drop 'users' table
        $this->forge->dropTable('users');
    }
}
