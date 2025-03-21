<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course_name, $course_code, $lecturer, $room, $date_start, $date_end, $schedule, $description, $id;
    public $loaded = false;

    #[On('editCourse')]
    public function editCourse($id)
    {
        $course = Course::find($id);
        $this->id = $course->id;
        $this->course_name = $course->course_name;
        $this->course_code = $course->course_code;
        $this->lecturer = $course->lecturer;
        $this->room = $course->room;
        $this->date_start = $course->date_start;
        $this->date_end = $course->date_end;
        $this->schedule = $course->schedule;
        $this->description = $course->description;
        $this->loaded = true;
    }

    public function render()
    {
        return view('livewire.course-edit');
    }

    public function update()
    {
        $this->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'lecturer' => 'required',
            'room' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'schedule' => 'required|in:246,357',
            'description' => 'required',
        ]);

        $course = Course::find($this->id);
        $course->course_name = $this->course_name;
        $course->course_code = $this->course_code;
        $course->lecturer = $this->lecturer;
        $course->room = $this->room;
        $course->date_start = $this->date_start;
        $course->date_end = $this->date_end;
        $course->schedule = $this->schedule;
        $course->description = $this->description;
        $course->save();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Course updated successfully!'
        ]);

        return redirect('courses/' . $course->id . '/settings');
    }
}
