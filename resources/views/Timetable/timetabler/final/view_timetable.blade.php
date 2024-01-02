@extends('layouts.main')

@section('content')
{{--  <div class="col-xl-12 col-md-12 mb-2">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">

                <div class="col mr-2">
                    <a class="btn btn-sm btn-primary mb-2" href="{{ route('add_schedule') }}">Add Schedule</a>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <h3 class="m-0 font-weight-bold text-primary text-center">TUM</h3>
                        <h4 class="m-0 font-weight-bold text-primary text-center">ICI</h4>
                        <h4 class="m-0 font-weight-bold text-primary text-center">TIME TABLE SEPTEMBER - DECEMBER 2022
                        </h4>
                        <h4 class="m-0 font-weight-bold text-primary text-center">EFFECTIVE DATE : 3 - 09 - 2023</h4>
                        <thead>

                            <tr>
                                <th>Day</th>
                                <th>Timeslot</th>
                                @foreach ($classroomIds as $classroomId)
                                    @php
                                        $classroom = App\Models\Classroom::find($classroomId);
                                    @endphp
                                    <th>{{ $classroom->room_name }}</th>
                                @endforeach
                            </tr>

                        </thead>
                        <tbody>


                                @foreach ($timetableData as $dayData)
                                    @php
                                        // Group by timeslot_id
                                        $groupedTimeslots = $dayData['timeslots']->groupBy('timeslot_id');
                                    @endphp

                                    @foreach ($groupedTimeslots as $timeslotId => $timeslots)
                                        <tr>

                                            <td>
                                                @if (isset($timeslots[0]['day']['day_name']))
                                                    {{ $timeslots[0]['day']['day_name'] }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($timeslots[0]['timeslot']['start_time']))
                                                    {{ $timeslots[0]['timeslot']['start_time'] }} -
                                                @endif
                                                @if (isset($timeslots[0]['timeslot']['end_time']))
                                                    {{ $timeslots[0]['timeslot']['end_time'] }}
                                                @endif
                                            </td>
                                            @foreach ($classroomIds as $classroomId)
                                                <td>
                                                    @foreach ($timeslots as $timeslot)
                                                        @if ($timeslot->classroom_id == $classroomId)
                                                            {{ $timeslot->course->course_code }}</br>
                                                            {{ $timeslot->unit->unit_code }}</br>
                                                            {{ $timeslot->unit->unit_lecturer->name }}
                                                        @break
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
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
</div>  --}}

<div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

    <div class="content-page-box-area">
        <div class="marketplace-inner-box-style">
            <div class="title">
                <h3>My Timetable</h3>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="examplesd" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Timeslot</th>
                            @foreach ($classroomIds as $classroomId)
                                @php
                                    $classroom = App\Models\Classroom::find($classroomId);
                                @endphp
                                <th>{{ $classroom->room_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($timetableData as $dayData)
                                    @php
                                        // Group by timeslot_id
                                        $groupedTimeslots = $dayData['timeslots']->groupBy('timeslot_id');
                                    @endphp

                                    @foreach ($groupedTimeslots as $timeslotId => $timeslots)
                                        <tr>

                                            <td>
                                                @if (isset($timeslots[0]['day']['day_name']))
                                                    {{ $timeslots[0]['day']['day_name'] }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($timeslots[0]['timeslot']['start_time']))
                                                    {{ $timeslots[0]['timeslot']['start_time'] }} -
                                                @endif
                                                @if (isset($timeslots[0]['timeslot']['end_time']))
                                                    {{ $timeslots[0]['timeslot']['end_time'] }}
                                                @endif
                                            </td>
                                            @foreach ($classroomIds as $classroomId)
                                                <td>
                                                    @foreach ($timeslots as $timeslot)
                                                        @if ($timeslot->classroom_id == $classroomId)
                                                            {{ $timeslot->course->course_code }}</br>
                                                            {{ $timeslot->unit->unit_code }}</br>
                                                            {{ $timeslot->unit->unit_lecturer->name }}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach

                    </tbody>
                </table>
            </div>
        </div>




    </div>
     
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#examplesd').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        text: 'Export to Excel'
                    },
                    {
                        extend: 'csv',
                        text: 'Export to CSV'
                    },
                    {
                        extend: 'pdf',
                        text: 'Export to PDF'
                    },
                    {
                        extend: 'copy',
                        text: 'Copy'
                    },
                    {
                        extend: 'print',
                        text: 'Print'
                    }
                ]
            });
        });
    </script>
@endsection
