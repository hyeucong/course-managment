<?php

namespace App\Livewire\Course;

use App\Models\Attendance as AttendanceModel;
use App\Models\Course;
use App\Models\Enrollment;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Attendance extends Component
{
    public $courseId;

    public $course;

    public $students = [];

    public $activeTab = 'attendance';

    public $selectedDate;

    public $availableDates = [];

    public $attendanceStatus = [];

    public $attendanceRates = [];

    protected array $enrollmentIdsByStudent = [];

    protected array $studentIdsByEnrollment = [];

    public function mount()
    {
        $this->course = Course::findOrFail($this->courseId);
        $this->loadEnrolledStudents();
        $this->generateAvailableDates();
        $today = Carbon::today()->format('Y-m-d');
        if (isset($this->availableDates[$today])) {
            $this->selectedDate = $today;
        } else {
            if (! empty($this->availableDates)) {
                $this->selectedDate = array_key_last($this->availableDates);
            }
        }

        $this->loadAttendanceData();
    }

    public function loadEnrolledStudents()
    {
        $enrollments = Enrollment::with('student')
            ->where('course_id', $this->courseId)
            ->get();

        $this->students = $enrollments
            ->pluck('student')
            ->filter()
            ->values();

        $this->enrollmentIdsByStudent = $enrollments
            ->pluck('id', 'student_id')
            ->map(fn ($id) => (int) $id)
            ->all();

        $this->studentIdsByEnrollment = $enrollments
            ->pluck('student_id', 'id')
            ->map(fn ($studentId) => (int) $studentId)
            ->all();

        $this->loadAttendanceRates();
    }

    public function generateAvailableDates()
    {
        $this->availableDates = [];

        $startDate = Carbon::parse($this->course->date_start);
        $endDate = Carbon::parse($this->course->date_end);
        $currentDate = clone $startDate;

        $scheduleDays = $this->course->schedule === '135' ? [1, 3, 5] : [2, 4, 6];
        $attendanceDates = AttendanceModel::query()
            ->when(
                ! empty($this->enrollmentIdsByStudent),
                fn ($query) => $query->whereIn('enrollment_id', array_values($this->enrollmentIdsByStudent)),
                fn ($query) => $query->whereRaw('1 = 0')
            )
            ->distinct()
            ->pluck('date')
            ->flip();

        while ($currentDate->lte($endDate)) {
            if (in_array($currentDate->dayOfWeek, $scheduleDays)) {
                $dateKey = $currentDate->format('Y-m-d');
                $dateDisplay = $currentDate->format('Y M d (D)');

                $this->availableDates[$dateKey] = [
                    'display' => $dateDisplay,
                    'hasAttendance' => $attendanceDates->has($dateKey),
                ];
            }

            $currentDate->addDay();
        }
    }

    public function loadAttendanceData()
    {
        if (! $this->selectedDate) {
            return;
        }

        $this->attendanceStatus = array_fill_keys(array_keys($this->enrollmentIdsByStudent), 'P');

        $attendanceByEnrollment = AttendanceModel::query()
            ->whereIn('enrollment_id', array_values($this->enrollmentIdsByStudent))
            ->where('date', $this->selectedDate)
            ->get(['enrollment_id', 'status'])
            ->pluck('status', 'enrollment_id');

        foreach ($attendanceByEnrollment as $enrollmentId => $status) {
            $studentId = $this->studentIdsByEnrollment[$enrollmentId] ?? null;

            if ($studentId !== null) {
                $this->attendanceStatus[$studentId] = $status;
            }
        }
    }

    public function updatedSelectedDate()
    {
        $this->loadAttendanceData();
    }

    public function saveAttendance()
    {
        if (! $this->selectedDate || empty($this->attendanceStatus)) {
            return;
        }

        $timestamp = now();
        $attendanceRows = collect($this->attendanceStatus)
            ->map(function ($status, $studentId) use ($timestamp) {
                $enrollmentId = $this->enrollmentIdsByStudent[(int) $studentId] ?? null;

                if ($enrollmentId === null) {
                    return null;
                }

                return [
                    'enrollment_id' => $enrollmentId,
                    'date' => $this->selectedDate,
                    'status' => $status,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            })
            ->filter()
            ->values()
            ->all();

        if (empty($attendanceRows)) {
            return;
        }

        AttendanceModel::upsert($attendanceRows, ['enrollment_id', 'date'], ['status', 'updated_at']);

        $this->generateAvailableDates();
        $this->loadAttendanceRates();

        $this->dispatch('notify', [
            'message' => 'Attendance saved successfully!',
            'type' => 'success',
        ]);
    }

    public function loadAttendanceRates()
    {
        $this->attendanceRates = [];

        if (empty($this->enrollmentIdsByStudent)) {
            return;
        }

        $summaryMap = AttendanceModel::query()
            ->selectRaw("enrollment_id, COUNT(*) as total_days, SUM(CASE WHEN status = 'P' THEN 1 ELSE 0 END) as present_days")
            ->whereIn('enrollment_id', array_values($this->enrollmentIdsByStudent))
            ->groupBy('enrollment_id')
            ->get()
            ->keyBy('enrollment_id');

        foreach ($this->enrollmentIdsByStudent as $studentId => $enrollmentId) {
            $summary = $summaryMap->get($enrollmentId);
            $totalDays = (int) ($summary->total_days ?? 0);
            $presentDays = (int) ($summary->present_days ?? 0);

            $this->attendanceRates[$studentId] = $totalDays === 0
                ? 100
                : round(($presentDays / $totalDays) * 100);
        }
    }

    public function getAttendanceRate($studentId)
    {
        return $this->attendanceRates[$studentId] ?? 0;
    }

    #[Computed]
    public function availableDatesWithAttendance()
    {
        return $this->availableDates;
    }

    public function render()
    {
        return view('livewire.attendance', [
            'course' => $this->course,
            'availableDates' => $this->availableDates,
            'attendanceRates' => $this->attendanceRates,
        ]);
    }
}
