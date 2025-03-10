<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Settings extends Component
{
    public $courseId;
    public function getCourseProperty()
    {
        return \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
