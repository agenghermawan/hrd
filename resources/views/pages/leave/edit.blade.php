@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <a type="button" class="btn btn-primary text-light">
                Total Leave <span class="badge badge-light ml-2">{{ $data->TotalLeave }}</span>
            </a>
            <div class="container contact-form">
                <div class="contact-image text-center ">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" class="mx-auto rounded-circle card"
                        alt="rocket_contact" />
                    <h3>Leave Application</h3>
                </div>
                <form method="POST" action="{{ route('leave.update', $data->LeaveID) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="EmployeeID" class="form-control"
                                    value="{{ Auth::user()->EmployeeID }}" />
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">
                                        <h4>Waiting Approval</h4>
                                    </label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="Approval">
                                        <option>-- Chose One --</option>
                                        <option>Accept</option>
                                        <option>Reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" />
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group">
                                <textarea name="Reason" class="form-control"
                                    style=" width: 100%; height: 150px;">{{ $data->Reason }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
