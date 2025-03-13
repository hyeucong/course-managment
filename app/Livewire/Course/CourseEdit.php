<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\Component;

class CourseEdit extends Component
{
    public $course_name, $course_code, $lecturer, $description, $id;

    #[On('editCourse')]
    public function editCourse($id)
    {
        $course = Course::find($id);
        $this->id = $course->id;
        $this->course_name = $course->course_name;
        $this->course_code = $course->course_code;
        $this->lecturer = $course->lecturer;
        $this->description = $course->description;
        $this->showModal = true;
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
            'description' => 'required',
        ]);

        $course = Course::find($this->id);
        $course->course_name = $this->course_name;
        $course->course_name = $this->course_name;
        $course->lecturer = $this->lecturer;
        $course->description = $this->description;
        $course->save();

        return redirect('courses/' . $course->id . '/settings');
    }
}
