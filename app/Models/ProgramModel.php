<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table            = 'programs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'program_name',
        'program_code',
        'description',
        'teacher_id',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'program_name' => 'required|min_length[3]|max_length[255]',
        'program_code' => 'required|min_length[2]|max_length[50]',
    ];

    protected $validationMessages = [
        'program_name' => [
            'required' => 'Program name is required.',
            'min_length' => 'Program name must be at least 3 characters.',
        ],
        'program_code' => [
            'required' => 'Program code is required.',
            'min_length' => 'Program code must be at least 2 characters.',
        ],
    ];

    /**
     * Get all programs for a specific teacher
     */
    public function getProgramsByTeacher($teacherId)
    {
        return $this->where('teacher_id', $teacherId)
                    ->where('status', 'active')
                    ->orderBy('program_name', 'ASC')
                    ->findAll();
    }

    /**
     * Get all active programs
     */
    public function getActivePrograms()
    {
        return $this->where('status', 'active')
                    ->orderBy('program_name', 'ASC')
                    ->findAll();
    }

    /**
     * Get program with teacher info
     */
    public function getProgramWithTeacher($programId)
    {
        return $this->select('programs.*, users.name as teacher_name')
                    ->join('users', 'users.id = programs.teacher_id', 'left')
                    ->where('programs.id', $programId)
                    ->first();
    }

    /**
     * Get all programs with teacher info
     */
    public function getAllProgramsWithTeacher()
    {
        return $this->select('programs.*, users.name as teacher_name')
                    ->join('users', 'users.id = programs.teacher_id', 'left')
                    ->orderBy('programs.program_name', 'ASC')
                    ->findAll();
    }

    /**
     * Count courses in a program
     * Note: Currently returns 0 as courses table doesn't have program_id column yet
     */
    public function countCoursesInProgram($programId)
    {
        // Check if program_id column exists in courses table
        $db = \Config\Database::connect();
        $fields = $db->getFieldNames('courses');
        
        if (!in_array('program_id', $fields)) {
            // Column doesn't exist yet, return 0
            return 0;
        }
        
        return $db->table('courses')
                  ->where('program_id', $programId)
                  ->countAllResults();
    }
}
