<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use App\Models\Student;
use App\Models\Classwork;
use App\Models\Grade;

class Grades extends Component
{
    public $courseId;
    public $course;
    public $activeTab = 'grades';
    public $grades = [];
    public $totalGrades = [];

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::findOrFail($this->courseId);
        $this->loadGrades();
    }

    public function render()
    {
        $students = $this->course->students;
        $classworks = $this->course->classworks;

        return view('livewire.grades', [
            'course' => $this->course,
            'students' => $students,
            'classworks' => $classworks,
            'grades' => $this->grades,
            'totalGrades' => $this->totalGrades,
        ]);
    }

    private function loadGrades()
    {
        $grades = Grade::where('course_id', $this->courseId)->get();

        foreach ($grades as $grade) {
            $this->grades[$grade->student_id][$grade->classwork_id] = $grade->score;

            if (!isset($this->totalGrades[$grade->student_id])) {
                $this->totalGrades[$grade->student_id] = 0;
            }
            $this->totalGrades[$grade->student_id] += $grade->score;
        }
    }
}
