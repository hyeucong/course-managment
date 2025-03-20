<?php

namespace App\Livewire\Course;

use Flux\Flux;
use Livewire\Component;
use App\Models\StreamPost;
use App\Models\Course;

class Stream extends Component
{
    public $courseId;
    public $course;
    public $activeTab = 'stream';
    public $postContent = '';
    public $backgroundUrl;
    public $editingPost = null;
    public $editPostContent;
    public $editPostUrl;
    public $editingPostId;
    public $attachedUrl = '';

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::findOrFail($this->courseId);
        $this->backgroundUrl = $this->course->background_url;
    }

    public function editPost($postId)
    {
        $post = StreamPost::findOrFail($postId);
        $this->editingPostId = $postId;
        $this->editPostContent = $post->content;
        $this->editPostUrl = $post->attached_url;
        Flux::modal('edit-post')->show();
    }

    public function updatePost()
    {
        $this->validate([
            'editPostContent' => 'required|min:3',
            'editPostUrl' => 'nullable|url',
        ]);

        $post = StreamPost::findOrFail($this->editingPostId);
        $post->update([
            'content' => $this->editPostContent,
            'attached_url' => $this->editPostUrl,
        ]);

        $this->editingPostId = null;
        $this->editPostContent = '';
        $this->editPostUrl = '';
        Flux::modal('edit-post')->close();
    }

    public function createPost()
    {
        $this->validate([
            'postContent' => 'required|min:3',
            'attachedUrl' => 'nullable|url',
        ]);

        StreamPost::create([
            'course_id' => $this->courseId,
            'user_id' => auth()->id(),
            'content' => $this->postContent,
            'attached_url' => $this->attachedUrl,
        ]);

        $this->postContent = '';
        $this->attachedUrl = '';
    }

    public function deletePost($postId)
    {
        StreamPost::findOrFail($postId)->delete();
    }

    public function updateBackgroundUrl()
    {
        $this->validate([
            'backgroundUrl' => 'required|url',
        ]);

        $this->course->update(['background_url' => $this->backgroundUrl]);
        Flux::modal('edit-background')->close();
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
