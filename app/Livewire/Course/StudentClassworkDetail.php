<?php

namespace App\Livewire\Course;

use App\Models\ClassworkSubmission;
use App\Models\Student;
use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;

class StudentClassworkDetail extends Component
{
    public $courseId;
    public $classworkId;
    public $course;
    public $classwork;
    public $content;
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

    public function submitAssignment()
    {
        $this->validate([
            'content' => 'required|string',
        ]);

        ClassworkSubmission::create([
            'classwork_id' => $this->classworkId,
            'student_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->submission = ClassworkSubmission::where('classwork_id', $this->classworkId)
            ->where('student_id', auth()->id())
            ->first();

        $this->reset(['content']);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment submitted successfully!'
        ]);
    }
}
