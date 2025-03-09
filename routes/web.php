<?php

use App\Livewire\Course;
use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', ValidateSessionWithWorkOS::class])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('analytics', 'analytics')->name('analytics');
    Route::view('billing', 'billing')->name('billing');
    Route::view('courses', 'courses')->name('courses');
    Route::view('tests', 'tests')->name('tests');
    Route::get('/courses/{courseId}', Course::class)->name('course');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
