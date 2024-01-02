<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Unit;
use App\Models\Course;
use App\Models\Timeslot;
use App\Models\Classroom;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Models\ClassroomTimelines;

class TimetableController extends Controller
{

    public function dashb(){


        return view('Timetable.timetabler.dashb');
    }

    public function allclassrooms(){

        $classrooms = Classroom::all();

        return view('Timetable.timetabler.classroom.allclassrooms', compact('classrooms'));
    }

    public function add_classroom(){

        return view('Timetable.timetabler.classroom.add_classroom');

    }



    public function storeRoom(Request $request)
    {

        $room = Classroom::create([
            'room_name' => $request->input('room_name'),
            'room_type' => $request->input('room_type'),
            'room_capacity' => $request->input('room_capacity'),

        ]);

        return to_route ('allclassrooms')->with('success', 'Room Added successfully');

    }


    public function viewTimetable(){

        // $rooms = Timetable::distinct('classroom_id')->pluck('classroom_id');
        // // $rooms = Classroom::whereIn('id', $classroomIds)->get();


        // $mondayMorng = Timetable::where('day_id', 1)
        // ->where('timeslot_id', 1)
        // ->get();

        // $mondayLate = Timetable::where('day_id', 1)
        // ->where('timeslot_id', 2)
        // ->get();

        // $mondayAfternoon = Timetable::where('day_id', 1)
        // ->where('timeslot_id', 3)
        // ->get();

        // $mondayEvening = Timetable::where('day_id', 1)
        // ->where('timeslot_id', 4)
        // ->get();

        // $tuesdayMorning = Timetable::where('day_id', 2)
        // ->where('timeslot_id', 1)
        // ->get();

        // $tuesdayLate = Timetable::where('day_id', 2)
        // ->where('timeslot_id', 2)
        // ->get();

        // $tuesdayNoon = Timetable::where('day_id', 2)
        // ->where('timeslot_id', 3)
        // ->get();

        // $tuesdayEvening = Timetable::where('day_id', 2)
        // ->where('timeslot_id', 4)
        // ->get();
        $classroomIds = Timetable::select('classroom_id')->distinct()->pluck('classroom_id');


        $uniqueDays = Timetable::select('day_id')->distinct()->pluck('day_id');

        $timetableData = [];
        foreach ($uniqueDays as $day) {
            $dayData = [];

            // Fetch data for the current day
            $dayData['day_id'] = $day;
            $dayData['timeslots'] = Timetable::where('day_id', $day)->get();

            $timetableData[] = $dayData;
        }

        return view('Timetable.timetabler.final.view_timetable', compact(
            'timetableData',
            'classroomIds'
            // 'rooms',
            // 'mondayMorng',
            // 'mondayLate',
            // 'mondayAfternoon',
            // 'mondayEvening',
            // 'tuesdayMorning',
            // 'tuesdayLate',
            // 'tuesdayNoon',
            // 'tuesdayEvening'
        ));


    }


    public function addSchedule(){



        return view('Timetable.timetabler.final.add_schedule');

    }





}
