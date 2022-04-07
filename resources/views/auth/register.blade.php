@extends('layouts.app')

@section('content')
<div class="container" align="center" style="margin-top:120px;" >
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="col-12 col-md-12 col-lg-5 mb-4">
            <div class="input-group input-group-lg" > 
                <span class="input-group-text" style="background-color:#8E6A4A; height:50px;" id="name"><i class="fa-solid fa-user"></i></span>
                <input id="name" type="text" style="background-color:#3A4149; height:50px;" class="form-control @error('name') is-invalid @enderror text-light" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username"> 
                
                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 mb-4">
            <div class="input-group input-group-lg" > 
                <span class="input-group-text" style="background-color:#8E6A4A;" id="email"><i class="fa-solid fa-envelope"></i></span>
                <input id="email" type="email" style="background-color:#3A4149; height:50px;" class="form-control @error('email') is-invalid @enderror text-light" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 mb-4">
            <div class="input-group input-group-lg" > 
                <span class="input-group-text" style="background-color:#8E6A4A;" id="password"><i class="fa-solid fa-lock"></i></span>
                <input id="password" type="password" style="background-color:#3A4149; height:50px;" class="form-control @error('password') is-invalid @enderror text-light" name="password" required autocomplete="new-password" autofocus placeholder="Password">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-5 mb-5">
            <div class="input-group input-group-lg" > 
                <span class="input-group-text" style="background-color:#8E6A4A;" id="password-confirmation"><i class="fa-solid fa-lock"></i></span>
                <input id="password-confirm" type="password" style="background-color:#3A4149; height:50px;" class="form-control text-light" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="Confirm Password">
            </div>
        </div>
        <button type="submit"  class="btn btn-primary btn-lg" style="background-color:#8E6A4A; height:43px; width: 100px;">SIGN UP</button>
    </form>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
         </div>
        </div>
    </div>
</div> -->
@endsection
