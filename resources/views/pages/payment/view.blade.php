@extends('layouts.layout')

@section('title', 'Department')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption uppercase">
                        &nbsp;<h3 class="fas fa-university">
                            Detail Payment</h3>
                    </div>
                </div>
                <div class="portlet-body mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                <tr>
                                    <td>
                                        Employee ID
                                    </td>
                                    <td>
                                        {{ $data->user->EmployeeID }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">
                                        Employee Name
                                    </td>
                                    <td>
                                        {{ $data->user->EmployeeName }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        Department
                                    </td>
                                    <td>
                                        {{ $data->user->Department }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Time
                                    </td>
                                    <td>
                                        {{ $data->Time }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Payment Method
                                    </td>
                                    <td>
                                        {{ $data->PaymentMethod }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Base Salary
                                    </td>
                                    <td>
                                        @currency($data->salary->GajiPokok)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tunjangan
                                    </td>
                                    <td>
                                        @currency($data->salary->Tunjangan)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tax
                                    </td>
                                    <td>
                                        {{ $data->salary->Tax }}%
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td>
                                        @currency($data->salary->Total)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status
                                    </td>
                                    <td>
                                        @if ($data->Status == 'Paid')
                                            <button class="btn btn-primary" disabled> Paid
                                            </button>
                                        @else
                                            <button class="btn btn-warning" disabled> UnPaid

                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Salary Slip
                                    </td>
                                    <td>
                                        <form action="{{ route('payment.print', $data->PaymentID) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <button class="fas fa-print btn btn-primary"> Print </button>

                                        </form>
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
