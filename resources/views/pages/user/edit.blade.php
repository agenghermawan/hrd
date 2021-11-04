<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
    <!-- Favicon -->
    @include('includes.style')
</head>

<body>
    <!-- Sidenav -->
    @include('includes.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('includes.navbar')
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6 d-flex align-items-center"
            style="min-height: 500px; background-image: url({{ asset('assets/aragon/img/theme/profile-cover.jpg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello , {{ $data->EmployeeName }} </h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can edit the profile </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src="{{ asset('assets/aragon/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder"
                            class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ url($data->Photo) }}" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info  mr-4 ">{{ $data->EmployeePosition }}</a>
                                <a href="#" class="btn btn-sm btn-default float-right">{{ $data->EmployeeType }}</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="h3">
                                    {{ $data->EmployeeName }} <span class="font-weight-light">, 27</span>
                                </h5>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{ $data->City }}
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>{{ $data->Postal_Code }} |
                                    {{ $data->Country }}
                                </div>
                            </div>

                        </div>


                    </div>
                    <form action="{{ route('employee.update', $data->EmployeeID) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                </div>
                <div class="col-xl-8 order-xl-1">
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

                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email
                                                address</label>
                                            <input type="email" id="input-email" class="form-control" name="email"
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="EmployeeType">Employee Type
                                            </label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                name="EmployeeType">
                                                <option>Permanent</option>
                                                <option>Contract</option>
                                                <option>Probation</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Employee ID
                                            </label>
                                            <input type="text" id="input-first-name" class="form-control"
                                                name="EmployeeID" value="{{ $data->EmployeeID }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Employee Name
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control"
                                                name="EmployeeName" value="{{ $data->EmployeeName }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Employee
                                                Position :
                                            </label>
                                            <input type="text" id="input-first-name" class="form-control"
                                                name="EmployeePosition" value="{{ $data->EmployeePosition }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Department
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control"
                                                name="Department" value="{{ $data->Department }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">BirthDate
                                                :</label>
                                            <input type="date" id="input-last-name" class="form-control"
                                                name="BirthDate" value="{{ $data->BirthDate }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">JoinDate :
                                            </label>
                                            <input type="date" id="input-first-name" class="form-control"
                                                name="JoinDate" value="{{ $data->JoinDate }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Phone
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control" name="Phone"
                                                value="{{ $data->Phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Tax
                                                Identification
                                                Number
                                                :</label>
                                            <input type="text" id="input-last-name" class="form-control" name="TIN"
                                                value="{{ $data->TIN }}">
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
                                            <input id="input-address" class="form-control" placeholder="Home Address"
                                                value="{{ $data->Address }}" type="text" name="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="input-city" class="form-control" name="City"
                                                value="{{ $data->City }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="input-country" class="form-control" name="Country"
                                                value="{{ $data->Country }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal
                                                code</label>
                                            <input type="number" id="input-postal-code" class="form-control"
                                                name="Postal_Code" value="{{ $data->Postal_Code }}">
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
                                    <textarea rows="4" class="form-control" name="AboutMe" name="AboutMe"
                                        placeholder="{{ $data->AboutMe }}"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mx-auto">
                                    <button type="submit" class="btn btn-primary mx-auto text-center"> Create
                                        Department
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <a href="{{ route('dashboard.index') }}" class="font-weight-bold ml-1" target="_blank">2021
                        &copy; PT
                        Chandra
                        Sakti Utama Leasing</a>
                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    @include('includes.script')
</body>

</html>
