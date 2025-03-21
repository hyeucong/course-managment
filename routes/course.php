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
    Route::get('/courses/stream/{courseId}', Stream::class)->name('stream');
    Route::get('/courses/attendance/{courseId}', Attendance::class)->name('attendance');
    Route::get('/courses/people/{courseId}', People::class)->name('people');
    Route::get('/courses/grades/{courseId}', Grades::class)->name('grades');
    Route::get('/courses/classwork/{courseId}', ClassWork::class)->name('classwork');
    Route::get('/courses/settings/{courseId}', Settings::class)->name('settings');

    Route::get('/courses/classwork/{courseId}/{classworkId}', ClassworkDetail::class)->name('classwork.detail');
});

Route::middleware([CheckStudentEmail::class])->group(function () {
    Route::get('/student/stream/{courseId}', Stream::class)->name('student.stream');
    Route::get('/student/classwork/{courseId}', ClassWork::class)->name('student.classwork');

    Route::get('/student/classwork/{courseId}/{classworkId}', StudentClassworkDetail::class)->name('student.classwork.detail');
});

Route::get('/student/email/{courseId?}', StudentEmailEntry::class)->name('student.email');
