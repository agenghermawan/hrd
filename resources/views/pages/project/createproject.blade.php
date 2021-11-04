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
                            <form action="{{ route('project.store') }}" method="POST" class="my-2"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Team Name</label>
                                    <input class="form-control" type="text" id="example-text-input" name="TeamName">
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="form-control-label">Project Name</label>
                                    <input class="form-control" type="text" id="example-search-input" name="ProjectName">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-email-input" class="form-control-label">Project
                                                Start</label>
                                            <input class="form-control" type="date" id="example-email-input"
                                                name="ProjectStart">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-url-input" class="form-control-label">Project End</label>
                                            <input class="form-control" type="date" id="example-url-input"
                                                name="ProjectEnd">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="developername">
                                        <h5> <strong> Developer Name : </strong> </h5>
                                    </label>
                                    <select class="form-control select selectpicker" style="background-color: white"
                                        multiple name="DeveloperName[]">
                                        @foreach ($user as $item)
                                            <option value="{{ $item->EmployeeID }}">
                                                {{ $item->EmployeeName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">
                                        <h5>
                                            Document Create By : </h5>
                                    </label>
                                    <select class="form-control" name="DocumentCreateBy">
                                        @foreach ($user as $item)
                                            <option> {{ $item->EmployeeName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ProjectManager">
                                        <h5>
                                            Project Manager : </h5>
                                    </label>
                                    <select class="form-control" name="ProjectManager">
                                        @foreach ($user as $item)
                                            <option> {{ $item->EmployeeName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Department">
                                        <h5>Departement : </h5>
                                    </label>
                                    <select class="form-control" name="Department">
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
                                    <label class="control-label col-md-12" for="DevelopmentProgress">
                                        <h5>DevelopmentProgress </h5>
                                    </label>
                                    <div class="col-md-12">
                                        <div id="slider"></div> <br>
                                        <input id="slider-range-value" type="text" name="DevelopmentProgress"
                                            class="form-control input-small input-inline" name="DevelopmentProgress"><br />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">
                                        <h5> Note </h5>
                                    </label>
                                    <input type="text" class="form-control" name="Note">
                                </div>

                                <div class="form-group">
                                    <label for="submit"></label>
                                    <button class="btn btn-primary w-100" type="submit"> Save </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@section('style')

@endsection

@section('script')
<script src="{{ asset('js/nouislider.js') }}"></script>
<script>
    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [0],
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
