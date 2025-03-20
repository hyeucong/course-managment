<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Enrollment;

class StudentEmailEntry extends Component
{
    public $email = '';
    public $courseId = '';

    public function mount($courseId = null)
    {
        $this->courseId = $courseId;
    }

    public function render()
    {
        return view('livewire.student-email-entry')
            ->layout('components.student-entry');
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:students,email',
            'courseId' => 'required|exists:courses,id',
        ]);

        $student = Student::where('email', $this->email)->first();

        if (!$student) {
            $this->addError('email', 'Invalid student email.');
            return;
        }

        $enrollment = Enrollment::where('student_id', $student->id)
            ->where('course_id', $this->courseId)
            ->first();

        if (!$enrollment) {
            $this->addError('email', 'You are not enrolled in this course.');
            return;
        }

        session(['student_email' => $this->email]);

        return redirect()->route('student.stream', ['courseId' => $this->courseId]);
    }
}
