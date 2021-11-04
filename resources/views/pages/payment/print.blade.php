<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <title> Salary Slip </title>
    <style>
        .user {
            margin-bottom: 20px;
        }

        .row .col-md-5 {
            padding-left: 100px;
        }

    </style>
</head>

<body id="background-image" style="font-family: 'Poppins', sans-serif; font-weight:bold;
">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('assets/images/csul.png') }}" width="200px" height="100px" alt="">
            </div>
            <div class="col-md-4 text-center">
                <h3> <b> Slip Gaji </b> </h3>
            </div>
            <div class="col-md-4 text-right">
                <div>
                    Tanggal : {{ $data->Time }}
                </div>
                <div class="mt-3">
                    NPWP : {{ $data->user->TIN }}
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>

    <hr style="border:0.7px solid black">


    <div class="row">
        <div class="col-md-5">
            <div class="user">
                Name &nbsp;&nbsp; &nbsp;&nbsp; : {{ $data->user->EmployeeName }}
            </div>
            <div class="user">
                Position &nbsp;&nbsp; : {{ $data->user->EmployeePosition }}
            </div>
            <div class="user">
                Type &nbsp; &nbsp; &nbsp; &nbsp; : {{ $data->user->EmployeeType }}
            </div>
        </div>
        <div class="col-md-5">
            <div class="user">
                Department &nbsp;&nbsp; &nbsp;&nbsp; : {{ $data->user->Department }}
            </div>
            <div class="user">
                Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $data->user->Phone }}
            </div>
            <div class="user">
                NoAccount &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $data->salary->NoAccount }}
            </div>
        </div>
    </div>

    <hr style="border:0.7px solid black">

    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <th scope="row">Base Salary</th>
                <th scope="row"> @currency($data->salary->GajiPokok) </th>

            </tr>
            <tr>
                <th scope="row">2</th>
                <th scope="row">Allowance</th>
                <td> @currency($data->salary->Tunjangan)</td>
                <td> (+) </td>

            </tr>
            <tr>
                <th scope="row">3</th>
                <th scope="row">Tax</th>
                <td> {{ $data->salary->Tax }}%</td>
                <td> (-) </td>
            </tr>
            <tr>

                <th rowspan="2" scope="row">4</th>
                <th scope="row"> Total Received </th>
                <td> @currency( $data->salary->Total) </td>
            </tr>
        </tbody>
    </table>

    <hr style="border:0.7px solid black">

    <div class="row">
        <div class="col-md-5">
            <h5 class="ml-4"> Receiver </h5>

            <div style="margin-top: 120px">
                {{ $data->user->EmployeeName }}
            </div>
        </div>
        <div class="col-md-4" style="margin-left: 250px">
            <h5 class="ml-4"> Support Function </h5>

            <div style="margin-top: 120px ">
                PT. Chandra Sakti Utama Leasing
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script>
        window.addEventListener("load", window.print());

    </script>
</body>

</html>
