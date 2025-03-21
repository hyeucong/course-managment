<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Courses extends Component
{
    public $courses = [];
    public $courseId;
    public $sortField = 'course_name'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    public $search = ''; // Search term

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

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // If already sorting by this field, toggle direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // New sort field, default to ascending
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->loadUserCourses();
    }

    public function clearSort()
    {
        $this->sortField = 'course_name';
        $this->sortDirection = 'asc';
        $this->loadUserCourses();
    }

    public function updatedSearch()
    {
        $this->loadUserCourses();
    }

    private function loadUserCourses()
    {
        $user = Auth::user();
        $query = $user->courses()
            ->wherePivotIn('role', ['creator', 'teacher'])
            ->where('status', '!=', 'archived')
            ->withCount('enrollments as student_count');

        // Apply search if provided
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('course_name', 'like', '%' . $this->search . '%')
                    ->orWhere('course_code', 'like', '%' . $this->search . '%');
            });
        }

        // Apply sorting
        if ($this->sortField === 'date') {
            $query->orderBy('date_start', $this->sortDirection);
        } else {
            $query->orderBy($this->sortField, $this->sortDirection);
        }

        $this->courses = $query->get();
    }
}
