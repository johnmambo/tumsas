@if ($errors->has('conflict'))
    <div class="alert alert-danger">
        {{ $errors->first('conflict') }}
    </div>
@endif
<div class="col-xl-12 col-md-12 mb-2">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                    <form wire:submit.prevent="savetimetable">
                        @csrf
                        <div class="form-group row ">
                            <label for="classroom_id" class="col-sm-2 col-form-label">{{ __('Classroom') }}</label>

                            <div class="col-sm-10">
                                <select wire:model="classroom_id" id="classroom_id" class="form-control">
                                    <option value="">click to select classrooms</option>
                                    @foreach ($classes as $classroom)
                                        <option value="{{ $classroom->id }}"> {{ $classroom->room_name }} -
                                            Capacity - {{ $classroom->room_capacity }} Students </option>
                                    @endforeach

                                </select>

                                @error('classroom_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="school_days_id" class="col-sm-2 col-form-label">{{ __('Day') }}</label>

                            <div class="col-sm-10 ">
                                <select wire:model="day_id" id="day_id" class="form-control">
                                    <option value="">click to select Day of the week</option>

                                    @foreach ($days as $day)
                                        <option class="text-primary" value="{{ $day->id }}">
                                            {{ $day->day_name }}</option>
                                    @endforeach

                                </select>

                                @error('days_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="lesson_start" class="col-sm-2 col-form-label">{{ __('timeslots ') }}</label>

                            <div class="col-sm-10">
                                <select wire:model="timeslot_id" id="timeslot_id" class="form-control">
                                    <option value="">click to add timeslot for lesson timelines</option>
                                    @if ($day_id && $classroom_id)
                                        {{-- @php
                                            $timelines = App\Models\Timeslot::where('day_id', $day_id)
                                                ->select('start_time as lesson_start', 'end_time as lesson_end', 'id')
                                                ->get();
                                        @endphp --}}

                                        @php
                                            // Fetch timelines that are available for the selected classroom_id
                                            $assignedTimelines = App\Models\Timetable::where('classroom_id', $classroom_id)->pluck('timeslot_id'); // Get the IDs of assigned timelines

                                            $availableTimelines = App\Models\Timeslot::where('day_id', $day_id)
                                                ->whereNotIn('id', $assignedTimelines) // Exclude assigned timelines
                                                ->select('start_time as lesson_start', 'end_time as lesson_end', 'id')
                                                ->get();
                                        @endphp
                                        @foreach ($availableTimelines as $timeline)
                                            <option value="{{ $timeline->id }}">{{ $timeline->lesson_start }} -
                                                {{ $timeline->lesson_end }}
                                            </option>
                                        @endforeach

                                    @endif


                                </select>

                                @error('timeslot_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row ">
                            <label for="unit_name" class="col-sm-2 col-form-label">{{ __('Courses') }}</label>

                            <div class="col-sm-10">
                                <select wire:model="courses_id" id="student_units_id" class="form-control">
                                    <option value="">click to select Course</option>
                                    @if ($classroom_id && $day_id && $timeslot_id)
                                        @php
                                            // Get the assigned courses in the current timeslot and day
                                            $assignedCourses = App\Models\Timetable::where('day_id', $day_id)
                                                ->where('timeslot_id', $timeslot_id)
                                                ->pluck('courses_id');

                                            // Get the courses assigned in more than one timeslot of the same day
                                            $coursesAssignedMultipleTimes = App\Models\Timetable::where('day_id', $day_id)
                                                ->groupBy('courses_id')
                                                ->havingRaw('COUNT(DISTINCT timeslot_id) >= 2')
                                                ->pluck('courses_id');

                                            // Exclude courses assigned in more than one timeslot and those assigned in the current timeslot
                                            $class = App\Models\Classroom::find($classroom_id);
                                            $courses = App\Models\Course::where('course_capacity', '<=', $class->room_capacity)
                                                ->whereNotIn('id', $assignedCourses)
                                                ->whereNotIn('id', $coursesAssignedMultipleTimes)
                                                ->get();
                                        @endphp

                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_code }} -
                                                {{ $course->course_name }}</option>
                                        @endforeach

                                    @endif

                                </select>

                                @error('courses_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="unit_id" class="col-sm-2 col-form-label">{{ __('Unit') }}</label>

                            <div class="col-sm-10">
                                <select wire:model="unit_id" id="unit_id" class="form-control">
                                    <option value="">click to select unit/lecturer</option>
                                    @if ($courses_id && $classroom_id && $day_id && $timeslot_id)
                                        {{-- @php
                                            $assignedUnits = App\Models\Timetable::where('classroom_id', $classroom_id)
                                                ->where('day_id', $day_id)
                                                ->where('timeslot_id', $timeslot_id)
                                                ->pluck('unit_id');

                                            $availableUnits = App\Models\Unit::where('course_id', $courses_id)
                                                ->whereNotIn('id', $assignedUnits)
                                                ->select('lecturer_id', 'unit_code', 'id', 'unit_name')
                                                ->get();

                                            $scheduledUnitsCount = App\Models\Timetable::where('day_id', $day_id)
                                                ->where('courses_id', $courses_id)
                                                ->count();
                                        @endphp --}}


                                        @php
                                            $assignedUnitsAll = App\Models\Timetable::where('courses_id', $courses_id)->pluck('unit_id');

                                            // Fetch all units of the specific course that have not been assigned to any timeslot
                                            $availableUnits = App\Models\Unit::where('course_id', $courses_id)
                                                ->whereNotIn('id', $assignedUnitsAll)
                                                ->select('lecturer_id', 'unit_code', 'id', 'unit_name')
                                                ->get();
                                        @endphp

                                        @foreach ($availableUnits as $unit)
                                            <option value="{{ $unit->id }}">
                                                {{ $unit->unit_code }} - {{ $unit->unit_name }} - Lec -
                                                {{ $unit->unit_lecturer->name }} -
                                                ({{ $unit->unit_lecturer->email }})
                                            </option>
                                        @endforeach


                                    @endif
                                </select>

                                @error('unit_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
