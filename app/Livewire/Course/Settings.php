<?php

namespace App\Livewire\Course;

use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Settings extends Component
{
    public $courseId, $activeTab = 'settings', $course, $settingsTab = 'details';

    public function edit($courseId)
    {
        $this->dispatch('editCourse', $courseId);
    }

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
        $this->edit($this->courseId);
    }

    public function render()
    {
        return view('livewire.settings', ['course' => $this->course]);
    }

    public function delete($courseId)
    {
        $this->courseId = $courseId;
        Flux::modal('delete-course')->show();
    }

    public function destroy()
    {
        \App\Models\Course::findOrFail($this->courseId)->delete();
        Flux::modal('delete-course')->close();
        redirect('courses');
    }
}
