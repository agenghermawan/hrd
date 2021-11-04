    <link rel="icon" href="{{ asset('assets/aragon/img/brand/favicon.png') }}" type="image/png">
    {{-- <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"> --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/aragon/vendor/nucleo/css/nucleo.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/aragon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('assets/aragon/css/argon.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">




    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/aragon/css/argon.css?v=1.2.0') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css">
    <style type="text/css">
        #googleMap {
            height: 250px;
            width: 100%;
        }

        .googleMap {
            height: 250px;
            width: 100%;
        }

        @media (max-width:440px) {
            #googleMap {
                height: 200px;
                width: 340px;
            }
        }

        #flotPie1 {
            height: 310px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        @yield('style')

    </style>
