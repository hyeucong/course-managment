<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Classwork as ClassworkModel;
use App\Models\Course;
use App\Models\ClassworkSubmission;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class ClassworkDetail extends Component
{
    public $courseId;
    public $classworkId;
    public $classwork;
    public $course;
    public $submissions;
    public $grades = [];
    public $editingGrade = null;
    public $showGradingModal = false;
    public $currentStudentId;
    public $currentSubmission;

    public function mount($courseId, $classworkId)
    {
        $this->courseId = $courseId;
        $this->classworkId = $classworkId;
        $this->course = Course::findOrFail($this->courseId);
        $this->classwork = ClassworkModel::findOrFail($this->classworkId);
        $this->loadSubmissions();
        $this->loadGrades();
    }

    public function render()
    {
        return view('livewire.classwork-detail');
    }

    public function openGradingModal($studentId)
    {
        $this->currentStudentId = $studentId;
        $this->currentSubmission = $this->submissions->firstWhere('student_id', $studentId);
        $this->editingGrade = $studentId;
        $this->showGradingModal = true;
    }

    public function closeGradingModal()
    {
        $this->showGradingModal = false;
        $this->editingGrade = null;
        $this->currentStudentId = null;
        $this->currentSubmission = null;
    }

    public function saveGrade()
    {
        $this->validate([
            "grades.{$this->currentStudentId}" => 'required|numeric|min:0|max:' . $this->classwork->points,
        ]);

        Grade::updateOrCreate(
            [
                'classwork_id' => $this->classworkId,
                'student_id' => $this->currentStudentId,
                'course_id' => $this->courseId,
            ],
            [
                'title' => $this->classwork->title,
                'score' => $this->grades[$this->currentStudentId],
                'max_score' => $this->classwork->points,
                'graded_by' => Auth::id(),
            ]
        );

        $this->closeGradingModal();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Grade saved successfully!'
        ]);
    }

    public function loadSubmissions()
    {
        $this->submissions = ClassworkSubmission::where('classwork_id', $this->classworkId)
            ->with('student')
            ->get();
    }

    public function loadGrades()
    {
        $grades = Grade::where('classwork_id', $this->classworkId)->get();
        foreach ($grades as $grade) {
            $this->grades[$grade->student_id] = $grade->score;
        }
    }

    public function editGrade($studentId)
    {
        $this->editingGrade = $studentId;
    }
}
