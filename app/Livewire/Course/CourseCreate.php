<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Flux\Flux;
use Livewire\Component;

class CourseCreate extends Component
{
    public $course_name, $course_code, $lecturer, $description;

    public function render()
    {
        return view('livewire.course-create');
    }

    public function submit()
    {
        $this->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'lecturer' => 'required',
            'description' => 'required',
        ]);

        Course::create([
            'course_name' => $this->course_name,
            'course_code' => $this->course_code,
            'lecturer' => $this->lecturer,
            'description' => $this->description
        ]);
        Flux::modal("course-create")->close();

        $this->dispatch("reloadCourses");

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->course_name = "";
        $this->course_code = "";
        $this->lecturer = "";
        $this->description = "";
    }
}
