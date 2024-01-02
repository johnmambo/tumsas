<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\CodController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('Timetable/cod/dashboard', [CodController::class, 'dashboard'])->name('dashboard');
Route::get('Timetable/cod/department/alldepartments', [CodController::class, 'alldepartments'])->name('alldepartments');
Route::get('Timetable/cod/department/add_department', [CodController::class, 'add_department'])->name('add_department');
Route::post('Timetable/cod/department/add_department/', [CodController::class, 'storeDepartment']);


Route::get('Timetable/cod/course/allcourses', [CodController::class, 'allcourses'])->name('allcourses');
Route::get('Timetable/cod/course/addcourse', [CodController::class, 'addcourse'])->name('addcourse');
Route::post('Timetable/cod/course/addcourse/', [CodController::class, 'storeCourse']);

Route::get('Timetable/cod/unit/allunits', [CodController::class, 'allunits'])->name('allunits');
Route::get('Timetable/cod/unit/add_unit', [CodController::class, 'add_unit'])->name('add_unit');
Route::post('Timetable/cod/unit/add_unit/', [CodController::class, 'storeUnit']);

Route::get('Timetable/cod/course/course_units', [CodController::class, 'course_units'])->name('course_units');
Route::get('Timetable/cod/course/add_course_unit/{id}', [CodController::class, 'addCourseUnit'])->name('addCourseUnit');
Route::post('Timetable/cod/course/add_course_unit/{id}', [CodController::class, 'assignUnits']);

Route::get('Timetable/cod/course/assign_room/{id}', [CodController::class, 'assignRoom'])->name('assign_room');
Route::post('Timetable/cod/course/assign_room/{id}', [CodController::class, 'storeAssignedRoom']);


Route::get('Timetable/cod/course/course_units/{id}', [CodController::class, 'viewCourse'])->name('view_course');


Route::get('Timetable/cod/days/days', [CodController::class, 'days'])->name('days');
Route::get('Timetable/cod/days/add_day', [CodController::class, 'addDay'])->name('add_day');
Route::post('Timetable/cod/days/add_day/', [CodController::class, 'createDay']);
Route::get('Timetable/cod/days/add_day/{id}', [CodController::class, 'viewDay'])->name('view_day');

Route::get('Timetable/cod/timeslots/allslots', [CodController::class, 'allslots'])->name('allslots');
Route::get('Timetable/cod/timeslots/addslot', [CodController::class, 'addslot'])->name('addslot');
Route::post('Timetable/cod/timeslots/addslot/', [CodController::class, 'storeSlot']);



Route::get('Timetable/cod/student/allstudents', [CodController::class, 'allstudents'])->name('allstudents');
Route::get('Timetable/cod/student/add_student', [CodController::class, 'add_student'])->name('add_student');
Route::post('Timetable/cod/student/add_student/', [CodController::class, 'storeStudent']);
Route::get('Timetable/cod/student/edit_student/{id}', [CodController::class, 'edit_student'])->name('edit_student');


Route::get('Timetable/cod/lecturer/all_lecturers', [CodController::class, 'all_lecturers'])->name('all_lecturers');
Route::get('Timetable/cod/lecturer/add_lecturer', [CodController::class, 'add_lecturer'])->name('add_lecturer');
Route::post('Timetable/cod/lecturer/add_lecturer/', [CodController::class, 'storeLecturer']);
Route::get('Timetable/cod/lecturer/view_lec/{id}', [CodController::class, 'view_lec'])->name('view_lec');
Route::get('Timetable/cod/lecturer/assignUnit/{id}', [CodController::class, 'assignUnit'])->name('assignUnit');
Route::post('Timetable/cod/lecturer/assignUnit/{id}', [CodController::class, 'storeAssignedUnit']);



Route::get('Timetable/student/dash', [StudentController::class, 'dash'])->name('dash');

Route::get('Timetable/timetabler/dashb', [TimetableController::class, 'dashb'])->name('dashb');
Route::get('Timetable/timetabler/classroom/allclassrooms', [TimetableController::class, 'allclassrooms'])->name('allclassrooms');
Route::get('Timetable/timetabler/classroom/add_classroom', [TimetableController::class, 'add_classroom'])->name('add_classroom');
Route::post('Timetable/timetabler/classroom/add_classroom/', [TimetableController::class, 'storeRoom']);


Route::get('Timetable/timetabler/final/view_timetable', [TimetableController::class, 'viewTimetable'])->name('view_timetable');
Route::get('Timetable/timetabler/final/add_schedule', [TimetableController::class, 'addSchedule'])->name('add_schedule');
