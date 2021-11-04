@extends('layouts.layout')

@section('title', 'Department')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption uppercase">
                        &nbsp;<h3 class="fas fa-coffee">
                            Detail Project</h3>
                    </div>
                </div>
                <div class="portlet-body mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                <tr>
                                    <td width="20%">
                                        <b> Team Name</b>
                                    </td>
                                    <td>
                                        {{ $data->TeamName }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <b> Project Name </b>
                                    </td>
                                    <td>
                                        {{ $data->ProjectName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Project Start </b>
                                    </td>
                                    <td>
                                        {{ $data->ProjectStart }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Project End </b>
                                    </td>
                                    <td>
                                        {{ $data->ProjectEnd }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b> Project Manager </b>
                                    </td>
                                    <td>
                                        {{ $data->ProjectManager }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Department </b>
                                    </td>
                                    <td>
                                        {{ $data->Department }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Developer Name</b>
                                    </td>
                                    <td>

                                        {{ $data->DeveloperName }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Document Created By </b>
                                    </td>
                                    <td>
                                        {{ $data->DocumentCreateBy }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b> Developemt Progress </b>
                                    </td>
                                    <td>
                                        <div class="progress w-100" style="height: 30px">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $data->DevelopmentProgress }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        {{ $data->DevelopmentProgress }}%
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b> Status </b>
                                    </td>
                                    <td>
                                        @if ($data->Status == 'On Progress')
                                            <button class="btn btn-info" disabled> On Progress
                                            </button>
                                        @else
                                            <button class="btn btn-primary" disabled> Done
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b> Note </b>
                                    </td>
                                    <td>
                                        {{ $data->Note }}
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
