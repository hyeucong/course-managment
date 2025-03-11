<?php

namespace App\Livewire\Course;

use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Course extends Component
{
    public $courseId;
    public $course;
    public $key;
    public $activeTab = 'overview';

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        $total = \App\Models\Student::count();
        return view('livewire.course', [
            'total' => $total,
            'course' => $this->course,
            'activeTab' => $this->activeTab,
        ]);
    }


    #[On('reloadCourses')]
    public function reloadCourses()
    {
        $this->courses = Course::all();
    }

    public function edit($courseId)
    {
        $this->dispatch('editCourse', $courseId);
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
        $this->reloadCourses();
    }
}
