<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans') }}" rel="stylesheet">


    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}"
        rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link href="{{asset('images/logoe-tas.png')}}" rel="icon">

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="box-form">
        <div class="left">
            <div class="overlay">
                <h1>Administrasi <br> Skripsi</h1>
                <p>Selamat datang</p>

            </div>
        </div>


        <div class="right">
            <h5>Login</h5>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">


                    <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="E-Mail">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>

                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">

                    <input id="password" type="password"
                        class="form-control input100 @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>

                </div>
                <br>

                <div class="form-check">
                    <input style="display: none" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <br>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <p><a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a></p>
                    @endif
                </div>


            </form>

            <br>

        </div>

    </div>
    {{-- <!-- partial -->
    <!--===============================================================================================-->
    <script src="{{ asset('loglog/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loglog/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loglog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loglog/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loglog/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('loglog/js/main.js') }}"></script> --}}
</body>

</html>
