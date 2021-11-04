@extends('layouts.layout')

@section('title', 'Detail Attendance')

@section('content')
    <div class="card">
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption uppercase">
                            <b><i class="icon-tag" style="margin-top:2px"></i></b> &nbsp;Detail Attendence
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered" style="border: 1px solid #DDDDDD">
                                    <tr>
                                        <td width="20%">
                                            EmployeeName
                                        </td>
                                        <td>
                                            {{ $takeuser->EmployeeName }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            CheckIn
                                        </td>
                                        <td>
                                            {{ $take->Check_In }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            CheckIn Address
                                        </td>
                                        <td>
                                            {{ $take->Address_CheckIn }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            CheckOut
                                        </td>
                                        <td>
                                            {{ $take->Check_Out }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            CheckOut Address
                                        </td>
                                        <td>
                                            {{ $take->Address_CheckOut }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            Notes
                                        </td>
                                        <td>
                                            {{ $take->Notes }}
                                        </td>
                                    </tr>
                                    <tr>

                                        <td width="20%">
                                            Activity
                                        </td>
                                        <td>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            TaskName

                                                        </th>
                                                        <th>
                                                            Duration (Hours)
                                                        </th>
                                                        <th>
                                                            Status

                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($taskdetail as $item)
                                                    <tr>
                                                        <td>
                                                            {{ $item->TaskName }}
                                                        </td>
                                                        <td>
                                                            {{ $item->Duration }}
                                                        </td>
                                                        <td width="200px">
                                                            {{ $item->Status }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            Location CheckIn
                                        </td>
                                        <td>
                                            <div class="googleMap" id="MapCheckIn"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">
                                            Location CheckOut
                                        </td>
                                        <td>
                                            <div class="googleMap" id="MapCheckOut"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    $(document).ready(function () {
    //getLocation();
    ShowLocationCheckIn();
    ShowLocationCheckOut();
    });


    function ShowLocationCheckIn() {
    var lat = '{{ $take->Latitude_CheckIn }}';
    var lon = '{{ $take->Longitude_CheckIn }}';
    if (lon.length == 0 && lat.length == 0) {
    $("#MapCheckIn").html("No Location Available");
    } else {
    var zoom = 16;
    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    map = new OpenLayers.Map("MapCheckIn");
    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);
    var position = new OpenLayers.LonLat(lon, lat).transform(fromProjection, toProjection);
    var markers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));
    map.setCenter(position, zoom);
    }
    }

    function ShowLocationCheckOut() {
    var lat = '{{ $take->Latitude_CheckOut }}';
    var lon = '{{ $take->Longitude_CheckOut }}';

    if (lon.length == 0 && lat.length == 0) {
    $("#MapCheckOut").html("No Location Available");
    } else {
    var zoom = 16;
    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    map = new OpenLayers.Map("MapCheckOut");
    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);
    var position = new OpenLayers.LonLat(lon, lat).transform(fromProjection, toProjection);
    var markers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));
    map.setCenter(position, zoom);
    }


    }
@endsection
