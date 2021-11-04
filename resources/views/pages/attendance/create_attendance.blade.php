@extends('layouts.layout')

@section('title', 'Attendance')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header">
                            <a href="#" class="btn btn-sm btn-neutral">Daily Attendance</a>

                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="form-group text-center">
                                    <div style="font-size:20px">
                                        <div id="date-part"></div>
                                        <div id="time-part" class="text-dark" style="font-size:20px !important"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <b> <label class="control-label col-md-4"></label></b>
                                    <div class="col-lg-12 col-md-10 col-sm-12 mx-auto">
                                        <div class="text-center" id="address"></div>
                                        <input type="hidden" name="Address" id="addresshidden" />
                                        <input id="Latitude" name="Latitude" type="hidden" value="" />
                                        <input id="Longitude" name="Longitude" type="hidden" value="" />
                                        <div id="googleMap"></div>
                                    </div>
                                </div>

                                <hr>
                                <div class="info">
                                    <a href="#" class="btn btn-sm btn-neutral ">Employee Information</a>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Employee ID :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-globe-americas"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="EmployeeID" name="EmployeeID"
                                                    value="{{ Auth::user()->EmployeeID }}" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Department Employee :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="Department" name="Department"
                                                    value="{{ Auth::user()->Department }}" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Employee Name :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="EmployeeName"
                                                    name="EmployeeName" value="{{ Auth::User()->EmployeeName }}"
                                                    style="cursor:not-allowed" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Employee Position :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-toggle-on"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="EmployeeID"
                                                    name="EmployeePosition" value="{{ Auth::user()->EmployeePosition }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Work Type :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <select class="form-control" id="exampleFormControlSelect1" name="WorkType"
                                                    required>
                                                    <option> <b> Work From Home </b></option>
                                                    <option> <b> Work From Office </b></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Note :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="Notes" name="Notes" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <a href="#" class="btn btn-sm btn-neutral mb-5">Employee Activity</a>

                                @if ($attendance == null)
                                    <div class="file-repeater">
                                        <div data-repeater-list="attendanceDetail">
                                            <div data-repeater-item style="margin-top:6px">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <label for="TaskName">
                                                            <h5>
                                                                Task :
                                                            </h5>
                                                        </label>
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-tasks"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="TaskName">

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-5">
                                                        <label for="Duration">
                                                            <h5>
                                                                Duration :
                                                            </h5>
                                                        </label>
                                                        <div class="input-group input-group-merge">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-clock"></i></span>
                                                            </div>
                                                            <input type="number" class="form-control" name="Duration">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-1">
                                                        <label for="Duration">
                                                            <h5>
                                                                &nbsp;
                                                            </h5>
                                                        </label>
                                                        <div class="input-group input-group-merge">
                                                            <button type="button" data-repeater-delete
                                                                class="btn form-control btn-info mr-1 btnremoverepeater"><i
                                                                    class="fas fa-backspace"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" data-repeater-create class="btn  btn-primary">
                                            <i class="fa fa-plus"></i> Add Task
                                        </button>
                                    </div>
                                @endif


                                <div class="file-repeater">
                                    <div data-repeater-list="attendanceDetailCheckout">
                                        @if ($attendance != null)
                                            @if ($attendance->Check_Out == null)
                                                @foreach ($task as $item)
                                                    <div data-repeater-item style="margin-top:6px">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label for="TaskName">
                                                                    <h5>
                                                                        Task :
                                                                    </h5>
                                                                </label>
                                                                <div class="input-group input-group-merge">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-tasks"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="TaskName"
                                                                        value="{{ $item->TaskName }}">
                                                                </div>
                                                            </div>
                                                            <div class=" form-group col-lg-3">
                                                                <label for="Duration">
                                                                    <h5>
                                                                        Duration :
                                                                    </h5>
                                                                </label>
                                                                <div class="input-group input-group-merge">

                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i
                                                                                class="fas fa-clock"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="Duration"
                                                                        required value="{{ $item->Duration }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-lg-2">
                                                                <label for="Status">
                                                                    <h5>
                                                                        Status :
                                                                    </h5>
                                                                </label>
                                                                <div class="form-group">
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1" name="Status">
                                                                        <option>-- Choose Status --</option>
                                                                        <option>Done</option>
                                                                        <option>Progress</option>
                                                                        <option>Carried Over Activity</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-lg-1">
                                                                <label for="Duration">
                                                                    <h5>
                                                                        &nbsp;
                                                                    </h5>
                                                                </label>
                                                                <div class="input-group input-group-merge">

                                                                    <button type="button" data-repeater-delete
                                                                        class="btn form-control btn-info mr-1 btnremoverepeater"><i
                                                                            class="fas fa-backspace"></i></button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if ($attendance != null)
                                    @if ($attendance->Check_Out == null)
                                        <div class="file-repeater">
                                            <div data-repeater-list="attendanceDetailCheckoutAddit">
                                                <div data-repeater-item style="margin-top:6px">
                                                    <div class="row">
                                                        <div class="form-group col-lg-6">
                                                            <label for="TaskName">
                                                                <h5>
                                                                    Task :
                                                                </h5>
                                                            </label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-tasks"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" name="TaskName">
                                                            </div>
                                                        </div>
                                                        <div class=" form-group col-lg-3">
                                                            <label for="Duration">
                                                                <h5>
                                                                    Duration :
                                                                </h5>
                                                            </label>
                                                            <div class="input-group input-group-merge">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-clock"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" name="Duration"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-2">
                                                            <label for="Status">
                                                                <h5>
                                                                    Status :
                                                                </h5>
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="form-control" id="exampleFormControlSelect1"
                                                                    name="Status">
                                                                    <option>-- Choose Status --</option>
                                                                    <option>Done</option>
                                                                    <option>Progress</option>
                                                                    <option>Carried Over Activity</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-1">
                                                            <label for="TaskName">
                                                                <h5>
                                                                    &nbsp;
                                                                </h5>
                                                            </label>
                                                            <div class="input-group input-group-merge">

                                                                <button type="button" data-repeater-delete
                                                                    class="btn form-control btn-info mr-1 btnremoverepeater"><i
                                                                        class="fas fa-backspace"></i></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create class="btn  btn-primary">
                                                <i class="fa fa-plus"></i> Add Task
                                            </button>
                                        </div>

                                    @endif
                                @endif


                                <div class="button mt-4 text-center col-sm-12">
                                    @if ($attendance == null)
                                        <button type="submit" class="btn btn-warning mx-auto text-center"> START DAY
                                        </button>
                                    @else

                                        @if ($attendance->Check_Out == null)
                                            <button type="submit" class="btn btn-warning mx-auto text-center">
                                                END DAY
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-warning mx-auto text-center"
                                                style="cursor:not-allowed" disabled>
                                                YOUR ALREADY CHECK IN & CHECK OUT TODAY </button>
                                        @endif

                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script')
    $(document).ready( function () {
    GetLocation()
    } );

    $('.file-repeater').repeater({
    show: function () {
    $(this).slideDown();
    }
    });

    var interval = setInterval(function () {
    var momentNow = moment();
    momentNow.locale('id');
    $('#date-part').html(momentNow.format('dddd') + ', ' + momentNow.format('DD MMMM YYYY'));
    $('#time-part').html(momentNow.format('HH:mm:ss'));
    }, 100);


    function reverseGeocode(lon, lat) {
    fetch('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lon=' + lon + '&lat=' + lat)
    .then(function (response) {
    return response.json();
    }).then(function (json) {
    console.log(json);
    $("#address").html(json.display_name)
    $("#addresshidden").val(json.display_name)
    });
    }


    function GetLocation() {
    //var lat = -6.3210775;
    //var lon = 106.8196776;
    var zoom = 16;
    var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
    var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    map = new OpenLayers.Map("googleMap");
    var mapnik = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var geolocate = new OpenLayers.Control.Geolocate({
    bind: false,
    geolocationOptions: {
    enableHighAccuracy: true,
    maximumAge: 0,
    timeout: 7000
    }
    });
    map.addControl(geolocate);
    geolocate.activate();

    geolocate.events.register("locationupdated", geolocate, function (e) {
    var longitude = e.position.coords.longitude;
    var latitude = e.position.coords.latitude;
    var position = new OpenLayers.LonLat(longitude, latitude).transform(fromProjection, toProjection);
    var markers = new OpenLayers.Layer.Markers("Markers");
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(position));
    map.setCenter(position, zoom);
    $("#Latitude").val(latitude);
    $("#Longitude").val(longitude);
    reverseGeocode(longitude, latitude);
    $('.btncheckincheckout').removeAttr('disabled', 'disabled');
    console.log(longitude)
    console.log(latitude)
    console.log(e)
    })

    geolocate.events.register("locationfailed", this, function (e) {
    console.log(e)
    // sweetAlert("Get Location Failed !!", e.error.message, "error");

    });
    }
@endsection
