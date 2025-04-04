<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['student_id', 'course_id', 'classwork_id', 'title', 'score', 'max_score', 'graded_by'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function classwork()
    {
        return $this->belongsTo(Classwork::class);
    }
}
