@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <form method="POST" action="{{ url('Timetable/cod/timeslots/addslot/') }}">
                            @csrf
                            <div class="form-group row ">
                                <label for="room_name" class="col-sm-2 col-form-label">{{ __('Day') }}</label>

                                <div class="col-sm-10">
                                    <select name="day_id" id="" class="form-control">
                                        <option value="">click to select Day</option>
                                        @foreach ($days as $day)
                                            <option value="{{ $day->id }}">{{ $day->day_name }} </option>
                                        @endforeach

                                    </select>

                                    @error('day_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="start_time" class="col-sm-2 col-form-label">{{ __('lesson_start') }}</label>

                                <div class="col-sm-10">
                                    <input  name="start_time" id="start_time" type="text"
                                        class="form-control @error('lesson_start') is-invalid @enderror"
                                        value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="end_time" class="col-sm-2 col-form-label">{{ __('lesson_end') }}</label>
                                <div class="col-sm-10">
                                    <input  name="end_time" id="end_time" type="text"
                                        class="form-control @error('lesson_end') is-invalid @enderror" name="end_time"
                                        value="{{ old('end_time') }}" required autocomplete="end_time" autofocus>

                                    @error('end_time')
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
