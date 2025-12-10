<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToCourses extends Migration
{
    public function up()
    {
        $fields = [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'active'],
                'default' => 'pending',
                'null' => false,
            ],
        ];
        $this->forge->addColumn('courses', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('courses', 'status');
    }
}
