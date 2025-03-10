<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class CourseEdit extends Component
{
    public $title, $description, $id;
    public function render()
    {
        return view('livewire.course-edit');
    }

    #[On('editCourse')]
    public function editCourse($id)
    {
        $course = Course::find($id);
        $this->id = $course->id;
        $this->title = $course->title;
        $this->description = $course->description;
        Flux::modal('edit-course')->show();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $course = Course::find($this->id);
        $course->title = $this->title;
        $course->description = $this->description;
        $course->save();
        Flux::modal('edit-course')->close();
        $this->dispatch('reloadCourses');
    }
}
