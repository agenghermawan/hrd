@extends('layouts.layout')

@section('title', 'Department')


@section('content')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <a href="#" class="btn btn-sm btn-neutral">Department</a>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('departement.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">
                                                <h5>Department Name :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Department Name"
                                                    name="Department_Name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5>Department Head :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input class="form-control" name="Department_Head"
                                                    placeholder="Departement Head" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5>Status :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                                </div>
                                                <select class="form-control" name="Status" data-toggle="select">
                                                    <option>Active</option>
                                                    <option>Non Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5>Total Employee :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <input class="form-control" name="Total_Employee"
                                                    placeholder="Total Employee" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5>Created Departement :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input class="form-control" name="Created_Department"
                                                    placeholder="Total Employee" type="date">
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mx-auto text-center"> Create
                                        Department
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
