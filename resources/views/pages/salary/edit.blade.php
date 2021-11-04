@extends('layouts.layout')

@section('title', 'Leave')

@section('btn-right')
    <a href="{{ route('leave.create') }}"></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a type="button" class="btn btn-primary text-light">
                Edit Salary
            </a>
            <div class="container contact-form">
                <form method="POST" action="{{ route('salary.update', $item->SalaryID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="EmployeeName">
                                    <h5> EmployeeName</h5>
                                </label>
                                <input type="text" value="{{ $data->user->EmployeeName }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="EmployeeID">
                                    <h5> EmployeeID</h5>
                                </label>
                                <input type="text" value="{{ $data->user->EmployeeID }}" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="Bank">
                                    <h5> Bank </h5>
                                </label>
                                <input type="text" class="form-control" name="Bank" value="{{ $item->Bank }}">
                            </div>

                            <div class="form-group">
                                <label for="NoAccount">
                                    <h5> No Account </h5>
                                </label>
                                <input type="text" class="form-control" name="NoAccount" value="{{ $item->NoAccount }}">
                            </div>

                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Gaji Pokok:</h5>
                                </label>
                                <input type="number" name="GajiPokok" class="form-control"
                                    value="{{ $item->GajiPokok }}" />
                            </div>

                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Tunjangan : </h5>
                                </label>
                                <input type="number" name="Tunjangan" class="form-control"
                                    value="{{ $item->Tunjangan }}" />
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
