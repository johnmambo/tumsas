@extends('layouts.main')

@section('content')
<div class="col-xl-12 col-md-12 mb-2">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                    <form method="POST" action="{{ url('Timetable/cod/course/addcourse/') }}">
                    @csrf
                        <div class="form-group row ">
                                <label for="course_name" class="col-sm-2 col-form-label">{{ __('Course Name') }}</label>

                                <div class="col-sm-10">
                                    <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required autocomplete="course_name" autofocus>

                                    @error('course_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="course_code" class="col-sm-2 col-form-label">{{ __('Course Code') }}</label>

                            <div class="col-sm-10">
                                <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror" name="course_code" value="{{ old('course_code') }}" required autocomplete="course_code" autofocus>

                                @error('course_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="course_type" class="col-sm-2 col-form-label">{{ __('course type') }}</label>

                            <div class="col-sm-10">
                            <input id="course_type" type="text" class="form-control @error('course_type') is-invalid @enderror" name="course_type" value="{{ old('course_type') }}" required autocomplete="course_type" autofocus>

                            @error('course_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row ">
                            <label for="course_capacity" class="col-sm-2 col-form-label">{{ __('Course capacity') }}</label>

                            <div class="col-sm-10">
                                <input id="course_capacity" type="text" class="form-control @error('course_capacity') is-invalid @enderror" name="course_capacity" value="{{ old('course_capacity') }}" required autocomplete="course_capacity" autofocus>

                                @error('course_capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="department_id" class="col-sm-2 col-form-label">{{ __('Department') }}</label>

                            <div class="col-sm-10">
                                <select name="department_id" id="" class="form-control">
                                    <option value="">click to select Department</option>
                                    @foreach ($departments as $dep)
                                    <option value="{{ $dep->id }}"> {{ $dep->id }} - {{ $dep->dep_name }}</option>
                                    @endforeach

                                </select>

                                @error('department_id')
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
