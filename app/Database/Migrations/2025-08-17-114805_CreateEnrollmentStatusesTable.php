<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnrollmentStatusesTable extends Migration
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
            'status_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
            ],
            'status_description' => [
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
        $this->forge->createTable('enrollment_statuses');

        // Insert default statuses
        $statuses = [
            ['status_name' => 'enrolled', 'status_description' => 'Student is enrolled in the course', 'created_at' => date('Y-m-d H:i:s')],
            ['status_name' => 'active', 'status_description' => 'Active enrollment', 'created_at' => date('Y-m-d H:i:s')],
            ['status_name' => 'pending', 'status_description' => 'Enrollment is pending approval', 'created_at' => date('Y-m-d H:i:s')],
            ['status_name' => 'completed', 'status_description' => 'Course has been completed', 'created_at' => date('Y-m-d H:i:s')],
            ['status_name' => 'dropped', 'status_description' => 'Student has dropped the course', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('enrollment_statuses')->insertBatch($statuses);
    }

    public function down()
    {
        $this->forge->dropTable('enrollment_statuses');
    }
}

