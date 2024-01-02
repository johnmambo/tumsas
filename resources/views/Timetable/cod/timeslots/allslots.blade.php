@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 mb-2">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">


                        <div class="col mr-2">
                            <a class="btn btn-sm btn-primary mb-2" href="{{ route('addslot') }}">Add Timeslot</a>

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Day Id</th>
                                        <th>Day of the week</th>
                                        <th>slots</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach ($slots as $slot)
                                        <tr>
                                            <td>{{ $slot->id }}</td>
                                            <td>{{ $slot->days->day_name }}</td>
                                            <td>{{ $slot->start_time }}- {{ $slot->end_time }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>

                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
