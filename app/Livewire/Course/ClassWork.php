<?php

namespace App\Livewire\Course;

use Flux\Flux;
use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;

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
        'points' => 'required|integer|min:0',
        'dueDate' => 'required|date',
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

        ClassworkModel::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'description' => $this->description,
            'points' => $this->points,
            'due_date' => $this->dueDate,
            // 'created_by' => Auth::id(),
        ]);

        $this->reset(['title', 'description', 'points', 'dueDate']);
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Assignment created successfully!'
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
