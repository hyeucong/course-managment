<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Courses extends Component
{
    public $courses = [];
    public $courseId;

    public function mount()
    {
        $this->loadUserCourses();
    }

    public function render()
    {
        return view('livewire.courses');
    }

    #[On('reloadCourses')]
    public function reloadCourses()
    {
        $this->loadUserCourses();
    }
    private function loadUserCourses()
    {
        $user = Auth::user();
        $this->courses = $user->courses()
            ->wherePivotIn('role', ['creator', 'teacher'])
            ->where('status', '!=', 'archived')
            ->withCount('enrollments as student_count')
            ->get();
    }
}
