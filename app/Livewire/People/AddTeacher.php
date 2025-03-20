<?php

namespace App\Livewire\People;

use Flux\Flux;
use Livewire\Component;
use App\Models\User;

class AddTeacher extends Component
{
    public $email;
    public $courseId;

    public function mount($courseId)
    {
        $this->courseId = $courseId;
    }

    public function addTeacher()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user->courses()->where('course_id', $this->courseId)->exists()) {
            $this->addError('email', 'This teacher is already assigned to the course.');
            return;
        }

        $user->courses()->attach($this->courseId, ['role' => 'teacher']);

        $this->reset('email');
        $this->dispatch('teacher-added');
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Teacher added successfully!'
        ]);

        Flux::modal("add-teacher")->close();
    }

    public function render()
    {
        return view('livewire.add-teacher');
    }
}
