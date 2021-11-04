@extends('layouts.layout')

@section('title', 'Leave')

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'HR')
        <a href="{{ route('leave.create') }}" class="btn btn-neutral"> Create Leave</a>
    @endif
@endsection

@section('header')
    <div class="row">
        <div class="col-xl-6 mx-auto col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Request Leave</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totalleave }}</span>
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
        <div class="col-xl-6 mx-auto col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Waiting Approval </h5>
                            <span class="h2 font-weight-bold mb-0">{{ $waitingapproval }}</span>
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
                            <h5> List Leave</h5>
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table align-items-center table-flush table stylish-table no-wrap" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" scope="col" colspan="2">Employee Name
                                    </th>
                                    <th class="border-top-0" scope="col">Start Leave
                                    </th>
                                    <th class="border-top-0" scope="col">End Leave</th>
                                    <th class="border-top-0" scope="col">Approval</th>
                                    <th class="border-top-0" scope="col">Reason</th>
                                    @if (Auth::user()->EmployeePosition == 'HR')
                                        <th class="border-top-0" scope="col">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($items as $item)
                                    <tr>
                                        <td class="align-center"><img src="{{ url($item->user->Photo) }}"
                                                style="width: 50px" class="rounded-circle" alt=""></td>
                                        <td class="align-middle">
                                            <h6 class="text-light">{{ $item->user->EmployeeName }}</h6><small
                                                class="text-muted">{{ $item->user->EmployeePosition }}</small>
                                        </td>
                                        <td>
                                            {{ $item->Date_start }}
                                        </td>
                                        <td>
                                            {{ $item->Date_end }}
                                        </td>
                                        <td>
                                            @if ($item->Approval == 'Waiting Approval')
                                                <a href="#" class="btn btn-primary"> {{ $item->Approval }}</a>
                                            @elseif ($item->Approval == 'Accept')
                                                <a href="#" class="btn btn-primary"> {{ $item->Approval }}</a>
                                            @else
                                                <a href="#" class="btn btn-warning"> {{ $item->Approval }}</a>
                                            @endif


                                        </td>
                                        <td>
                                            {{ $item->Reason }}
                                        </td>
                                        @if (Auth::user()->EmployeePosition == 'HR')
                                            <td>
                                                <a href="{{ route('leave.edit', $item->LeaveID) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i></a>

                                                <form action="{{ route('leave.destroy', $item->LeaveID) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-warning d-inline" type="submit"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No record
                                        </td>
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
