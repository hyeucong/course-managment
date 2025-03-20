<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;

class ClassworkDetail extends Component
{
    public $courseId;
    public $classworkId;
    public $classwork;
    public $course;

    public function mount($courseId, $classworkId)
    {
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->course = Course::findOrFail($this->courseId);
        $this->classwork = ClassworkModel::findOrFail($this->classworkId);
    }

    public function render()
    {
        return view('livewire.classwork-detail');
    }
}
