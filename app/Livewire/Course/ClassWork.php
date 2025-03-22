<?php

namespace App\Livewire\Course;

use App\Models\Enrollment;
use App\Models\Student;
use Flux\Flux;
use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;
use Mail;

class Classwork extends Component
{
    public $courseId;
    public $course;
    public $activeTab = 'classwork';
    public $title;
    public $description;
    public $points;
    public $dueDate;
    public $editingClassworkId;
    public $isStudent = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'points' => 'required|integer|min:0|max:100',
        'dueDate' => 'required|date|after:now',
    ];

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::findOrFail($this->courseId);
        $this->isStudent = request()->routeIs('student.classwork');
    }


    public function render()
    {
        $classworks = ClassworkModel::where('course_id', $this->courseId)->orderBy('due_date')->get();
        return view('livewire.classwork', [
            'course' => $this->course,
            'classworks' => $classworks,
        ]);
    }

    public function createClasswork()
    {
        $this->validate();

        $classwork = ClassworkModel::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'description' => $this->description,
            'points' => $this->points,
            'due_date' => $this->dueDate,
            // 'created_by' => Auth::id(),
        ]);

        // Get all enrolled students for this course
        $enrollments = Enrollment::where('course_id', $this->courseId)->get();

        // Queue email to each enrolled student
        foreach ($enrollments as $enrollment) {
            $student = Student::find($enrollment->student_id);
            if ($student && $student->email) {
                Mail::to($student->email)->queue(new \App\Mail\ClassworkCreated(
                    $student->email,
                    $this->courseId,
                    $classwork->id,
                    $classwork->title,
                    $this->course->course_name
                ));
            }
        }

        $this->reset(['title', 'description', 'points', 'dueDate']);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment created successfully and notifications queued for students!'
        ]);

        Flux::modal("create-classwork")->close();
    }


    public function editClasswork($classworkId)
    {
        $classwork = ClassworkModel::findOrFail($classworkId);
        $this->editingClassworkId = $classwork->id;
        $this->title = $classwork->title;
        $this->description = $classwork->description;
        $this->points = $classwork->points;
        $this->dueDate = $classwork->due_date->format('Y-m-d\TH:i');

        Flux::modal('edit-classwork')->show();
    }

    public function updateClasswork()
    {
        $this->validate();

        $classwork = ClassworkModel::findOrFail($this->editingClassworkId);
        $classwork->update([
            'title' => $this->title,
            'description' => $this->description,
            'points' => $this->points,
            'due_date' => $this->dueDate,
        ]);

        $this->reset(['editingClassworkId', 'title', 'description', 'points', 'dueDate']);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment updated successfully!'
        ]);

        Flux::modal('edit-classwork')->close();
    }

    public function deleteClasswork($classworkId)
    {
        $classwork = ClassworkModel::findOrFail($classworkId);
        $classwork->delete();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment deleted successfully!'
        ]);
    }

    public function cancelEdit()
    {
        $this->reset(['editingClassworkId', 'title', 'description', 'points', 'dueDate']);
    }

    public function openClassworkDetails($classworkId)
    {
        if ($this->isStudent) {
            return $this->redirect(route('student.classwork.detail', ['courseId' => $this->courseId, 'classworkId' => $classworkId]), navigate: true);
        } else {
            return $this->redirect(route('classwork.detail', ['courseId' => $this->courseId, 'classworkId' => $classworkId]), navigate: true);
        }
    }
}
