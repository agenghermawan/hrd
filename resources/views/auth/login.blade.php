<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/aragon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <title>
        Login Dashboard
    </title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            /* Hide scrollbars */

        }

        #yellow {
            height: 100%;
            margin-top: 200px;
        }

        #yellow h3 {
            margin-top: 50px;
        }

        #image {
            height: 100%;
        }

        /** TIPS: 
1. The carousel shouldn't be in any other div, like for example div with class container. 
2. You can align image position in classes bg1, bg2, bg3 using css background-position.
*/

        /* Carousel 100% Fullscreen */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .carousel,
        .item,
        .active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }

        .carousel {
            margin-bottom: 60px;
        }

        .carousel-caption {
            z-index: 10;
        }

        .carousel .item {
            background-color: #777;
        }

        .carousel .carousel-inner .bg {
            background-repeat: no-repeat;
            background-size: cover;
        }

        .carousel .carousel-inner .bg1 {
            background-image: url('{{ asset('assets/images/bg1.png') }}');
            background-position: center top;
        }

        .carousel .carousel-inner .bg2 {
            background-image: url('{{ asset('assets/images/bg2.png') }}');
            background-position: center center;
        }

        .carousel .carousel-inner .bg3 {
            background-image: url('{{ asset('assets/images/bg3.png') }}');
            background-position: center bottom;
        }

    </style>

</head>



<body>

    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-sm-12 col-md-6 hidden-md-down " id="yellow">

                <img src="{{ asset('assets/images/csul.png') }}" class="mb-3" width="300px" height="110px" alt="">
                <h3>HRServices Application Login
                </h3>
                <p class="mt-3">
                    HR Services Application is created to manage all processes related to HR Department
                </p>
                <form method="POST" action="{{ route('login') }}" class="mt-5">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8 text-right mt-2">
                            <div class="forgot-password">

                            </div>
                            <button class="btn btn-transparent green btn-outline" type="submit"><i
                                    class="fa fa-lock"></i>&nbsp;&nbsp;Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-12" id="image" style="padding: 0px">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="item bg bg1 active"></div>
                        </div>
                        <div class="carousel-item">
                            <div class="item bg bg2 "></div>
                        </div>
                        <div class="carousel-item">
                            <div class="item bg bg3 "></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</body>

</html>

@section('content')

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
