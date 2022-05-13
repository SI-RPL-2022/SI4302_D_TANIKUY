@extends('layouts.app')

@section('content')
        <div class="container" align="center" style="margin-top:200px;" >
        <form method="POST" action="{{ route('login') }}">
                        @csrf
            <div class="col-12 col-md-12 col-lg-5 mb-4">
                <div class="input-group input-group-lg" > 
                    <span class="input-group-text" style="background-color:#8E6A4A;" id="inputGroup-sizing-lg"><i class="fa-solid fa-user" ></i></span>
                    <input id="email" type="email" style="background-color:#3A4149; height:50px;" class="form-control @error('email') is-invalid @enderror text-light" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 mb-5">
                <div class="input-group input-group-lg" > 
                    <span class="input-group-text" style="background-color:#8E6A4A;" id="inputGroup-sizing-lg"><i class="fa-solid fa-lock"></i></span>
                    <input id="password" type="password" style="background-color:#3A4149; height:50px;" class="form-control @error('password') is-invalid @enderror text-light" name="password" required autocomplete="current-password" placeholder="Password" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" style="background-color:#8E6A4A; height:43px; width: 100px;">SIGN IN</button>
            <br>
            <p style="color:#84E13C; font-size: 15px; margin-top:15px;">
                Not a member? <a href="{{ url('register')}}">Sign up now</a>
            </p>
        </form>
        </div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
</div> -->
@endsection
