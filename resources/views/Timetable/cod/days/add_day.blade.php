@extends('layouts.main')

@section('content')
<div class="col-xl-12 col-md-12 mb-2">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">

                    <form method="POST" action="{{ url('Timetable/cod/days/add_day/') }}">
                    @csrf
                        <div class="form-group row ">
                                <label for="day_name" class="col-sm-2 col-form-label">{{ __('Day Name') }}</label>

                                <div class="col-sm-10">
                                    <input name="day_name" id="day_name" type="text" class="form-control @error('day_name') is-invalid @enderror" name="dep_name" value="{{ old('dep_name') }}" required autocomplete="dep_name" autofocus>
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
