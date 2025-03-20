<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $student = Student::where('email', session('student_email'))->first();
        $courses = $student->courses;
        return view('livewire.stream', compact('student.stream'));
    }
}
