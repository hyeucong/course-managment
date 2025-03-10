<?php

use App\Livewire\Course\{Attendance, Course, Details, Grades, People, Settings, Stream};
use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', ValidateSessionWithWorkOS::class])->group(function () {
    Route::get('/courses/{courseId}/overview', Course::class)->name('course');
    Route::get('/courses/{courseId}/stream', Stream::class)->name('stream');
    Route::get('/courses/{courseId}/attendance', Attendance::class)->name('attendance');
    Route::get('/courses/{courseId}/people', People::class)->name('people');
    Route::get('/courses/{courseId}/grades', Grades::class)->name('grades');
    Route::get('/courses/{courseId}/details', Details::class)->name('details');
    Route::get('/courses/{courseId}/settings', Settings::class)->name('settings');
});
