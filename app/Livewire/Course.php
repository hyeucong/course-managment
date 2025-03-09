<?php

namespace App\Livewire;

use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Course extends Component
{
    public $courseId;

    public function getCourseProperty()
    {
        return \App\Models\Course::findOrFail($this->courseId);
    }

    public function render()
    {
        return view('livewire.course');
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
