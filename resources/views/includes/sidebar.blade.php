<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('assets/images/csul.png') }}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard.index') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-user-clock text-primary"></i>
                            <span class="nav-link-text">Attendance</span>
                        </a>
                        <div class="collapse" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('attendance.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Attendance </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('attendance.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-square-pin mr-2"></i></span>
                                        <span class="sidenav-normal"> My Attendance </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-departement" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-departement">
                            <i class="fas fa-university text-primary"></i>
                            <span class="nav-link-text">Departement</span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-departement">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('departement.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Departement </span>
                                    </a>
                                </li>
                                @if (Auth::user()->EmployeePosition == 'HR')
                                    <li class="nav-item">
                                        <a href="{{ route('departement.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Departement </span>
                                        </a>
                                    </li>
                                @else

                                @endif

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-employee" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-employee">
                            <i class="fas fa-users text-primary"></i>
                            <span class="nav-link-text">Employee</span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-employee">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('employee.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Employee </span>
                                    </a>
                                </li>
                                @if (Auth::user()->EmployeePosition == 'HR')
                                    <li class="nav-item">
                                        <a href="{{ route('employee.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Employee </span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calendar') }}">
                            <i class="fas fa-calendar-alt text-primary"></i>
                            <span class="nav-link-text">Calendar</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-Leave" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-Leave">
                            <i class="fas fa-calendar-times text-primary"></i>
                            <span class="nav-link-text">Leave</span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-Leave">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('leave.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Leave </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('leave.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                        <span class="sidenav-normal"> Create Leave </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->


                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-Assets" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-Assets">
                            <i class="fas fa-briefcase text-primary"></i>
                            <span class="nav-link-text">Assets</span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-Assets">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('asset.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Assets </span>
                                    </a>
                                </li>
                                @if (Auth::user()->EmployeePosition == 'HR' || Auth::user()->EmployeePosition == 'Supervisor')
                                    <li class="nav-item">
                                        <a href="{{ route('asset.create') }} " class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Assets </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-Project" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-Project">
                            <i class=" ni ni-spaceship text-primary"></i>
                            <span class="nav-link-text">Project </span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-Project">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('project.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Project </span>
                                    </a>
                                </li>
                                @if (Auth::user()->EmployeePosition == 'Employee')
                                    <li class="nav-item">
                                        <a href="{{ route('project.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Project </span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </li>

                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-Payment" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="navbar-Payment">
                            <i class=" fas fa-credit-card" text-primary"></i>
                            <span class="nav-link-text">Payment </span>
                        </a>
                        </a>
                        <div class="collapse" id="navbar-Payment">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('payment.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> <i class="ni ni-align-left-2 mr-2"></i></span>
                                        <span class="sidenav-normal"> List Payment </span>
                                    </a>
                                </li>
                                @if (Auth::user()->EmployeePosition == 'HR')
                                    <li class="nav-item">
                                        <a href="{{ route('payment.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Payment </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @if (Auth::user()->EmployeePosition == 'HR')
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-Salary" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="navbar-Salary">
                                <i class=" fas fa-money-check-alt text-primary"></i>
                                <span class="nav-link-text">Salary </span>
                            </a>
                            </a>
                            <div class="collapse" id="navbar-Salary">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('salary.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i
                                                    class="ni ni-align-left-2 mr-2"></i></span>
                                            <span class="sidenav-normal"> List Salary </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('salary.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> <i class="ni ni-fat-add mr-2"></i></span>
                                            <span class="sidenav-normal"> Create Salary </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
