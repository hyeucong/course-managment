<?php

namespace App\Livewire\Course;

use App\Mail\StudentCreated;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\User;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;
use Mail;

class People extends Component
{
    public $students;
    public $teachers;
    public $courseId, $activeTab = 'people', $course;
    public $editingStudent = null;
    public $studentFirstName, $studentLastName, $studentEmail;

    public function mount()
    {
        $this->course = Course::findOrFail($this->courseId);
        $this->loadEnrolledStudents();
        $this->loadTeachers();
    }

    public function loadEnrolledStudents()
    {
        $this->students = $this->course->students()->get();
    }

    public function loadTeachers()
    {
        $this->teachers = $this->course->users()->get();
    }

    #[On('reloadStudents')]
    public function reloadStudents()
    {
        $this->loadEnrolledStudents();
    }

    #[On('teacher-added')]
    public function reloadTeachers()
    {
        $this->loadTeachers();
    }

    #[On('student-created')]
    public function studentCreated($studentId)
    {
        if ($this->courseId) {
            Enrollment::create([
                'student_id' => $studentId,
                'course_id' => $this->courseId,
                'enrollment_date' => now(),
            ]);

            $this->sendEmailToStudent($studentId);

            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Student created successfully and enrolled in the course!'
            ]);

            $this->reloadStudents();
        }

    }

    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        $this->studentId = $student->id;
        $this->studentFirstName = $student->first_name;
        $this->studentLastName = $student->last_name;
        $this->studentEmail = $student->email;
        Flux::modal('edit-student')->show();
    }

    public function updateStudent()
    {
        $this->validate([
            'studentFirstName' => 'required',
            'studentLastName' => 'required',
            'studentEmail' => 'required|email',
        ]);

        $student = Student::findOrFail($this->studentId);
        $student->update([
            'first_name' => $this->studentFirstName,
            'last_name' => $this->studentLastName,
            'email' => $this->studentEmail,
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Student updated successfully!'
        ]);

        $this->reloadStudents();
    }

    public function removeStudent($id)
    {
        $enrollment = Enrollment::where('student_id', $id)
            ->where('course_id', $this->courseId)
            ->first();

        if ($enrollment) {
            $enrollment->delete();
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Student removed from the course successfully!'
            ]);
            $this->reloadStudents();
        } else {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Student not found in this course.'
            ]);
        }
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);

        // First remove all enrollments
        Enrollment::where('student_id', $id)->delete();

        // Then delete the student
        $student->delete();

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Student deleted from the system successfully!'
        ]);

        $this->reloadStudents();
    }


    public function removeTeacher($teacherId)
    {
        $course = Course::findOrFail($this->courseId);

        if ($course->teachers()->where('user_id', $teacherId)->where('role', 'creator')->exists()) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Cannot remove the course creator.'
            ]);
            return;
        }

        $course->teachers()->detach($teacherId);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Teacher removed successfully!'
        ]);

        $this->reloadTeachers();
    }

    public function sendEmailToStudent($studentId)
    {
        $student = Student::findOrFail($studentId);

        Mail::to($student->email)->send(new StudentCreated($student));

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Email sent to student successfully!'
        ]);
    }

    public function render()
    {
        return view('livewire.people', [
            'course' => $this->course,
        ]);
    }
}
