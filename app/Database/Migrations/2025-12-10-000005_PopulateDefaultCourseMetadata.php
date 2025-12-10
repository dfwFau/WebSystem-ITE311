<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PopulateDefaultCourseMetadata extends Migration
{
    public function up()
    {
        // Get current year and determine semester
        $currentMonth = (int)date('m');
        $currentYear = (int)date('Y');
        
        // Determine semester based on current month
        // First semester: June to October (months 6-10)
        // Second semester: November to March (months 11,12,1,2,3)
        // Summer: April to May (months 4-5)
        if ($currentMonth >= 6 && $currentMonth <= 10) {
            $semester = 'First Semester';
        } elseif ($currentMonth == 4 || $currentMonth == 5) {
            $semester = 'Summer';
        } else {
            $semester = 'Second Semester';
        }
        
        // Set academic year based on current month
        if ($currentMonth >= 6) {
            $academicYear = $currentYear . '-' . ($currentYear + 1);
        } else {
            $academicYear = ($currentYear - 1) . '-' . $currentYear;
        }
        
        // Default schedule values
        $scheduleTime = '10:00 AM';
        $scheduleDate = date('Y-m-d');
        $term = 'Midterm';
        $courseNumber = '';
        
        // Update all courses with default values where they are empty or NULL
        $this->db->table('courses')->update([
            'academic_year' => $academicYear,
            'semester' => $semester,
            'term' => $term,
            'schedule_time' => $scheduleTime,
            'schedule_date' => $scheduleDate,
            'course_number' => $courseNumber
        ], [
            'academic_year' => null,
        ]);
        
        // Also update empty strings
        $this->db->table('courses')->update([
            'academic_year' => $academicYear,
            'semester' => $semester,
            'term' => $term,
            'schedule_time' => $scheduleTime,
            'schedule_date' => $scheduleDate,
            'course_number' => $courseNumber
        ], "academic_year = ''");
    }

    public function down()
    {
        // Set fields back to NULL/empty on rollback
        $this->db->table('courses')->update([
            'academic_year' => null,
            'semester' => null,
            'term' => null,
            'schedule_time' => null,
            'schedule_date' => null,
            'course_number' => null
        ]);
    }
}
