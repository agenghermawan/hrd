@extends('layouts.layout')

@section('title', 'Department')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption uppercase">
                        &nbsp;<h3 class="fas fa-university">
                            Detail Department</h3>
                    </div>
                </div>
                <div class="portlet-body mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                <tr>
                                    <td width="20%">
                                        Department Name
                                    </td>
                                    <td>
                                        {{ $data->Department_Name }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Department Head
                                    </td>
                                    <td>
                                        {{ $data->Department_Head }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Employee
                                    </td>
                                    <td>
                                        {{ $data->Total_Employee }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Created Department At
                                    </td>
                                    <td>
                                        {{ $data->Created_Department }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status Deparment
                                    </td>
                                    <td>
                                        @if ($data->Status == 'Active')
                                            <button class="btn btn-primary" disabled> Active
                                            </button>
                                        @else
                                            <button class="btn btn-warning" disabled> Non
                                                Active
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
