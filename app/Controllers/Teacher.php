<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function classes()
    {
        $data = [
            'title' => 'My Classes',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/classes', $data);
    }
    
    public function materials()
    {
        $data = [
            'title' => 'Teaching Materials',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/materials', $data);
    }
    
    public function grades()
    {
        $data = [
            'title' => 'Grade Students',
            'userName' => session()->get('userName'),
            'role' => session()->get('userRole')
        ];
        
        return view('teacher/grades', $data);
    }
}
