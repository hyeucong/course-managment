<?php

namespace App\Livewire\People;

use App\Models\Student;
use Flux\Flux;
use Livewire\Component;

class StudentCreate extends Component
{
    public $first_name, $last_name, $email, $phone;

    public function render()
    {
        return view('livewire.student-create');
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Course created successfully!'
        ]);

        Student::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        Flux::modal("student-create")->close();
        $this->dispatch("reloadStudents");
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
