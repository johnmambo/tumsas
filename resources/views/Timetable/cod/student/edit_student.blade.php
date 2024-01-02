@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <form method="POST" action="{{ url('Timetable/cod/student/add_student/') }}">
                            @csrf
                            <div class="form-group row ">
                                <label for="student_name" class="col-sm-2 col-form-label">{{ __('Student Name') }}</label>

                                <div class="col-sm-10">
                                    <input id="student_name" type="text"
                                        class="form-control @error('student_name') is-invalid @enderror" name="student_name"
                                        value="{{ old('student_name') }}" required autocomplete="student_name" autofocus>

                                    @error('student_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="student_type" class="col-sm-2 col-form-label">{{ __('Student type') }}</label>

                                <div class="col-sm-10">
                                    <select name="student_type" id="" class="form-control">
                                        <option value="">click to select Type</option>

                                        <option value="Public">Public </option>
                                        <option value="Private">Private </option>


                                    </select>

                                    @error('student_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="course_id" class="col-sm-2 col-form-label">{{ __('Course') }}</label>

                                <div class="col-sm-10">
                                    <select name="course_id" id="" class="form-control">
                                        <option value="">click to select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"> {{ $course->course_name }}</option>
                                        @endforeach

                                    </select>

                                    @error('course_id')
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
@endsection
