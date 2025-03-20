<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;

class CheckStudentEmail
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('student_email')) {
            return redirect()->route('student.email');
        }

        $student = Student::where('email', session('student_email'))->first();

        if (!$student) {
            session()->forget('student_email');
            return redirect()->route('student.email')->with('error', 'Invalid student email.');
        }

        return $next($request);
    }
}
