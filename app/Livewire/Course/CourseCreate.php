<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Auth;
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
    public $selected_students = [];

    public function render()
    {
        $students = Student::all();
        return view('livewire.course-create', ['students' => $students]);
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

        $course = Course::create([
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

        $course->teachers()->attach(Auth::id(), ['role' => 'creator']);

        if (!empty($this->selected_students)) {
            foreach ($this->selected_students as $studentId) {
                Enrollment::create([
                    'course_id' => $course->id,
                    'student_id' => $studentId,
                    'status' => 'active',
                    'enrollment_date' => now(),
                ]);
            }
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Course created successfully with enrollments!'
        ]);

        Flux::modal("course-create")->close();

        $this->dispatch("reloadCourses");
        $this->dispatch("reloadStudents");

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
        $this->selected_students = [];
    }
}
