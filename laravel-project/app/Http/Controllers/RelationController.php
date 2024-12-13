<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Department;

class RelationController extends Controller
{
    public function index()
    {
        $student = Student::with('lecturer', 'dosen', 'department')->find(1);
        $lecturers = Lecturer::with('students')->find(17);

        // dd($student->department->name);
        
        // foreach($lecturers->students as $student)
        // {
        //     echo $student->department->name;
        // }
        $department = Department::find(1)->student;
        echo $department;
    }
}
