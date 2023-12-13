@extends('layouts.app')
@section('title','Login')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('images/logoe-tas.png')}}" style="width: 300%" alt="IMG">
            </div>

            <div class="login100-form validate-form">
                <span class="login100-form-title">
                    <span class="login100-form-title">
                        User Login
                    </span>
                </span>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">


                        <input id="email" type="email"
                            class="form-control input100 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail">
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
                            class="form-control input100 @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Password">
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


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>


                </form>
                @guest
                <div class="text-center p-t-136">
                    @if (Route::has('register'))
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                    @endif
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
