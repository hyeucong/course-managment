<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\StreamPost;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class Stream extends Component
{
    public $courseId;
    public $course;
    public $activeTab = 'stream';
    public $postContent = '';

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::findOrFail($this->courseId);
    }

    public function createPost()
    {
        if ($this->isStudent) {
            abort(403, 'Unauthorized action.');
        }

        $this->validate([
            'postContent' => 'required|min:3',
        ]);

        StreamPost::create([
            'course_id' => $this->courseId,
            'user_id' => auth()->id(),
            'content' => $this->postContent,
        ]);

        $this->postContent = '';
    }

    public function render()
    {
        $posts = StreamPost::where('course_id', $this->courseId)
            ->with('user')
            ->latest()
            ->get();

        return view('livewire.stream', [
            'posts' => $posts,
        ]);
    }
}
