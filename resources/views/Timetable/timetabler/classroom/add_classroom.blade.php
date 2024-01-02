@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <form method="POST" action="{{ url('Timetable/timetabler/classroom/add_classroom/') }}">
                            @csrf
                            <div class="form-group row ">
                                <label for="room_name" class="col-sm-2 col-form-label">{{ __('Room Name') }}</label>

                                <div class="col-sm-10">
                                    <input id="room_name" type="text"
                                        class="form-control @error('room_name') is-invalid @enderror" name="room_name"
                                        value="{{ old('room_name') }}" required autocomplete="room_name" autofocus>

                                    @error('room_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="room_type" class="col-sm-2 col-form-label">{{ __('Room Type') }}</label>

                                <div class="col-sm-10">
                                    <input id="room_type" type="text"
                                        class="form-control @error('room_type') is-invalid @enderror" name="room_type"
                                        value="{{ old('room_type') }}" required autocomplete="room_type" autofocus>

                                    @error('room_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="room_capacity" class="col-sm-2 col-form-label">{{ __('Room Capacity') }}</label>

                                <div class="col-sm-10">
                                    <input id="room_capacity" type="text"
                                        class="form-control @error('room_capacity') is-invalid @enderror"
                                        name="room_capacity" value="{{ old('room_capacity') }}" required
                                        autocomplete="room_capacity" autofocus>

                                    @error('room_capacity')
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
