<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUnit extends Model
{
    use HasFactory;

    protected $fillable =[
        'course_id',
        'unit_id',
    ];



    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function units() {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
    
}
