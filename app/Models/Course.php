<?php

namespace App\Models;

use App\Models\CoursePost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the enrollments for the course.
     */
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
}
