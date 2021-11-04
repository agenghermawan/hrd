@extends('layouts.layout')

@section('title')
    List Salary
@endsection

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'HR')
        <a href="{{ route('salary.create') }}" class="btn btn-neutral"><i class="fas fa-mug-hot mr-2 "> </i> Add New
            Salary</a>
    @endif
@endsection


@section('content')
    <div class="card" style="font-family: 'Poppins', sans-serif;">
        <div class="card-body">
            <div class="table-responsive mt-4">
                <div>
                    <table class="table align-items-center table-flush table stylish-table no-wrap" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-top-0" colspan="2">EmployeeName</th>
                                <th scope="col" class="sort" data-sort="name">EmployeeID</th>
                                <th scope="col" class="sort" data-sort="budget">Departement</th>
                                <th scope="col" class="sort" data-sort="completion">Gaji Pokok</th>
                                <th scope="col" class="sort" data-sort="completion">Tunjangan</th>
                                <th scope="col" class="sort" data-sort="completion">BPJS</th>
                                <th scope="col" class="sort" data-sort="completion">Total</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>


                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($data as $item)
                                <tr>
                                    <td class="align-center"><img src="{{ url($item->user->Photo) }}" style="width: 50px"
                                            class="rounded-circle" alt=""></td>
                                    <td class="align-middle">
                                        <h6 class="text-light">{{ $item->user->EmployeeName }}</h6><small
                                            class="text-muted">{{ $item->user->EmployeePosition }}</small>
                                    </td>
                                    <td>
                                        {{ $item->EmployeeID }}
                                    </td>

                                    <td>
                                        {{ $item->user->Department }}
                                    </td>
                                    <td>
                                        @currency($item->GajiPokok)
                                    </td>
                                    <td>
                                        @currency($item->Tunjangan)
                                    </td>
                                    <td>
                                        {{ $item->Tax }}%
                                    </td>
                                    <td>
                                        @currency($item->Total)
                                    </td>
                                    <td>
                                        <a href="{{ route('salary.edit', $item->SalaryID) }}"
                                            class="fas fa-edit btn btn-primary"></a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('style')
    .avatar-xs {
    height: 2.3rem;
    width: 2.3rem;
    }
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#slider-3").slider({
                range: true,

                min: 0,
                max: 100,
                values: [0, ],
                slide: function(event, ui) {
                    $("#price").val(ui.values[1]);
                }
            });
        });

    </script>
@endsection
