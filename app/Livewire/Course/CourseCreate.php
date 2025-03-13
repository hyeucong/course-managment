<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Flux\Flux;
use Livewire\Component;

class CourseCreate extends Component
{
    public $course_name;
    public $course_code;
    public $lecturer;
    public $room;
    public $date_start;
    public $date_end;
    public $schedule;
    public $description;

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
            'room' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            // 'schedule' => 'required',
            'description' => 'required',
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Course created successfully!'
        ]);

        Course::create([
            'course_name' => $this->course_name,
            'course_code' => $this->course_code,
            'lecturer' => $this->lecturer,
            'slug' => $this->course_code,
            'room' => $this->room,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'schedule' => $this->schedule,
            'description' => $this->description,
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
        $this->room = "";
        $this->date_start = "";
        $this->date_end = "";
        $this->schedule = "";
        $this->description = "";
    }
}
