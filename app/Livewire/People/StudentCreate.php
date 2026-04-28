<?php

namespace App\Livewire\People;

use App\Models\Student;
use Flux\Flux;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;
use Livewire\Component;

class StudentCreate extends Component
{
    public $first_name, $last_name, $email, $phone;
    public $studentId;

    public function render()
    {
        return view('livewire.student-create');
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('students', 'email')],
            'phone' => 'required',
        ]);

        try {
            $student = Student::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone
            ]);
        } catch (QueryException $exception) {
            if (($exception->errorInfo[0] ?? null) === '23505') {
                $this->addError('email', 'This email is already registered to another student.');

                return;
            }

            throw $exception;
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Student created successfully!'
        ]);

        Flux::modal("student-create")->close();
        $this->dispatch("reloadStudents");
        $this->dispatch("student-created", $student->id);
        $this->resetForm();
    }


    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
    }
}
