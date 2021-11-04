@extends('layouts.layout')

@section('title')
    List Project
@endsection

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'Employee')
        <a href="{{ route('project.create') }}" class="btn btn-neutral"><i class="fas fa-mug-hot mr-2 "> </i> Add New
            Project</a>
    @endif
@endsection

@section('header')
    <div class="row">
        <div class="col-xl-4 col-md-6">
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
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> &nbsp;</span>
                        <span class="text-nowrap">&nbsp;</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Project OnProgress</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $onprogress }}</span>
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
        <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Progress Done</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $done }}</span>
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
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-4">
                <div>
                    <table class="table align-items-center table-flush table stylish-table no-wrap" id="myTable">
                        <thead class="thead-light ">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Team Name</th>
                                <th scope="col" class="sort" data-sort="budget">Project Name</th>
                                <th scope="col" class="sort" data-sort="status">Project Start</th>
                                <th scope="col">Project End</th>
                                <th scope="col" class="sort" data-sort="completion">Development Progress</th>
                                <th scope="col" class="sort" data-sort="completion">Status</th>

                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list ">
                            @foreach ($item as $item)
                                <tr>
                                    <td>
                                        {{ $item->TeamName }}
                                    </td>
                                    <td>
                                        {{ $item->ProjectName }}
                                    </td>
                                    <td>
                                        {{ $item->ProjectStart }}
                                    </td>
                                    <td>
                                        {{ $item->ProjectEnd }}
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="completion mr-2">{{ $item->DevelopmentProgress }}%</span>
                                            <div>
                                                <div class="progress" style="height: 20px">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $item->DevelopmentProgress }}%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($item->Status == 'On Progress')
                                            <button class="btn btn-info"> {{ $item->Status }}</button>
                                        @else
                                            <button class="btn btn-primary"> {{ $item->Status }}</button>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                    href="{{ route('project.show', $item->id) }}">View</a>
                                                @if (Auth::user()->EmployeePosition == 'Employee')
                                                    <a class="dropdown-item"
                                                        href="{{ route('project.edit', $item->id) }}">Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('project.destroy', $item->id) }}">Delete</a>
                                                @endif

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
    </div>

@endsection

@section('style')
    .avatar-xs {
    height: 2.3rem;
    width: 2.3rem;
    }
@endsection

@section('script')
    <script>
        $(function() {
            $("#slider-3").slider({
                range: true,

                min: 0,
                max: 100,
                values: [0, ],
                slide: function(event, ui) {
                    $("#price").val(ui.values[1]);
                }
            });
        });

    </script>
@endsection
