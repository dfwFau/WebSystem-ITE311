<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentModel extends Model
{
    protected $table = 'assignments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'course_id',
        'teacher_id',
        'title',
        'description',
        'due_date',
        'file_path',
        'file_name',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Get assignments by course
     */
    public function getAssignmentsByCourse($course_id)
    {
        return $this->where('course_id', $course_id)->findAll();
    }

    /**
     * Get assignment by ID with course info
     */
    public function getAssignmentWithCourse($id)
    {
        return $this->select('assignments.*, courses.course_number, users.name as teacher_name')
                    ->join('courses', 'courses.id = assignments.course_id')
                    ->join('users', 'users.id = assignments.teacher_id')
                    ->find($id);
    }

    /**
     * Get assignments for a student (enrolled courses)
     */
    public function getAssignmentsForStudent($user_id)
    {
        $enrollmentModel = new EnrollmentModel();
        $enrolledCourses = $enrollmentModel->getUserEnrollments($user_id);
        $courseIds = array_column($enrolledCourses, 'course_id');

        if (empty($courseIds)) {
            return [];
        }

        return $this->whereIn('course_id', $courseIds)->findAll();
    }

    /**
     * Get assignments by teacher
     */
    public function getAssignmentsByTeacher($teacher_id)
    {
        return $this->where('teacher_id', $teacher_id)->findAll();
    }

    /**
     * Check if assignment belongs to teacher
     */
    public function isTeacherAssignment($assignment_id, $teacher_id)
    {
        $assignment = $this->find($assignment_id);
        return $assignment && $assignment['teacher_id'] == $teacher_id;
    }
}

class AssignmentSubmissionModel extends Model
{
    protected $table = 'assignment_submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'assignment_id',
        'student_id',
        'submission_text',
        'file_path',
        'file_name',
        'submitted_at',
        'updated_at'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'submitted_at';
    protected $updatedField = 'updated_at';

    /**
     * Get submissions for an assignment
     */
    public function getSubmissionsByAssignment($assignment_id)
    {
        return $this->select('assignment_submissions.*, users.name as student_name, users.email as student_email')
                    ->join('users', 'users.id = assignment_submissions.student_id')
                    ->where('assignment_id', $assignment_id)
                    ->findAll();
    }

    /**
     * Get submission by student for assignment
     */
    public function getSubmission($assignment_id, $student_id)
    {
        return $this->where('assignment_id', $assignment_id)
                    ->where('student_id', $student_id)
                    ->first();
    }

    /**
     * Get submissions by student
     */
    public function getSubmissionsByStudent($student_id)
    {
        return $this->select('assignment_submissions.*, assignments.title, assignments.due_date, courses.course_number')
                    ->join('assignments', 'assignments.id = assignment_submissions.assignment_id')
                    ->join('courses', 'courses.id = assignments.course_id')
                    ->where('assignment_submissions.student_id', $student_id)
                    ->findAll();
    }

    /**
     * Check if student can submit (enrolled in course)
     */
    public function canStudentSubmit($assignment_id, $student_id)
    {
        $assignment = (new AssignmentModel())->find($assignment_id);
        if (!$assignment) return false;

        $enrollmentModel = new EnrollmentModel();
        return $enrollmentModel->isUserEnrolled($student_id, $assignment['course_id']);
    }

    /**
     * Insert or update submission
     */
    public function upsertSubmission($data)
    {
        $existing = $this->where('assignment_id', $data['assignment_id'])
                         ->where('student_id', $data['student_id'])
                         ->first();

        if ($existing) {
            // Update existing
            $data['updated_at'] = date('Y-m-d H:i:s');
            return $this->update($existing['id'], $data);
        } else {
            // Insert new
            $data['submitted_at'] = date('Y-m-d H:i:s');
            return $this->insert($data);
        }
    }
}
