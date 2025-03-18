<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    public function posts()
    {
        return $this->hasMany(CoursePost::class);
    }

    public function classworks()
    {
        return $this->hasMany(Classwork::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')->withPivot('role')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsToMany(User::class, 'course_user')->wherePivot('role', 'creator');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'course_user')->wherePivot('role', 'teacher');
    }
}
