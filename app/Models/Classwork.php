<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classwork extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description', 'due_date', 'points'];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function submissions()
    {
        return $this->hasMany(ClassworkSubmission::class);
    }
}
