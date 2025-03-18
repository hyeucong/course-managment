<?php

namespace App\Livewire\Course;

use App\Models\Enrollment;
use Livewire\Attributes\On;
use Livewire\Component;

class People extends Component
{
    public $students;
    public $teachers;
    public $courseId, $activeTab = 'people', $course;

    public function mount()
    {
        $this->course = \App\Models\Course::findOrFail($this->courseId);
        $this->loadEnrolledStudents();
        $this->loadTeachers();
    }

    public function loadEnrolledStudents()
    {
        $this->students = $this->course->students()->get();
    }

    public function loadTeachers()
    {
        $this->teachers = $this->course->teachers()->get();
    }

    #[On('reloadStudents')]
    public function reloadStudents()
    {
        $this->loadEnrolledStudents();
    }

    #[On('teacher-added')]
    public function reloadTeachers()
    {
        $this->loadTeachers();
    }


    #[On('student-created')]
    public function studentCreated($studentId)
    {
        if ($this->courseId) {
            Enrollment::create([
                'student_id' => $studentId,
                'course_id' => $this->courseId,
                'enrollment_date' => now(),
            ]);

            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Student created successfully and enrolled in the course!'
            ]);

            $this->reloadStudents();
        }
    }

    public function render()
    {
        return view('livewire.people', ['course' => $this->course]);
    }
}
