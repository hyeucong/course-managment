<?php

namespace App\Livewire;

use App\Models\Enrollment;
use Livewire\Component;

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
            'email' => 'required|email',
            'courseId' => 'required|exists:courses,id',
        ]);

        $isEnrolled = Enrollment::query()
            ->where('course_id', $this->courseId)
            ->whereHas('student', fn ($query) => $query->where('email', $this->email))
            ->exists();

        if (!$isEnrolled) {
            $this->addError('email', 'You are not enrolled in this course.');
            return;
        }

        session(['student_email' => $this->email]);

        return redirect()->route('student.stream', ['courseId' => $this->courseId]);
    }
}
