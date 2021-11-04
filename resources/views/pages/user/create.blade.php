@extends('layouts.layout')

@section('title', 'Add Employee')

@section('content')
    <div class="container-fluid mt--6 col-lg-12">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit profile </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email
                                                Address :</label>
                                            <input type="email" id="input-email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-password">Password : </label>
                                            <input type="password" id="input-password" class="form-control" name="password"
                                                required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-EmployeeID">Employee ID
                                            </label>
                                            <input type="text" id="input-EmployeeID" class="form-control" name="EmployeeID"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Employee Name
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control" name="EmployeeName"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Employee
                                                Position :
                                            </label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                name="EmployeePosition">
                                                <option style="cursor:not-allowed"> -- Choose Position --
                                                </option>

                                                <option>HR</option>
                                                <option>Supervisor</option>
                                                <option>Employee</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Department
                                                :</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="Department">
                                                <option style="cursor:not-allowed"> -- Choose Department --
                                                </option>
                                                @foreach ($datadepartment as $item)
                                                    <option>{{ $item->Department_Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">BirthDate
                                                :</label>
                                            <input type="date" id="input-last-name" class="form-control" name="BirthDate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Employee Type
                                                :</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="EmployeeType">
                                                <option>Permanent</option>
                                                <option>Contract</option>
                                                <option>Probation</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class=" row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">JoinDate :
                                            </label>
                                            <input type="date" id="input-first-name" class="form-control" name="JoinDate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Phone
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control" name="Phone"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLang" lang="en"
                                                    name="Photo">
                                                <label class="custom-file-label" for="customFileLang">Select
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Tax Identification
                                                Number
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control" name="TIN">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" name="Address" class="form-control"
                                                placeholder="Home Address" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city" class="form-control" placeholder="City"
                                                name="City" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country" class="form-control" placeholder="Country"
                                                name="Country" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal
                                                code</label>
                                            <input type="number" id="input-postal-code" class="form-control"
                                                name="Postal_Code" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">About Me</label>
                                    <textarea rows="4" class="form-control" name="AboutMe"
                                        placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mx-auto">
                                    <button type="submit" class="btn btn-primary mx-auto text-center"> Create
                                        Departement
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
