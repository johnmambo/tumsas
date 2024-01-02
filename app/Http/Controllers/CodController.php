<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Unit;
use App\Models\Course;

use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Timeslot;
use App\Models\Classroom;
use App\Models\CourseRoom;
use App\Models\CourseUnit;
use App\Models\Department;
use App\Models\LecturerUnit;
use Illuminate\Http\Request;
use App\Models\LecturerTimelines;
use Brian2694\Toastr\Facades\Toastr;


class CodController extends Controller
{
    public function dashboard(){

        return view('Timetable.cod.dashboard');
    }

    public function alldepartments(){

        $departments = Department::get();

        return view('Timetable.cod.department.alldepartments', compact('departments'));
    }

    public function add_department(){


        return view('Timetable.cod.department.add_department');
    }

    public function storeDepartment(Request $request)
    {
        // Validate incoming data (example)
        $validatedData = $request->validate([
            'dep_name' => ['required', 'string', 'max:255'],
            'dep_code' => ['required', 'string', 'max:255'],
        ]);

        // Create a new Department instance
        $department = new Department();
        $department->dep_name = $validatedData['dep_name'];
        $department->dep_code = $validatedData['dep_code'];


        $department->save();

        return to_route ('alldepartments')->with('success', 'Department created successfully');

    }


    public function allcourses(){

        $courses = Course::get();

        return view('Timetable.cod.course.allcourses', compact('courses'));
    }

    public function addcourse(){

        $departments = Department::get();
        return view('Timetable.cod.course.addcourse', compact('departments'));
    }

    public function storeCourse(Request $request)
    {

        $course = Course::create([
            'course_name' => $request->input('course_name'),
            'course_code' => $request->input('course_code'),
            'course_type' => $request->input('course_type'),
            'course_capacity' => $request->input('course_capacity'),
            'department_id' => $request->input('department_id'),

        ]);
        return to_route ('allcourses')->with('success', 'Course created successfully');
    }




    public function allstudents(){

        $students  = Student::all();

        return view('Timetable.cod.student.allstudents', compact('students'));
    }

    public function add_student(){

        $courses = Course::get();

        return view('Timetable.cod.student.add_student', compact('courses'));
    }

    public function storeStudent(Request $request)
    {

        $student = Student::create([
            'student_name' => $request->input('student_name'),
            'student_type' => $request->input('student_type'),
            'course_id' => $request->input('course_id'),

        ]);
        Toastr::success('student stored successfully', 'Congrats', ["positionClass" => "toast-bottom-right"]);

        return to_route ('allstudents')->with('success', 'student stored successfully');


    }
    public function edit_student($id){
        $students  = Student::all();
        $courses = Course::get();


        return view('Timetable.cod.student.edit_student', compact('students', 'courses'));
    }

    public function allunits(){

        $units = Unit::all();

        return view ('Timetable.cod.unit.allunits', compact('units'));

    }


    public function add_unit(){
        $courses = Course::all();

        return view ('Timetable.cod.unit.add_unit', compact('courses'));
    }

    public function storeUnit(Request $request)
    {

        $validatedData = $request->validate([
            'unit_name' => ['required', 'string', 'max:255'],
            'unit_code' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'string', 'max:255'],

        ]);

        $unit = new Unit();
        $unit->unit_name = $validatedData['unit_name'];
        $unit->unit_code = $validatedData['unit_code'];
        $unit->course_id = $validatedData['course_id'];


        $unit->save();

        return to_route ('allunits')->with('success', 'Unit created successfully');

    }





    public function viewCourse($id){

        $course = Course::findOrFail($id);
        $units = Unit::all();

        return view('Timetable.cod.course.view_course', compact('course', 'units'));
    }



    public function addCourseUnit($id){

        $course = Course::findOrFail($id);


        $units = Unit::all();

        return view ('Timetable.cod.course.add_course_unit', compact('course', 'units'));
    }



    public function assignRoom($id){

        $course = Course::findOrFail($id);

        $classrooms = Classroom::all();

        return view ('Timetable.cod.course.assign_room', compact('course', 'classrooms'));
    }



    public function assignUnits(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $unitId = $request->input('unit_id');

        // Check if the unit is already assigned to the course
        if (!$course->units()->where('unit_id', $unitId)->exists()) {
            CourseUnit::create([
                'course_id' => $course->id,
                'unit_id' => $unitId
            ]);
            return redirect()->back()->with('success', 'Unit assigned successfully');
        } else {
            return redirect()->back()->with('error', 'Unit already assigned to the course');
        }
    }





    public function storeAssignedRoom(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);

        // Check if the course already has a room assigned
        $hasRoom = $course->room()->exists();

        if (!$hasRoom) {
            // Get the classroom ID from the request input
            $classroomId = $request->input('classroom_id');

            // Validate classroom existence (optional)
            $classroom = Classroom::findOrFail($classroomId);

            // Create a new CourseRoom record
            $courseRoom = new CourseRoom([
                'course_id' => $course->id,
                'classroom_id' => $classroomId,
            ]);

            // Save the association between course and classroom in course_rooms table
            $course->room()->save($courseRoom);



            return redirect()->route('view_course', $courseId)->with('success', 'Room assigned successfully to the course!');
        }

        return back()->with('error', 'Course already has a room assigned.');
    }




    public function all_lecturers(){

        $lecturers = Lecturer::all();


        return view('Timetable.cod.lecturer.all_lecturers', compact ('lecturers'));
    }

    public function add_lecturer(){

        return view('Timetable.cod.lecturer.add_lecturer');

    }


    public function storeLecturer(Request $request)
    {

        $lec = Lecturer::create([
            'lec_name' => $request->input('lec_name'),

        ]);

        return to_route ('all_lecturers')->with('success', 'Lecturer Added successfully');

    }

    public function view_lec($id){

        $lecturer = Lecturer::findOrFail($id);


        return view('Timetable.cod.lecturer.view_lec', compact('lecturer'));


    }

    public function assignUnit($id){

        $lecturer = Lecturer::findOrFail($id);
        $units = Unit::all();

        return view('Timetable.cod.lecturer.assign_unit', compact('lecturer', 'units'));


    }



    public function storeAssignedUnit(Request $request, $id)
    {

        // dd(request());

        $request->validate([
            'unit_id' => 'required|exists:units,id',
        ]);

        $lecturerUnit = new LecturerUnit([
            'lecturer_id' => $id,
            'unit_id' => $request->input('unit_id'),
        ]);

        $lecturerUnit->save();

        return redirect()->route('view_lec', $id)->with('success', 'Unit assigned successfully');
    }


    public function days(){

        $days = Day::all();

        return view('Timetable.cod.days.days', compact('days'));

    }

    public function addDay(){

        return view('Timetable.cod.days.add_day');
    }

    public function createDay(Request $request){

        $day = Day::create([
            'day_name' => $request->input('day_name'),

        ]);

        return to_route ('days')->with('success', 'Day Added successfully');

    }


    public function viewDay($id){
        $day = Day::findOrFail($id);

        return view('Timetable.cod.days.view_day', compact('day'));
    }

    public function allslots(){


        $slots = Timeslot::all();

        return view('Timetable.cod.timeslots.allslots', compact( 'slots'));
    }

    public function addslot(){

        $days = Day::all();

        return view ('Timetable.cod.timeslots.addslot', compact('days'));
    }

    public function storeSlot(Request $request){
        // dd(request());

        $slot = Timeslot::create([
            'day_id' => $request->input('day_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),

        ]);

        return to_route ('allslots')->with('success', 'Slot Added successfully');

    }


}





