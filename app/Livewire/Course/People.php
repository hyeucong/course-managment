<?php

namespace App\Livewire\Course;

use Livewire\Component;

class People extends Component
{
    public $courseId, $activeTab = 'people';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.people', ['course' => $this->course]);
    }
}
