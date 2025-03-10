<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course_name, $course_code, $lecturer, $description, $id;
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
            'course_name' => 'required',
            'course_code' => 'required',
            'lecturer' => 'required',
            'description' => 'required',
        ]);

        $course = Course::find($this->id);
        $course->course_name = $this->course_name;
        $course->course_name = $this->course_name;
        $course->lecturer = $this->lecturer;
        $course->description = $this->description;
        $course->save();
        Flux::modal('edit-course')->close();
        $this->dispatch('reloadCourses');
    }
}
