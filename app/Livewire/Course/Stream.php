<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Stream extends Component
{
    public $courseId, $activeTab = 'stream';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }


    public function render()
    {
        return view('livewire.stream', ['course' => $this->course]);
    }
}
