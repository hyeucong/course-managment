<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Course extends Component
{
    public $courseId;
    public $course;
    public $key;
    public $activeTab = 'overview';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        $total = \App\Models\Student::count();
        return view('livewire.course', [
            'total' => $total,
            'course' => $this->course,
            'activeTab' => $this->activeTab,
        ]);
    }
}
