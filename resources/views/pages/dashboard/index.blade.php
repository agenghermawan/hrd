@extends('layouts.layout')

@section('title', 'Dashboard')

@section('header')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Project</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalproject }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap"> <a href="{{ route('project.index') }}">See all Project</a> </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Employee</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totaluser }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap"> <a href="{{ route('employee.index') }}">See all Employee</a> </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Department</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totaldeparment }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap"> <a href="{{ route('departement.index') }}">See all Department</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Asset</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalaset }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap"> <a href="{{ route('asset.index') }}">See all Asset</a> </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{ $greetings }} , {{ Auth::user()->EmployeeName }}</h3>
                            it's {{ $day }} , {{ $mytime->format('d M') }}
                            <div class="mt-5">
                                @if ($checkin == null)
                                    <a href="{{ route('attendance.create') }}" class="btn btn-warning"> You haven't check
                                        in
                                        today</a>
                                @else
                                    <p class="card-title  text-muted mb-0">Time Check In :
                                    </p>
                                    <p>{{ $checkin->Check_In }}</p>

                                    <p class="card-title  text-muted mb-0">Time Check Out :
                                    </p>
                                    <p>{{ $checkin->Check_Out }}</p>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/dashboard2.jpg') }}" class="img-fluid rounded"
                                height="425px" alt="">
                            @if ($leave != null)
                                <p> <B> Remaining Days Off : {{ $leave->TotalLeave }}</B></p>
                            @else

                            @endif

                        </div>
                    </div>
                    <div class="container mt-6 col-sm-12 ">
                        <h5> Shortcut</h5>
                        <a href="{{ route('attendance.create') }}" class="btn btn-neutral col-sm-12 col-md-3"> Request
                            Attendance</a>
                        <a href="{{ route('leave.index') }}" class="btn btn-neutral col-sm-12  col-md-3"> Request Time
                            Off</a>
                        <a href="{{ route('attendance.index') }}" class="btn btn-neutral col-sm-12  col-md-3"> List
                            Attendance </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Employee Information</h6>
                            <h5 class="h3 mb-0">Employee Type</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container ov-h">
                        <div id="flotPie1" class="float-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Table Projects</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Team name</th>
                                <th scope="col">Project name</th>
                                <th scope="col">Project end</th>
                                <th scope="col">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->TeamName }}
                                    </th>
                                    <td>
                                        {{ $item->ProjectName }}
                                    </td>
                                    <td>
                                        {{ $item->ProjectEnd }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">{{ $item->DevelopmentProgress }}%</span>
                                            <div class="progress" style="height: 20px">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $item->DevelopmentProgress }}%;" aria-valuenow="25"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Table Department</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('departement.index') }}" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Department Name</th>
                                <th scope="col">Department Head</th>
                                <th scope="col">Total Employee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($department as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $item->Department_Name }}
                                    </th>
                                    <td>
                                        {{ $item->Department_Head }}
                                    </td>
                                    <td>
                                        {{ $item->Total_Employee }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    jQuery(document).ready(function($) {
    "use strict";

    // Pie chart flotPie1
    var piedata = [
    { label: "Permanent", data: [[1,{{ $pie['permanent'] }} ]], color: '#5c6bc0'},
    { label: "Contract", data: [[1,{{ $pie['contract'] }} ]], color: '#ef5350'},
    { label: "Probation", data: [[1,{{ $pie['probation'] }} ]], color: '#66bb6a'}
    ];

    $.plot('#flotPie1', piedata, {
    series: {
    pie: {
    show: true,
    radius: 1,
    innerRadius: 0.65,
    label: {
    show: true,
    radius: 2/3,
    threshold: 1
    },
    stroke: {
    width: 0
    }
    }
    },
    grid: {
    hoverable: true,
    clickable: true
    }
    });
    });

@endsection
