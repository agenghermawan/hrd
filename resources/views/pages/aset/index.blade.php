@extends('layouts.layout')

@section('title', ' Asset')

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'HR')
        <a href="{{ route('asset.create') }}" class="btn btn-neutral ">
            Add New Asset
        </a>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body rounded">
                    <div class="row">
                        <div class="col-md-8">
                            <h5> List Leave</h5>
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table align-items-center table-flush table stylish-table no-wrap" id="myTable">
                            <thead class="thead-light text-center">
                                <tr>
                                    <th class="border-top-0">Asset Name
                                    </th>
                                    <th class="border-top-0">Serial No
                                    </th>
                                    <th class="border-top-0">Year</th>
                                    <th class="border-top-0">Used / New</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($data as $item)
                                    <tr>
                                        <td class="align-middle text-center">
                                            {{ $item->AssetName }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->SerialNo }}
                                        </td>
                                        <td class="align-middle text-center">
                                            {{ $item->Year }}
                                        </td>

                                        <td class="align-middle text-center">
                                            {{ $item->condition }}

                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('asset.show', $item->id) }}"
                                                class="btn btn-info fas fa-eye"></a>
                                            @if (Auth::user()->EmployeePosition == 'HR' || Auth::user()->EmployeePosition == 'Supervisor')

                                                <a href="{{ route('asset.edit', $item->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i></a>

                                                <form action="" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-warning d-inline"> <i
                                                            class="fas fa-trash">
                                                        </i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>

                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No record
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('name')

@endsection
