<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'course_code',
        'course_type',
        'course_capacity',
        'department_id',
    ];


    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id'); // Adjust to the actual foreign key column name
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }



    public function room()
    {
        return $this->hasOne(CourseRoom::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class, 'course_units');
    }

    public function timetables() {
        return $this->hasMany(Timetable::class, 'courses_id');
    }

   
}
