<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerUnit extends Model
{
    use HasFactory;

    protected $table = 'lecturer_units';

    protected $fillable = [
        'lecturer_id',
        'unit_id',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
