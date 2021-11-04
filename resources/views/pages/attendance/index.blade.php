@extends('layouts.layout')

@section('title', 'Attendance')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid row">
                        <div class="col-lg-6 col-sm-12">
                            <h5> ATTENDENCE LIST </h5>
                        </div>

                    </div>
                    <div class="container text-center mx-auto">
                    </div>
                    <form action="{{ route('attendance.search') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="col-lg-12 col-sm-12 col-md-10 mx-auto mt-5">
                            <div class="form-group">
                                <label>Date From :</label>
                                <input type="date" class="date form-control" required name="DateFrom" />
                            </div>
                            <div class="form-group">
                                <label>Date To :</label>
                                <input type="date" class="date form-control" required name="DateTo" />
                            </div>
                            <div class="col-sm-12 col-lg-12 col-md-10 d-flex justify-content-center">
                                <button class="btn btn-primary mr-2"> EXPORT </button>
                                <button class="btn btn-primary" type="submit"> SEARCH </button>
                    </form>

                </div>

            </div>

            <div class="table-responsive mt-5">
                <table class="table stylish-table no-wrap" id="myTable">
                    <thead>
                        <tr>
                            <th class="border-top-0" colspan="2">Employee Name</th>
                            <th class="border-top-0">Employee ID</th>
                            <th class="border-top-0">Check In </th>
                            <th class="border-top-0">Check Out </th>
                            <th class="border-top-0">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendance as $item)
                            <tr>
                                <td> <img src="{{ url($item->user->Photo) }}" style="width: 50px" class="rounded-circle"
                                        alt=""></td>
                                <td class="align-middle">
                                    <h6 class="text-light">{{ $item->user->EmployeeName }}</h6><small
                                        class="text-muted">{{ $item->user->EmployeePosition }}</small>
                                </td>
                                <td class="align-middle">
                                    <h6>{{ $item->EmployeeName }}</h6><small
                                        class="text-muted">{{ $item->EmployeeID }}</small>
                                </td>
                                <td class="align-middle">{{ $item->Check_In }}</td>
                                <td class="align-middle">
                                    {{ $item->Check_Out }}
                                </td>
                                <td class="align-middle">
                                    {{-- <form action="{{ route('attendance.show' , $item-> id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf --}}
                                    <a href="{{ route('attendance.show', $item->AttendanceID) }}"
                                        class="btn btn-primary"><i class="fas fa-folder"></i></a>
                                    {{-- <button class="btn btn-primary"><i class="fas fa-folder"></i></button> --}}
                                    {{-- </form> --}}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    No record
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
@endsection
