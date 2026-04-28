<?php

namespace App\Livewire\People;

use App\Models\User;
use Flux\Flux;
use Livewire\Component;

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
            'email' => 'required|email',
        ]);

        $user = User::query()
            ->select('id')
            ->where('email', $this->email)
            ->first();

        if (! $user) {
            $this->addError('email', 'Teacher not found.');

            return;
        }

        if ($user->courses()->where('course_id', $this->courseId)->exists()) {
            $this->addError('email', 'This teacher is already assigned to the course.');

            return;
        }

        $user->courses()->syncWithoutDetaching([
            $this->courseId => ['role' => 'teacher'],
        ]);

        $this->reset('email');
        $this->dispatch('teacher-added');
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Teacher added successfully!',
        ]);

        Flux::modal('add-teacher')->close();
    }

    public function render()
    {
        return view('livewire.add-teacher');
    }
}
