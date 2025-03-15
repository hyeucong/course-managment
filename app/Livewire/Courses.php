<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Enrollment;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Courses extends Component
{
    public $courses = [];
    public $courseId;

    public function mount()
    {
        $this->loadCoursesWithStudentCounts();
    }

    public function render()
    {
        return view('livewire.courses');
    }

    #[On('reloadCourses')]
    public function reloadCourses()
    {
        $this->loadCoursesWithStudentCounts();
    }

    private function loadCoursesWithStudentCounts()
    {
        // Get all courses with their enrollment counts
        $this->courses = Course::withCount('enrollments as student_count')->get();
    }

    public function delete($id)
    {
        $this->courseId = $id;
        Flux::modal('delete-course')->show();
    }

    public function destroy()
    {
        Course::findOrFail($this->courseId)->delete();
        Flux::modal('delete-course')->close();
        $this->reloadCourses();
    }
}
