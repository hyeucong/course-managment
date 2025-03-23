<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassworkSubmission extends Model
{
    use HasFactory;

    protected $fillable = ['classwork_id', 'student_id', 'content', 'points'];

    public function classwork()
    {
        return $this->belongsTo(Classwork::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
