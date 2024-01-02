<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'student_type',
        'course_id',
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id'); 
    }

}
