<?php

namespace App\Livewire\Course;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Attendance as AttendanceModel;
use App\Models\Enrollment;
use App\Models\Course;

class Attendance extends Component
{
    public $courseId;
    public $course;
    public $students;
    public $activeTab = 'attendance';
    public $selectedDate;
    public $availableDates = [];
    public $attendanceStatus = [];

    public function mount()
    {
        $this->course = Course::findOrFail($this->courseId);
        $this->loadEnrolledStudents();
        $this->generateAvailableDates();
        $today = Carbon::today()->format('Y-m-d');
        if (isset($this->availableDates[$today])) {
            $this->selectedDate = $today;
        } else {
            if (!empty($this->availableDates)) {
                $this->selectedDate = array_key_last($this->availableDates);
            }
        }

        $this->loadAttendanceData();
    }

    public function loadEnrolledStudents()
    {
        $this->students = $this->course->students()->get();
    }

    public function generateAvailableDates()
    {
        $startDate = Carbon::parse($this->course->date_start);
        $endDate = Carbon::parse($this->course->date_end);

        $currentDate = clone $startDate;

        while ($currentDate->lte($endDate)) {
            if (in_array($currentDate->dayOfWeek, [1, 3, 5])) {
                $dateKey = $currentDate->format('Y-m-d');
                $dateDisplay = $currentDate->format('M d (D)');
                $this->availableDates[$dateKey] = $dateDisplay;
            }
            $currentDate->addDay();
        }
    }

    public function loadAttendanceData()
    {
        if (!$this->selectedDate) {
            return;
        }

        $this->attendanceStatus = [];
        $enrollments = Enrollment::where('course_id', $this->courseId)->get();

        foreach ($enrollments as $enrollment) {
            $attendance = AttendanceModel::where('enrollment_id', $enrollment->id)
                ->where('date', $this->selectedDate)
                ->first();

            if ($attendance) {
                $this->attendanceStatus[$enrollment->student_id] = $attendance->status;
            } else {
                $this->attendanceStatus[$enrollment->student_id] = 'P';
            }
        }
    }

    public function updatedSelectedDate()
    {
        $this->loadAttendanceData();
    }

    public function saveAttendance()
    {
        if (!$this->selectedDate) {
            return;
        }

        foreach ($this->attendanceStatus as $studentId => $status) {
            $enrollment = Enrollment::where('course_id', $this->courseId)
                ->where('student_id', $studentId)
                ->first();

            if ($enrollment) {
                AttendanceModel::updateOrCreate(
                    [
                        'enrollment_id' => $enrollment->id,
                        'date' => $this->selectedDate
                    ],
                    [
                        'status' => $status
                    ]
                );
            }
        }

        $this->dispatch('notify', [
            'message' => 'Attendance saved successfully!',
            'type' => 'success'
        ]);
    }

    public function getAttendanceRate($studentId)
    {
        $enrollment = Enrollment::where('course_id', $this->courseId)
            ->where('student_id', $studentId)
            ->first();

        if (!$enrollment) {
            return 0;
        }

        $totalDays = AttendanceModel::where('enrollment_id', $enrollment->id)->count();
        if ($totalDays === 0) {
            return 100;
        }

        $presentDays = AttendanceModel::where('enrollment_id', $enrollment->id)
            ->where('status', 'P')
            ->count();

        return round(($presentDays / $totalDays) * 100);
    }

    public function render()
    {
        $attendanceRates = [];
        foreach ($this->students as $student) {
            $attendanceRates[$student->id] = $this->getAttendanceRate($student->id);
        }
        return view('livewire.attendance', [
            'course' => $this->course,
            'availableDates' => $this->availableDates,
            'attendanceRates' => $attendanceRates
        ]);
    }
}
