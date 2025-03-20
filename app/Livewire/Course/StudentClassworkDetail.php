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
    public $editMode = false;
    public $student;

    public function mount($courseId, $classworkId)
    {
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->course = Course::findOrFail($this->courseId);
        $this->classwork = ClassworkModel::findOrFail($this->classworkId);

        // Get the student based on the email in the session
        $this->student = Student::where('email', session('student_email'))->firstOrFail();

        $this->checkSubmission();
    }

    public function render()
    {
        return view('livewire.student-classwork-detail');
    }

    private function checkSubmission()
    {
        $this->submission = ClassworkSubmission::where('student_id', $this->student->id)
            ->where('classwork_id', $this->classworkId)
            ->first();

        if ($this->submission) {
            $this->content = $this->submission->content;
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

        $this->checkSubmission();
        $this->reset(['content']);

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
        $this->checkSubmission();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Submission updated successfully!'
        ]);
    }
}
