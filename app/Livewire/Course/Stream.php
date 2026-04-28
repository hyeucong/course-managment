<?php

namespace App\Livewire\Course;

use App\Models\Classwork;
use App\Models\Course;
use App\Models\StreamPost;
use Carbon\Carbon;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Stream extends Component
{
    use WithPagination;

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
    public $upcomingClasswork;

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::query()
            ->select('id', 'course_name', 'course_code', 'background_url')
            ->findOrFail($this->courseId);
        $this->backgroundUrl = $this->course->background_url;
        $this->loadSidebarData();
    }

    private function loadSidebarData()
    {
        $this->upcomingClasswork = Classwork::query()
            ->select('id', 'course_id', 'title', 'due_date')
            ->where('course_id', $this->courseId)
            ->where('due_date', '>', Carbon::now())
            ->where('due_date', '<=', Carbon::now()->addWeek())
            ->orderBy('due_date')
            ->first();
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
            'user_id' => Auth::id(),
            'content' => $this->postContent,
            'attached_url' => $this->attachedUrl,
        ]);

        $this->postContent = '';
        $this->attachedUrl = '';
        $this->resetPage(pageName: 'postsPage');
    }

    public function deletePost($postId)
    {
        StreamPost::findOrFail($postId)->delete();
        $this->resetPage(pageName: 'postsPage');
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
        $posts = StreamPost::query()
            ->select('id', 'course_id', 'user_id', 'content', 'attached_url', 'created_at')
            ->where('course_id', $this->courseId)
            ->with('user:id,name,avatar')
            ->latest()
            ->paginate(10, pageName: 'postsPage');

        return view('livewire.stream', [
            'posts' => $posts,
            'upcomingClasswork' => $this->upcomingClasswork,
        ]);
    }
}
