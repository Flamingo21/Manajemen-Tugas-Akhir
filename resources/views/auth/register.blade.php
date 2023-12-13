@extends('layouts.app')
@section('title','Register')

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
                        Register
                    </span>
                </span>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate="Masukkan nama anda disini">

                        <input id="name" type="text" class="form-control input100 @error('name') is-invalid @enderror" placeholder="Nama"
                            name="name" value="{{ old('name') }}"  required autocomplete="name" autofocus >

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span>

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="E-mail diperlukan">

                        <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail">

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

                    <div class="wrap-input100 validate-input" data-validate="Masukkan PIN anda disini">

                        <input id="pin" type="text" class="form-control input100 @error('pin') is-invalid @enderror" placeholder="PIN"
                            name="pin" value="{{ old('pin') }}"  required autocomplete="pin" autofocus >

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            @error('pin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </span>

                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password diperlukan">

                        <input id="password" type="password"
                            class="form-control input100 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Input Password">

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



                    <div class="wrap-input100 validate-input" data-validate="Password diperlukan">

                        <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Konfirmasi Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>


                        </span>

                    </div>

                    <input id="status" type="hidden" class="form-control" name="status" required autocomplete="status" value="siswa">



                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Register') }}
                        </button>
                    </div>


                </form>
                @guest
                <div class="text-center p-t-136">
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('login') }}">
                        Already have an account?
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
