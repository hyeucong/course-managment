<?php

namespace App\Livewire\Course;

use Livewire\Component;

class ClassWork extends Component
{
    public $courseId, $activeTab = 'classwork';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.classwork', ['course' => $this->course]);
    }
}
