<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetables';

    public function classroom() {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function day() {
        return $this->belongsTo(Day::class, 'day_id');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function timeslot() {
        return $this->belongsTo(Timeslot::class, 'timeslot_id');
    }

    public function unit() {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
