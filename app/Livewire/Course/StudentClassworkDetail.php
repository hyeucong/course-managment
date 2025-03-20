<?php

namespace App\Livewire\Course;

use App\Models\ClassworkSubmission;
use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;
use App\Models\Submission;

class StudentClassworkDetail extends Component
{
    public $courseId;
    public $classworkId;
    public $classwork;
    public $course;
    public $submission;

    public function mount($courseId, $classworkId)
    {
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->course = Course::findOrFail($this->courseId);
        $this->classwork = ClassworkModel::findOrFail($this->classworkId);
        $this->submission = ClassworkSubmission::where('user_id', auth()->id())
            ->where('classwork_id', $this->classworkId)
            ->first();
    }

    public function render()
    {
        return view('livewire.student-classwork-detail');
    }

    public function submit()
    {
        // Implement submission logic here
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment submitted successfully!'
        ]);
    }
}
