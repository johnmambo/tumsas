@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <h3>{{ $lecturer->lec_name }}</h3>

                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <form method="POST" action="{{ url('Timetable/cod/lecturer/assignUnit', ['id' => $lecturer->id]) }}">
                            @csrf

                            <div class="form-group row ">
                                <label for="unit_id" class="col-sm-2 col-form-label">{{ __('Unit') }}</label>

                                <div class="col-sm-10">
                                    <select name="unit_id" id="" class="form-control">
                                        <option value="">click to select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                        @endforeach

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
@endsection
