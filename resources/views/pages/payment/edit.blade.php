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
            style="min-height: 500px; background-image: url({{ asset('assets/images/payment1.jpg') }}); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello this payment for {{ $item->user->EmployeeName }} </h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-4 order-xl-2">
                    <div class="card card-profile">
                        <img src="{{ asset('assets/images/payment2.jpg') }}" alt="Image placeholder"
                            class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info  mr-4 ">{{ $item->user->Department }}</a>
                                <a href="#"
                                    class="btn btn-sm btn-default float-right">{{ $item->user->EmployeeType }}</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <div class="text-center">
                                <h5 class="h3">
                                    {{ $item->user->EmployeeName }}
                                </h5>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i> {{ $item->user->City }}
                                </div>

                            </div>

                        </div>


                    </div>
                    <form action="{{ route('payment.update', $item->PaymentID) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

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
                                            <label class="form-control-label" for="input-last-name"> Employee Name
                                                :</label>
                                            <input type="text" class="form-control"
                                                value="{{ $item->user->EmployeeName }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">ID Salary</label>
                                            <input type="text" class="form-control" value="{{ $item->SalaryID }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">
                                                <h5> EmployeeID</h5>
                                            </label>
                                            <input type="text" class="form-control"
                                                value="{{ $item->user->EmployeeID }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Departement Name
                                                :</label>
                                            <input type="text" class="form-control"
                                                value="{{ $item->user->Department }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Month
                                            </label>
                                            <input type="date" class="form-control" name="Time"
                                                value="{{ $data->Time }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <label class="form-control-label" for="input-last-name">Status
                                            :</label>
                                        <select class="form-control" id="drop" name="Status">
                                            @if ($item->Status == 'Paid')
                                                <option selected> {{ $item->Status }}</option>
                                                <option> Unpaid</option>
                                            @else
                                                <option selected> {{ $item->Status }}</option>
                                                <option> Paid</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name"> Payment Method
                                                :</label>
                                            <select class="form-control" id="drop" name="PaymentMethod">
                                                <option> Bank Account</option>
                                                <option> VISA </option>
                                                <option> Credit Card </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center mx-auto">
                                    <button type="submit" class="btn btn-primary mx-auto text-center"> Create
                                        Payment
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
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                                    class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    @include('includes.script')
    @section('script')
        <script>
            $("#drop").change(function() {
                var end = this.value;
                $('#EmployeeID').val(end);
                console.log(end)
            });

        </script>

    @endsection
</body>

</html>
