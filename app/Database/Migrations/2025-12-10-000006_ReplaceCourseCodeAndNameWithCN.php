<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReplaceCourseCodeAndNameWithCN extends Migration
{
    public function up()
    {
        // Update course_number column to hold the combined CN data
        // Populate the course_number column with combined data from course_code and course_name
        $this->db->query('UPDATE courses SET course_number = CONCAT(course_code, " - ", course_name) WHERE course_number IS NULL OR course_number = ""');

        // Drop the old columns
        $this->forge->dropColumn('courses', 'course_code');
        $this->forge->dropColumn('courses', 'course_name');

        // Modify course_number to be NOT NULL and UNIQUE
        $this->forge->modifyColumn('courses', [
            'course_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'null'       => false,
                'unique'     => true,
                'comment'    => 'CN - Combined course code and name',
            ],
        ]);
    }

    public function down()
    {
        // Recreate the original columns
        $this->forge->addColumn('courses', [
            'course_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'unique'     => true,
                'after'      => 'course_id',
            ],
            'course_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'after'      => 'course_code',
            ],
        ]);

        // Split course_number back into course_code and course_name
        $courses = $this->db->table('courses')->get()->getResultArray();
        foreach ($courses as $course) {
            if (!empty($course['course_number'])) {
                // Split by " - " to extract code and name
                $parts = explode(' - ', $course['course_number'], 2);
                $code = $parts[0] ?? '';
                $name = $parts[1] ?? '';
                
                $this->db->table('courses')
                    ->where('course_id', $course['course_id'])
                    ->update([
                        'course_code' => $code,
                        'course_name' => $name,
                    ]);
            }
        }

        // Make course_number nullable again
        $this->forge->modifyColumn('courses', [
            'course_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'comment'    => 'Course section number',
            ],
        ]);
    }
}
