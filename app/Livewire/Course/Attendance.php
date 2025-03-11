<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Attendance extends Component
{
    public $courseId;

    public $activeTab = 'attendance';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.attendance', ['course' => $this->course]);
    }
}
