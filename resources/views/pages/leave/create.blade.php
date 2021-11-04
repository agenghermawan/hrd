@extends('layouts.layout')

@section('title', 'Leave')

@section('btn-right')
    <a href="{{ route('leave.create') }}"></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <a type="button" class="btn btn-primary text-light">
                Request Leave
            </a>
            <div class="container contact-form">
                <div class="contact-image text-center ">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" class="mx-auto rounded-circle card"
                        alt="rocket_contact" />
                    <h3>Leave Application</h3>
                </div>
                <form method="POST" action="{{ route('leave.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Start_Date">
                                <h5> Employee Name :</h5>
                            </label>
                            <div class="form-group">
                                <input type="text" name="EmployeeID" class="form-control"
                                    value="{{ Auth::user()->EmployeeName }}" />
                            </div>
                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Employee ID :</h5>
                                </label>
                                <input type="text" name="EmployeeID" class="form-control"
                                    value="{{ Auth::user()->EmployeeID }}" />
                            </div>
                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> Start Date :</h5>
                                </label>
                                <input type="date" name="Date_start" class="form-control" value="" />
                            </div>

                            <div class="form-group">
                                <label for="Start_Date">
                                    <h5> End Date : </h5>
                                </label>
                                <input type="date" name="Date_end" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Send Leave " />
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <textarea name="Reason" class="form-control" placeholder="Reason"
                                    style="width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
