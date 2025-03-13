<?php

namespace App\Livewire\Course;

use App\Models\Student;
use Livewire\Attributes\On;
use Livewire\Component;

class People extends Component
{
    public $students;
    public $courseId, $activeTab = 'people', $course;

    public function mount($courseId)
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
        $this->students = Student::all();
    }

    #[On('reloadStudents')]
    public function reloadStudents()
    {
        $this->courses = Student::all();
    }

    public function render()
    {
        return view('livewire.people', ['course' => $this->course]);
    }
}
