<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function courses()
    {
        $data = [
            'title' => 'My Courses',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('student/courses', $data);
    }
    
    public function grades()
    {
        $data = [
            'title' => 'My Grades',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('student/grades', $data);
    }
    
    public function assignments()
    {
        $data = [
            'title' => 'My Assignments',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('student/assignments', $data);
    }
}
