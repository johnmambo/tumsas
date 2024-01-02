@extends('layouts.main')
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">{{ $course->course_name }}</h6> --}}
        </div>
        <div class="card-body">
            {{-- {{-- <a class="btn btn-sm btn-primary mb-2" href="{{ route('assign_room', $course->id) }}">Assign classroom </a> --}}
            <a class="btn btn-sm btn-primary mb-2" href="{{ route('assignUnit', $lecturer->id) }}">Add Course unit</a> --}}

            <div class="table-responsive">
                <h6 class="m-0 font-weight-bold text-primary">Course Units</h6>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Unit Names</th>

                        </tr>

                    </thead>

                    <tbody>
                        {{-- @foreach ($courseUnits as $unit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $unit->units->unit_name }}</td>

                        </tr>
                        @endforeach --}}

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
