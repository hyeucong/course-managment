<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Settings extends Component
{
    public $courseId, $activeTab = 'settings', $course, $settingsTab = 'details';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }


    public function render()
    {
        return view('livewire.settings', ['course' => $this->course]);
    }
}
