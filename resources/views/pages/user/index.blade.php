@extends('layouts.layout')

@section('title', 'User')

    @if (Auth::user()->EmployeePosition == 'HR')
        @section('btn-right')
            <a href="{{ route('employee.create') }}" class="btn btn-neutral float-right">
                Add New Employee
            </a>
        @endsection
    @endif


@section('header')

    <div class="row">
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
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> &nbsp;</span>
                        <span class="text-nowrap">&nbsp;</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0"> Employee Permanent</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $Permanent }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> &nbsp;</span>
                        <span class="text-nowrap">&nbsp;</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Employee Contract</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $Contract }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> &nbsp;</span>
                        <span class="text-nowrap">&nbsp;</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Employee Probation </h5>
                            <span class="h2 font-weight-bold mb-0">{{ $Probation }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> &nbsp;</span>
                        <span class="text-nowrap">&nbsp;</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body rounded">
                    <div class="row">
                        <div class="col-md-8">
                            <p> Table Employee</p>
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table stylish-table no-wrap" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" colspan="2">EmployeeName</th>
                                    <th class="border-top-0">Department</th>
                                    <th class="border-top-0">EmployeePosition</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Status</th>
                                    <th class="border-top-0">Join Date</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td> <img src="{{ url($item->Photo) }}" style="width: 50px" class="rounded-circle"
                                                alt=""></td>
                                        <td class="align-middle">
                                            <h6 class="text-light">{{ $item->EmployeeName }}</h6><small
                                                class="text-muted">{{ $item->EmployeePosition }}</small>
                                        </td>
                                        <td class="align-middle">{{ $item->Department }}</td>
                                        <td class="align-middle">{{ $item->EmployeePosition }}</td>
                                        <td class="align-middle">{{ $item->email }}</td>
                                        <td class="align-middle">
                                            <button class="btn btn-primary"> Active </button>
                                        </td>
                                        <td class="align-middle">{{ $item->JoinDate }}</td>
                                        <td class="align-middle">

                                            <a href="{{ route('employee.show', $item->EmployeeID) }}"
                                                class="btn btn-info fas fa-eye"></a>

                                            @if (Auth::user()->EmployeePosition == 'HR')

                                                <a href="{{ route('employee.edit', $item->EmployeeID) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i></a>

                                                <form action="{{ route('employee.destroy', $item->EmployeeID) }}"
                                                    class="d-inline" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-primary" data-toggle="sweet-alert" type="submit"
                                                        data-sweet-alert="confirm"><i class="fas fa-trash">
                                                        </i>
                                                    </button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center"> No Record </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
