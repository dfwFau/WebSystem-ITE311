<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'course_number',
        'description',
        'units',
        'teacher_id',
        'academic_year',
        'semester',
        'term',
        'schedule_time',
        'schedule_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false; // timestamps handled by DB defaults in migration
    
    // Validation is handled in the controller for more control over is_unique with exclusions
    protected $validationRules = [];
    
    protected $validationMessages = [];
    
    protected $skipValidation = true;

    /**
     * Get all available courses for students (not enrolled by the student and activated by teacher)
     */
    public function getAvailableCoursesForStudent($studentId)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.course_id, c.course_number, c.description, c.units, c.academic_year, c.semester, c.term, c.schedule_time, c.schedule_date, c.teacher_id, c.status, c.created_at, u.name as teacher_name');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.teacher_id IS NOT NULL');
        $builder->where('c.status', 'active'); // Only show courses that have been activated by teachers
        $builder->whereNotIn('c.course_id', function($query) use ($studentId) {
            $query->select('course_id')
                  ->from('enrollments')
                  ->where('user_id', $studentId);
        });
        $builder->orderBy('c.created_at', 'DESC');

        return $builder->get()->getResultArray();
    }

    /**
     * Get all available courses (for students to browse)
     */
    public function getAvailableCourses($userId)
    {
        return $this->getAvailableCoursesForStudent($userId);
    }

    /**
     * Get course with teacher information
     */
    public function getCourseWithTeacher($courseId)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name, u.email as teacher_email');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.course_id', $courseId);
        
        return $builder->get()->getRowArray();
    }

    /**
     * Get courses created by a specific teacher with enrollment count
     */
    public function getCoursesByTeacher($teacherId)
    {
        // First get all courses for the teacher
        $courses = $this->where('teacher_id', $teacherId)
                       ->orderBy('created_at', 'DESC')
                       ->findAll();
        
        // Get enrollment counts for each course
        $enrollmentModel = new EnrollmentModel();
        
        foreach ($courses as &$course) {
            // Get student count for this course
            $course['students'] = $enrollmentModel->getCourseEnrollmentCount($course['course_id']);
            
            // Set default status if not exists
            if (!isset($course['status'])) {
                $course['status'] = 'Active';
            }
            
            // Ensure description exists
            if (!isset($course['description']) || $course['description'] === null) {
                $course['description'] = '';
            }
        }
        
        return $courses;
    }

    /**
     * Get teacher statistics including total students, active courses, total courses, and pending courses
     */
    public function getTeacherStatistics($teacherId)
    {
        $statusModel = new \App\Models\EnrollmentStatusModel();
        $enrolledStatusId = $statusModel->getStatusIdByName('enrolled');
        $activeStatusId = $statusModel->getStatusIdByName('active');
        $pendingStatusId = $statusModel->getStatusIdByName('pending');

        // Get total students (enrolled or active in teacher's courses)
        $totalStudentsQuery = $this->db->table('enrollments e')
            ->select('COUNT(DISTINCT e.user_id) as total_students')
            ->join('courses c', 'e.course_id = c.course_id')
            ->where('c.teacher_id', $teacherId)
            ->whereIn('e.status_id', array_filter([$enrolledStatusId, $activeStatusId]))
            ->get()
            ->getRowArray();
        $totalStudents = $totalStudentsQuery ? (int)$totalStudentsQuery['total_students'] : 0;

        // Get total courses taught by teacher
        $totalCourses = $this->where('teacher_id', $teacherId)->countAllResults();

        // Get active courses (courses with enrolled/active students)
        $activeCoursesQuery = $this->db->table('courses c')
            ->select('COUNT(DISTINCT c.course_id) as active_courses')
            ->join('enrollments e', 'c.course_id = e.course_id')
            ->where('c.teacher_id', $teacherId)
            ->whereIn('e.status_id', array_filter([$enrolledStatusId, $activeStatusId]))
            ->get()
            ->getRowArray();
        $activeCourses = $activeCoursesQuery ? (int)$activeCoursesQuery['active_courses'] : 0;

        // Get pending courses (courses with pending enrollments)
        $pendingCoursesQuery = $this->db->table('courses c')
            ->select('COUNT(DISTINCT c.course_id) as pending_courses')
            ->join('enrollments e', 'c.course_id = e.course_id')
            ->where('c.teacher_id', $teacherId)
            ->where('e.status_id', $pendingStatusId)
            ->get()
            ->getRowArray();
        $pendingCourses = $pendingCoursesQuery ? (int)$pendingCoursesQuery['pending_courses'] : 0;

        return [
            'total_students' => $totalStudents,
            'total_courses' => $totalCourses,
            'active_courses' => $activeCourses,
            'pending_courses' => $pendingCourses,
        ];
    }

    /**
     * Get all courses with teacher information
     */
    public function getAllCoursesWithTeachers()
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.teacher_id IS NOT NULL');
        $builder->orderBy('c.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    /**
     * Check if a course number already exists
     */
    public function courseNumberExists($courseNumber, $excludeId = null)
    {
        $builder = $this->db->table('courses');
        $builder->where('course_number', $courseNumber);
        
        if ($excludeId) {
            $builder->where('course_id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }

    /**
     * Get total materials uploaded by a teacher across all their courses
     */
    public function getTotalMaterialsByTeacher($teacherId)
    {
        $builder = $this->db->table('materials m');
        $builder->join('courses c', 'm.course_id = c.course_id');
        $builder->where('c.teacher_id', $teacherId);

        return $builder->countAllResults();
    }

    /**
     * Get total number of students enrolled in a teacher's courses
     */
    public function getTotalEnrolledStudentsByTeacher($teacherId)
    {
        $statusModel = new \App\Models\EnrollmentStatusModel();
        $enrolledStatusId = $statusModel->getStatusIdByName('enrolled');
        $activeStatusId = $statusModel->getStatusIdByName('active');

        $builder = $this->db->table('enrollments e');
        $builder->select('COUNT(DISTINCT e.user_id) as total_students');
        $builder->join('courses c', 'e.course_id = c.course_id');
        $builder->where('c.teacher_id', $teacherId);
        $builder->whereIn('e.status_id', array_filter([$enrolledStatusId, $activeStatusId]));

        $result = $builder->get()->getRowArray();
        return $result ? (int)$result['total_students'] : 0;
    }

    /**
     * Test database connection
     */
    public function testConnection()
    {
        try {
            $this->db->query('SELECT 1');
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Database connection test failed: ' . $e->getMessage());
            return false;
        }
    }
}
