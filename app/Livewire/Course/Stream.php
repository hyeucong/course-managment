<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\StreamPost;
use App\Models\Course;

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
