@extends('layouts.layout')

@section('title')
    List Salary
@endsection

@section('btn-right')
    @if (Auth::user()->EmployeePosition == 'HR')
        <a href="{{ route('payment.create') }}" class="btn btn-neutral"><i class="fas fa-mug-hot mr-2 "> </i> Add New
            Payment</a>
    @endif
@endsection
{{-- @section('header')
    <div class="card">
 
    </div>
@endsection --}}
@section('content')
    <div class="card" style="font-family: 'Poppins', sans-serif;">
        <div class="card-body">
            {{-- <div class="container-fluid row">
                <div class="col-lg-6 col-sm-12">
                    <h5> Payment List </h5>
                </div>
            </div>
            <div class="container text-center mx-auto">
            </div> --}}
            {{-- <form action="{{ route('payment.search') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="col-lg-12 col-sm-12 col-md-10 mx-auto mt-5">
                    <div class="form-group">
                        <label>Date From :</label>
                        <input type="date" class="date form-control" required name="DateFrom" />
                    </div>
                    <div class="form-group">
                        <label>Date To :</label>
                        <input type="date" class="date form-control" required name="DateTo" />
                    </div>
                    <div class="col-sm-12 col-lg-12 col-md-10 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit"> SEARCH </button>
            </form> --}}


        </div>
        <div class="table-responsive mt-4">
            <div>
                <table class="table align-items-center table-flush table stylish-table no-wrap" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-top-0" colspan="2">EmployeeName</th>
                            <th scope="col" class="sort" data-sort="name">EmployeeID</th>
                            <th scope="col" class="sort" data-sort="budget">Departement</th>
                            <th scope="col" class="sort" data-sort="completion">Time</th>
                            <th scope="col" class="sort" data-sort="completion">Payment Method</th>
                            <th scope="col" class="sort" data-sort="completion">Status</th>
                            <th scope="col" class="sort" data-sort="completion">Total</th>
                            @if (Auth::user()->EmployeePosition == 'HR')
                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse  ($items as $item)
                            <tr>
                                <td class="align-center"><img src="{{ url($item->user->Photo) }}" style="width: 50px"
                                        class="rounded-circle" alt=""></td>
                                <td class="align-middle">
                                    <h6 class="text-light">{{ $item->user->EmployeeName }}</h6><small
                                        class="text-muted">{{ $item->user->EmployeePosition }}</small>
                                </td>
                                <td>
                                    {{ $item->user->EmployeeID }}
                                </td>

                                <td>
                                    {{ $item->user->Department }}
                                </td>
                                <td>
                                    {{ $item->Time }}
                                </td>
                                <td>
                                    {{ $item->PaymentMethod }}
                                </td>
                                <td>
                                    @if ($item->Status == 'Paid')
                                        <button class="btn btn-primary"> {{ $item->Status }}</button>
                                    @else
                                        <button class="btn btn-warning"> {{ $item->Status }}</button>
                                    @endif

                                </td>
                                <td>
                                    @currency($item->salary->Total)
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('payment.show', $item->PaymentID) }}"
                                        class="btn btn-info fas fa-eye"></a>
                                    @if (Auth::user()->EmployeePosition == 'HR')

                                        <a href="{{ route('payment.edit', $item->PaymentID) }}"
                                            class="fas fa-pencil-alt btn btn-primary">
                                        </a>

                                        <form action="" class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-warning d-inline"> <i class="fas fa-trash">
                                                </i> </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    No Record
                                </td>
                            </tr>

                        @endforelse ($items as $item)
                    </tbody>
                </table>
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
