@extends('layouts.layout')

@section('title', 'Leave')

@section('btn-right')
    <a href="{{ route('leave.create') }}"></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a type="button" class="btn btn-primary text-light">
                Create Salary
            </a>
            <div class="container contact-form">
                <form method="POST" action="{{ route('salary.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="EmployeeName">
                                    <h5> EmployeeName</h5>
                                </label>
                                <select class="form-control" id="drop">
                                    <option selected> </option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->EmployeeID }}">{{ $item->EmployeeName }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="EmployeeID">
                                    <h5> EmployeeID</h5>
                                </label>
                                <input type="text" class="form-control" id="EmployeeID" name="EmployeeID">
                            </div>

                            <div class="form-group">
                                <label for="Bank">
                                    <h5> Bank </h5>
                                </label>
                                <input type="text" class="form-control" name="Bank">
                            </div>

                            <div class="form-group">
                                <label for="NoAccount">
                                    <h5> No Account </h5>
                                </label>
                                <input type="text" class="form-control" name="NoAccount">
                            </div>

                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Gaji Pokok:</h5>
                                </label>
                                <input type="text" name="GajiPokok" class="form-control" id="BaseSalary" value="" />
                            </div>

                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Tunjangan : </h5>
                                </label>
                                <input type="text" name="Tunjangan" class="form-control" id="tunjangan" value="" />
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="Create Salary" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img src="{{ asset('assets/images/payment4.jpg') }}" class="w-100" alt="">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
    $("#drop").change(function () {
    var end = this.value;
    $('#EmployeeID').val(end);
    });

@endsection
