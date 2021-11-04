@extends('layouts.layout')

@section('title', 'Department')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption uppercase">
                        &nbsp;<h3 class="fas fa-university">
                            Detail Asset</h3>
                    </div>
                </div>
                <div class="portlet-body mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                <tr>
                                    <td width="20%">
                                        Asset Name
                                    </td>
                                    <td>
                                        {{ $data->AssetName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Serial No
                                    </td>
                                    <td>
                                        {{ $data->SerialNo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Year
                                    </td>
                                    <td>
                                        {{ $data->Year }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Condition Used / New
                                    </td>
                                    <td>
                                        @if ($data->condition == 'Used')
                                            <button class="btn btn-primary" disabled> Used
                                            </button>
                                        @else
                                            <button class="btn btn-warning" disabled> New
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Date
                                    </td>
                                    <td>
                                        {{ $data->Date }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Price
                                    </td>
                                    <td>
                                        {{ $data->Price }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Photo Asset
                                    </td>
                                    <td>
                                        <img src="{{ url($data->PhotoAsset) }}" width="300px" height="300px" alt="">
                                    </td>
                                </tr>
                                <tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
