<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Grades extends Component
{
    public $courseId;

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.grades', ['course' => $this->course]);
    }
}
