@extends('layouts.layout')

@section('title', ' Departement')

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'HR')
        <a href="{{ route('departement.create') }}" class="btn btn-neutral ">
            Add New Departement
        </a>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Deparment</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totaldeparment }}</span>
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
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Deparment Active</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $totaldeparmentactive }}</span>
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
                            <h5> Table Department</h5>
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table align-items-center table-hover " id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" colspan="2">#</th>
                                    <th class="border-top-0" scope="col">Department Name
                                    </th>
                                    <th class="border-top-0" scope="col">Department Head
                                    </th>
                                    <th class="border-top-0" scope="col">Total Employee</th>
                                    <th class="border-top-0" scope="col">Status</th>
                                    <th class="border-top-0" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($department as $item)
                                    <tr>
                                        <td style="width:50px;"><img
                                                src="https://ui-avatars.com/api/{{ $item->Department_Name }}"
                                                class="rounded-circle" alt=""></td>
                                        <td class="align-middle">
                                            <h6 class="text-light">
                                                {{ $item->Department_Head }}</h6><small
                                                class="text-muted">{{ $item->Department_Name }}</small>
                                        </td>
                                        <td class="align-middle">{{ $item->Department_Name }}
                                        </td>

                                        <td class="align-middle">{{ $item->Department_Head }}
                                        </td>

                                        <td class="align-middle">
                                            {{ $item->Total_Employee }}
                                        </td>
                                        <td class="align-middle">
                                            @if ($item->Status == 'Active')
                                                <button class="btn btn-primary" disabled> Active
                                                </button>
                                            @else
                                                <button class="btn btn-warning" disabled> Non
                                                    Active
                                                </button>
                                            @endif

                                        </td>

                                        <a href=""></a>


                                        <td class="align-middle">
                                            <a href="{{ route('departement.show', $item->id) }}"
                                                class="fas fa-eye btn btn-info"></a>

                                            @if (Auth::user()->EmployeePosition == 'HR')
                                                <a href="{{ route('departement.edit', $item->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i></a>

                                                <form action="{{ route('departement.destroy', $item->id) }}"
                                                    class="d-inline" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-warning d-inline"> <i
                                                            class="fas fa-trash">
                                                        </i> </button>
                                                </form>
                                            @endif
                                        </td>

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
