<?php

namespace App\Livewire\Course;

use App\Models\Enrollment;
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
        $total = Enrollment::where('course_id', $this->courseId)->count();
        return view('livewire.course', [
            'total' => $total,
            'course' => $this->course,
            'activeTab' => $this->activeTab,
        ]);
    }
}
