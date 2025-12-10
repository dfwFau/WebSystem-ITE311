<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCourseMetadataToCoursesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('courses', [
            'academic_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '9',
                'null'       => true,
                'comment'    => 'e.g., 2024-2025',
            ],
            'semester' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'comment'    => 'e.g., First Semester',
            ],
            'term' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'comment'    => 'e.g., Midterm, Finals',
            ],
            'schedule_time' => [
                'type'    => 'VARCHAR',
                'constraint' => '100',
                'null'    => true,
                'comment' => 'e.g., MWF 10:00 AM - 11:30 AM',
            ],
            'schedule_date' => [
                'type'    => 'VARCHAR',
                'constraint' => '100',
                'null'    => true,
                'comment' => 'e.g., Monday, Wednesday, Friday',
            ],
            'course_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'comment'    => 'Course section number (CN)',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('courses', [
            'academic_year',
            'semester',
            'term',
            'schedule_time',
            'schedule_date',
            'course_number',
        ]);
    }
}
