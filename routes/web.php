<?php

use Illuminate\Support\Facades\Route;
use Laravel\WorkOS\Http\Middleware\ValidateSessionWithWorkOS;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', ValidateSessionWithWorkOS::class])->group(function () {
    Route::view('billing', 'sidebar.billing')->name('billing');
    Route::view('contact-us', 'sidebar.contact-us')->name('contact-us');
    Route::view('courses', 'sidebar.courses')->name('courses');
    Route::view('archived', 'sidebar.archived')->name('archived');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/course.php';
