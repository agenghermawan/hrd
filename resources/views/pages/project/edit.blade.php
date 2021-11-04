@extends('layouts.layout')

@section('title')
    Create Project
@endsection

@section('content')
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    <i class="fas fa-mug-hot mr-2"> </i> Create New Project
                </button>
            </h5>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('project.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Team Name</label>
                                    <input class="form-control" type="text" value="{{ $data->TeamName }}"
                                        id="example-text-input">
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="form-control-label">Project Name</label>
                                    <input class="form-control" type="text" value="{{ $data->ProjectName }}"
                                        id="example-search-input">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-email-input" class="form-control-label">Project
                                                Start</label>
                                            <input class="form-control" type="date" value="{{ $data->ProjectStart }}"
                                                id="example-email-input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-url-input" class="form-control-label">Project End</label>
                                            <input class="form-control" type="date" value="{{ $data->ProjectEnd }}"
                                                id="example-url-input">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="developername"> Developer Name :</label>
                                    <select class="form-control select" multiple="multiple">
                                        @foreach ($user as $item)
                                            <option> {{ $item->EmployeeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-tel-input" class="form-control-label">Document Create By :</label>
                                    <input class="form-control" type="text" value="{{ $data->DocumentCreateBy }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-number-input" class="form-control-label">Project Manager</label>
                                    <input class="form-control" type="text" value="{{ $data->ProjectManager }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Departement :</label>
                                    <select class="form-control" name="DepartementName">
                                        @forelse ($departement as $item)
                                            <option>{{ $item->Department_Name }}</option>
                                        @empty
                                            No Record
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Status">
                                        <h5> Status </h5>
                                    </label>
                                    <select class="form-control" name="Status">
                                        <option> On Progress </option>
                                        <option> Done </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-12"
                                        for="DevelopmentProgress">DevelopmentProgress</label>
                                    <div class="col-md-12">
                                        <div id="slider"></div> <br>
                                        <input id="slider-range-value" type="text"
                                            value="{{ $data->DevelopmentProgress }}" name="DevelopmentProgress"
                                            class="form-control input-small input-inline" name="DevelopmentProgress"><br />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Note</label>
                                    <input class="form-control" type="text" name="Note" value="{{ $data->Note }}">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit"> Update Project </button>

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
<script src="{{ asset('js/nouislider.js') }}"></script>
<script>
    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [{{ $data->DevelopmentProgress }}],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    });



    var inputvalue = $("#slider-range-value");
    var o = document.getElementById('slider-range-value');
    slider.noUiSlider.on('update', function(values, handle) {
        inputvalue.val(values[handle])

        var i = values[handle];
    }), o.addEventListener("change", function() {
        slider.noUiSlider.set([inputvalue.val(), this.value])
    })

</script>

@endsection
