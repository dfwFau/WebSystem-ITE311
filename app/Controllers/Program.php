<?php

namespace App\Controllers;

use App\Models\ProgramModel;

class Program extends BaseController
{
    protected $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
    }

    /**
     * Display list of programs for the current teacher
     */
    public function index()
    {
        $session = session();
        $userId = $session->get('id');
        $userRole = $session->get('role');

        // Get programs based on role
        if ($userRole === 'admin') {
            $programs = $this->programModel->getAllProgramsWithTeacher();
        } else {
            $programs = $this->programModel->getProgramsByTeacher($userId);
        }

        // Add course count to each program
        foreach ($programs as &$program) {
            $program['course_count'] = $this->programModel->countCoursesInProgram($program['id']);
        }

        $data = [
            'title' => 'My Programs',
            'programs' => $programs,
            'userRole' => $userRole
        ];

        return view('programs/index', $data);
    }

    /**
     * Show create program form
     */
    public function create()
    {
        $data = [
            'title' => 'Create Program'
        ];

        return view('programs/create', $data);
    }

    /**
     * Store new program
     */
    public function store()
    {
        $session = session();
        $userId = $session->get('id');

        $validation = \Config\Services::validation();

        $rules = [
            'program_name' => 'required|min_length[3]|max_length[255]',
            'program_code' => 'required|min_length[2]|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'program_name' => $this->request->getPost('program_name'),
            'program_code' => strtoupper($this->request->getPost('program_code')),
            'description' => $this->request->getPost('description'),
            'teacher_id' => $userId,
            'status' => 'active'
        ];

        if ($this->programModel->insert($data)) {
            return redirect()->to('/programs')->with('success', 'Program created successfully!');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create program.');
    }

    /**
     * Show edit program form
     */
    public function edit($id)
    {
        $session = session();
        $userId = $session->get('id');
        $userRole = $session->get('role');

        $program = $this->programModel->find($id);

        if (!$program) {
            return redirect()->to('/programs')->with('error', 'Program not found.');
        }

        // Check ownership (unless admin)
        if ($userRole !== 'admin' && $program['teacher_id'] != $userId) {
            return redirect()->to('/programs')->with('error', 'You do not have permission to edit this program.');
        }

        $data = [
            'title' => 'Edit Program',
            'program' => $program
        ];

        return view('programs/edit', $data);
    }

    /**
     * Update program
     */
    public function update($id)
    {
        $session = session();
        $userId = $session->get('id');
        $userRole = $session->get('role');

        $program = $this->programModel->find($id);

        if (!$program) {
            return redirect()->to('/programs')->with('error', 'Program not found.');
        }

        // Check ownership (unless admin)
        if ($userRole !== 'admin' && $program['teacher_id'] != $userId) {
            return redirect()->to('/programs')->with('error', 'You do not have permission to edit this program.');
        }

        $validation = \Config\Services::validation();

        $rules = [
            'program_name' => 'required|min_length[3]|max_length[255]',
            'program_code' => 'required|min_length[2]|max_length[50]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'program_name' => $this->request->getPost('program_name'),
            'program_code' => strtoupper($this->request->getPost('program_code')),
            'description' => $this->request->getPost('description'),
        ];

        if ($this->programModel->update($id, $data)) {
            return redirect()->to('/programs')->with('success', 'Program updated successfully!');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update program.');
    }

    /**
     * Delete program
     */
    public function delete($id)
    {
        $session = session();
        $userId = $session->get('id');
        $userRole = $session->get('role');

        $program = $this->programModel->find($id);

        if (!$program) {
            return redirect()->to('/programs')->with('error', 'Program not found.');
        }

        // Check ownership (unless admin)
        if ($userRole !== 'admin' && $program['teacher_id'] != $userId) {
            return redirect()->to('/programs')->with('error', 'You do not have permission to delete this program.');
        }

        // Check if program has courses
        $courseCount = $this->programModel->countCoursesInProgram($id);
        if ($courseCount > 0) {
            return redirect()->to('/programs')->with('error', 'Cannot delete program with existing courses. Please remove or reassign courses first.');
        }

        if ($this->programModel->delete($id)) {
            return redirect()->to('/programs')->with('success', 'Program deleted successfully!');
        }

        return redirect()->to('/programs')->with('error', 'Failed to delete program.');
    }

    /**
     * View program details
     */
    public function view($id)
    {
        $session = session();
        $userId = $session->get('id');
        $userRole = $session->get('role');

        $program = $this->programModel->getProgramWithTeacher($id);

        if (!$program) {
            return redirect()->to('/programs')->with('error', 'Program not found.');
        }

        // Check access (unless admin)
        if ($userRole !== 'admin' && $program['teacher_id'] != $userId) {
            return redirect()->to('/programs')->with('error', 'You do not have permission to view this program.');
        }

        // Get courses in this program
        $db = \Config\Database::connect();
        $courses = $db->table('courses')
                      ->where('program_id', $id)
                      ->get()
                      ->getResultArray();

        $data = [
            'title' => $program['program_name'],
            'program' => $program,
            'courses' => $courses,
            'userRole' => $userRole
        ];

        return view('programs/view', $data);
    }
}
