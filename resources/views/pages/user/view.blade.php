@extends('layouts.layout')

@section('title', 'Employee')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption uppercase">
                        &nbsp;<h3 class="fas fa-university">
                            Detail Employee</h3>
                    </div>
                </div>
                <div class="portlet-body mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                <tr>
                                    <td width="20%">
                                        Employee ID
                                    </td>
                                    <td>
                                        {{ $data->EmployeeID }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Employee Name
                                    </td>
                                    <td>
                                        {{ $data->EmployeeName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Employee Type
                                    </td>
                                    <td>
                                        {{ $data->EmployeeType }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Employee Position
                                    </td>
                                    <td>
                                        {{ $data->EmployeePosition }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Employee Department
                                    </td>
                                    <td>
                                        {{ $data->Department }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Birth Date
                                    </td>
                                    <td>
                                        {{ $data->BirthDate }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Join Date
                                    </td>
                                    <td>
                                        {{ $data->JoinDate }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        {{ $data->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone
                                    </td>
                                    <td>
                                        {{ $data->Phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tax Identification Number
                                    </td>
                                    <td>
                                        {{ $data->TIN }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Photo
                                    </td>
                                    <td>
                                        <img src="{{ url($data->Photo) }}" class="img-responsive rounded" width="100px"
                                            height="100px" alt="">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Address
                                    </td>
                                    <td>
                                        {{ $data->Address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        City
                                    </td>
                                    <td>
                                        {{ $data->City }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Country
                                    </td>
                                    <td>
                                        {{ $data->Country }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Postal Code
                                    </td>
                                    <td>
                                        {{ $data->Postal_Code }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        About Me
                                    </td>
                                    <td>
                                        {{ $data->AboutMe }}
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
