<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Details extends Component
{
    public $courseId, $activeTab = 'details';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.details', ['course' => $this->course]);
    }
}
