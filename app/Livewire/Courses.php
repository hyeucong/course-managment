<?php

namespace App\Livewire;

use App\Models\Course;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Courses extends Component
{
    public $courses = [];
    public $courseId;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function render()
    {
        $total = \App\Models\Student::count();
        return view('livewire.courses', ['total' => $total]);
    }

    #[On('reloadCourses')]
    public function reloadCourses()
    {
        $this->courses = Course::all();
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
