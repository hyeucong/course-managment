<?php

namespace App\Livewire\Course;

use App\Models\Classwork as ClassworkModel;
use App\Models\ClassworkSubmission;
use App\Models\Course;
use App\Models\Student;
use Livewire\Component;

class StudentClassworkDetail extends Component
{
    public $courseId;
    public $classworkId;
    public $course;
    public $classwork;
    public $content;
    public $submission;
    public $editMode = false;
    public $student;

    public function mount($courseId, $classworkId)
    {
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->course = Course::findOrFail($this->courseId);
        $this->classwork = ClassworkModel::findOrFail($this->classworkId);

        $this->student = Student::query()
            ->select('id', 'email')
            ->firstWhere('email', session('student_email'));

        abort_if(! $this->student, 404);

        $this->loadSubmission();
    }

    public function render()
    {
        return view('livewire.student-classwork-detail');
    }

    private function loadSubmission()
    {
        $this->submission = ClassworkSubmission::query()
            ->select('id', 'classwork_id', 'student_id', 'content')
            ->where('student_id', $this->student->id)
            ->where('classwork_id', $this->classworkId)
            ->first();

        if ($this->submission) {
            $this->content = $this->submission->content;
        } else {
            $this->content = '';
        }
    }

    public function submitAssignment()
    {
        if ($this->submission) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'You have already submitted this assignment.'
            ]);
            return;
        }

        if (now() > $this->classwork->due_date) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'The due date for this assignment has passed.'
            ]);
            return;
        }

        $this->validate([
            'content' => 'required|string',
        ]);

        ClassworkSubmission::create([
            'classwork_id' => $this->classworkId,
            'student_id' => $this->student->id,
            'content' => $this->content,
        ]);

        $this->loadSubmission();
        $this->content = '';

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment submitted successfully!'
        ]);
    }

    public function editSubmission()
    {
        $this->editMode = true;
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->content = $this->submission->content;
    }

    public function updateSubmission()
    {
        $this->validate([
            'content' => 'required|string',
        ]);

        $this->submission->update([
            'content' => $this->content,
        ]);

        $this->editMode = false;
        $this->submission->refresh();
        $this->content = $this->submission->content;

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Submission updated successfully!'
        ]);
    }
}
