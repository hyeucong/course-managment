<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Flux\Flux;
use Livewire\Component;

class Settings extends Component
{
    public $courseId, $activeTab = 'settings', $course, $settingsTab = 'details';
    public $editing = false;

    public function edit($courseId)
    {
        $this->editing = true;
        $this->dispatch('editCourse', $courseId);
    }

    public function mount()
    {
        $this->course = Course::findOrFail($this->courseId);
    }

    public function archive($courseId)
    {
        $course = Course::findOrFail($courseId);
        $course->status = 'archived';
        $course->save();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Course archived successfully!'
        ]);

        $this->course = $course;
        Flux::modal('archived-course')->close();
        redirect('courses');
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
        Course::findOrFail($this->courseId)->delete();
        Flux::modal('delete-course')->close();
        redirect('courses');
    }
}
