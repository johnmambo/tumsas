@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <h3>{{ $course->course_name }}</h3>
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">


                        <form method="POST" action="{{ url('Timetable/cod/course/assign_room', ['id' => $course->id]) }}">
                            @csrf
                            <div class="form-group row ">
                                <label for="classroom_id" class="col-sm-2 col-form-label">{{ __('Room Name') }}</label>

                                <div class="col-sm-10">
                                    <select name="classroom_id" id="" class="form-control">
                                        <option value="">click to select Room</option>
                                        @foreach ($classrooms as $room)
                                            <option value="{{ $room->id }}"> {{ $room->room_name }}</option>
                                        @endforeach

                                    </select>

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
@endsection
