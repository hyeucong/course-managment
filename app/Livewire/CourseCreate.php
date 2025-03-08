<?php

namespace App\Livewire;

use App\Models\Course;
use Flux\Flux;
use Livewire\Component;

class CourseCreate extends Component
{
    public $title, $description;

    public function render()
    {
        return view('livewire.course-create');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Course::create([
            'title' => $this->title,
            'description' => $this->description
        ]);
        Flux::modal("course-create")->close();

        $this->dispatch("reloadCourses");

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = "";
        $this->description = "";
    }
}
