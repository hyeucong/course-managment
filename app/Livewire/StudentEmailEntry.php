<?php

namespace App\Livewire;

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
            'email' => 'required|email|exists:students,email',
            'courseId' => 'required|exists:courses,id',
        ]);

        session(['student_email' => $this->email]);

        return redirect()->route('student.stream', ['courseId' => $this->courseId]);
    }
}
