<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_id',
        'start_time',
        'end_time',
    ];

    public function days() {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function timetables() {
        return $this->hasMany(Timetable::class, 'timeslot_id');
    }
}
