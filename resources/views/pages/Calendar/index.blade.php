@extends('layouts.layout')

@section('title', 'Calendar')


@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div id='calendar' class="text-center"></div>
                </div>
            </div>
        </div>
        <div class="card col-md-3">
            <h3 class="mt-4"> Leave Information </h3>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $item->user->EmployeeName }}</th>
                            <td>{{ $item->Date_start }}</td>
                            <td>{{ $item->Date_end }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('script')
    document.addEventListener('DOMContentLoaded', function() {


    $.ajax({
    url: '/getLeave/',
    type: 'get',
    dataType: 'json',
    success: function(r) {

    console.log(r.data)
    BuildCalendar(r.data);
    },
    error: function(e) {
    sweetAlert("Load data gagal !!", "Error :" + e, "error");
    }
    })





    });

    function BuildCalendar(dataBirthDate) {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
    left: '',
    center: 'title',
    right: 'prev,next today',

    },
    aspectRatio: 2,
    buttonText: {
    today: 'Today',
    month: 'Month',
    },
    themeSystem: 'default',
    events: dataBirthDate
    });
    calendar.render();
    }


@endsection
