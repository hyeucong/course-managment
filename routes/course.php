<?php

use App\Http\Middleware\CheckStudentEmail;
use App\Http\Middleware\EnsureCourseAccess;
use App\Livewire\Course\{Attendance, ClassWork, Grades, People, Settings, Stream};
use App\Livewire\Course\ClassworkDetail;
use App\Livewire\Course\StudentClassworkDetail;
use App\Livewire\StudentEmailEntry;
use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::middleware(['auth', ValidateSessionWithWorkOS::class, EnsureCourseAccess::class])->group(function () {
    Route::get('/courses/{courseId}/stream', Stream::class)->name('stream');
    Route::get('/courses/{courseId}/attendance', Attendance::class)->name('attendance');
    Route::get('/courses/{courseId}/people', People::class)->name('people');
    Route::get('/courses/{courseId}/grades', Grades::class)->name('grades');
    Route::get('/courses/{courseId}/classwork', ClassWork::class)->name('classwork');
    Route::get('/courses/{courseId}/settings', Settings::class)->name('settings');

    Route::get('/courses/{courseId}/classwork/{classworkId}', ClassworkDetail::class)->name('classwork.detail');
});

Route::middleware([CheckStudentEmail::class])->group(function () {
    Route::get('/student/courses/{courseId}/stream', Stream::class)->name('student.stream');
    Route::get('/student/courses/{courseId}/classwork', ClassWork::class)->name('student.classwork');

    Route::get('/student/courses/{courseId}/classwork/{classworkId}', StudentClassworkDetail::class)->name('student.classwork.detail');
});

Route::get('/student/email/{courseId?}', StudentEmailEntry::class)->name('student.email');
