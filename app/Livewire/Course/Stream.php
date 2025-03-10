<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Stream extends Component
{
    public $courseId;
    public function getCourseProperty()
    {
        return \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.stream');
    }
}
