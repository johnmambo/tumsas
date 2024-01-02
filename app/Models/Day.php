<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'day_name',
    ];

    public function timeslots()
    {
        return $this->hasMany(Timeslot::class, 'day_id');
    }

    public function timetables() {
        return $this->hasMany(Timetable::class, 'day_id');
    }

}
