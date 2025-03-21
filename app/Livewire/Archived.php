<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Archived extends Component
{
    public $courses = [];
    public $courseId;

    public function mount()
    {
        $this->loadUserCourses();
    }

    public function render()
    {
        return view('livewire.archived');
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
            ->where('status', 'archived')
            ->withCount('enrollments as student_count')
            ->get();
    }
}
