<?php

use App\Livewire\Course;
use App\Livewire\Stream;
use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', ValidateSessionWithWorkOS::class])->group(function () {
    Route::view('dashboard', 'sidebar.dashboard')->name('dashboard');
    Route::view('analytics', 'sidebar.analytics')->name('analytics');
    Route::view('billing', 'sidebar.billing')->name('billing');
    Route::view('courses', 'sidebar.courses')->name('courses');
    Route::view('tests', 'sidebar.tests')->name('tests');

    Route::get('/courses/{courseId}', Course::class)->name('course');
    Route::get('/courses/{courseId}/stream', Stream::class)->name('stream');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
