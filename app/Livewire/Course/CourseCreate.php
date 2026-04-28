<?php

namespace App\Livewire\Course;

use App\Models\Course;
use App\Models\Enrollment;
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
    public $status;
    public array $selected_students = [];

    public function render()
    {
        return view('livewire.course-create');
    }

    public function submit()
    {
        $this->validate([
            'course_name' => 'required',
            'course_code' => 'required',
            'lecturer' => 'nullable',
            'room' => 'nullable',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'schedule' => 'required|in:135,246',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable',
        ]);

        try {
            $lecturer = $this->lecturer ?: Auth::user()->name;

            $course = Course::create([
                'course_name' => $this->course_name,
                'course_code' => $this->course_code,
                'lecturer' => $lecturer,
                'slug' => $this->course_code,
                'room' => $this->room,
                'date_start' => $this->date_start,
                'date_end' => $this->date_end,
                'schedule' => $this->schedule,
                'status' => $this->status,
                'description' => $this->description,
            ]);

            $course->teachers()->attach(Auth::id(), ['role' => 'creator']);

            if (!empty($this->selected_students)) {
                $timestamp = now();

                Enrollment::insert(array_map(fn ($studentId) => [
                        'course_id' => $course->id,
                        'student_id' => $studentId,
                        'enrollment_date' => $timestamp,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ], $this->selected_students));
            }

            session()->flash('success', 'Course created successfully with enrollments!');
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Course created successfully with enrollments!'
            ]);

            Flux::modal("course-create")->close();

            $this->dispatch("reloadCourses");
            $this->dispatch("reloadStudents");

            $this->resetForm();
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while creating the course. Please try again.');
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'An error occurred while creating the course. Please try again.'
            ]);
        }
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
        $this->status = "";
        $this->description = "";
        $this->selected_students = [];
    }
}
