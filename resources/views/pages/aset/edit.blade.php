@extends('layouts.layout')

@section('title', ' Departement')

@section('content')


    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-wrapper">
                    <!-- Input groups -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <a href="#" class="btn btn-sm btn-neutral">Edit Asset</a>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('asset.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Input groups with icon -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Asset Name :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-creative-commons-by"></i></span>
                                                </div>
                                                <input class="form-control" value="{{ $item->AssetName }}"
                                                    name="AssetName" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> SerialNo :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fab fa-buromobelexperte"></i></span>
                                                </div>
                                                <input class="form-control" name="SerialNo" value="{{ $item->SerialNo }}"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Year :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input class="form-control" name="Year" value="{{ $item->Year }}"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Condition :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-plane"></i></span>
                                                </div>
                                                <input class="form-control" name="condition"
                                                    value="{{ $item->condition }}" type="text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Price :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                </div>
                                                <input class="form-control" name="Price" value="{{ $item->Price }}"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Date :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input class="form-control" name="Date" value="{{ $item->Date }}"
                                                    type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> File Asset :</h5>
                                            </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFileLang" lang="en"
                                                    name="PhotoAsset" value="{{ url($item->PhotoAsset) }}">
                                                <label class="custom-file-label" for="customFileLang">Select
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">
                                                <h5> Information :</h5>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                </div>
                                                <input class="form-control" name="Information"
                                                    value="{{ $item->Information }}" type="text">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <label for="">
                                    <h5> Your Asset :</h5>
                                </label>
                                <div class="col-md-6">
                                    <img src="{{ url($item->PhotoAsset) }}" class="rounded" style="width: 200px" alt="">
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-warning mx-auto text-center"> Edit New
                                        Asset
                                    </button>
                                </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')

@endsection
