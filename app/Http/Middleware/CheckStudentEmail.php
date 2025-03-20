<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrollment;

class CheckStudentEmail
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('student_email')) {
            return redirect()->route('student.email', ['courseId' => $request->route('courseId')]);
        }

        $student = Student::where('email', session('student_email'))->first();

        if (!$student) {
            session()->forget('student_email');
            return redirect()->route('student.email', ['courseId' => $request->route('courseId')])
                ->with('error', 'Invalid student email.');
        }

        $courseId = $request->route('courseId');
        $enrollment = Enrollment::where('student_id', $student->id)
            ->where('course_id', $courseId)
            ->first();

        if (!$enrollment) {
            session()->forget('student_email');
            return redirect()->route('student.email', ['courseId' => $courseId])
                ->with('error', 'You are not enrolled in this course.');
        }

        return $next($request);
    }
}
