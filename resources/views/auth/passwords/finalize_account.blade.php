@extends('layouts.app')
@section('title', 'Login')
@section('content')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<div class="shape-bg">
    <div class="login-logo">
        <img src="{{asset('images/login-logo.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row mb-5">
           <div class="col-md-7 mx-auto">
              <div class="loginbg">
                 <h2>Finalize Your Account</h2>
                <form method="POST" action="{{ route('ResetPasswordPost') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{isset($email)?$email:''}}">
                    <div class="mb-4 mt-4">
                        <p style="font-size: 18px;color:#62676c">To finalize your new Corrazco account, you will need to create a password.</p>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors as $error)
                                {{$error}}<br/>
                            @endforeach
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input id="password" type="password" class="form-control" name="password" value="{{old('password')}}" required autocomplete="current-password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" required autocomplete="current-password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-uppercase">
                            {{__('Save Changes')}}
                        </button>
                    </div>
                </form>
              </div>
           </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center" style="margin-top:150px;">
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
</div> --}}
@endsection
@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function() { $("div.alert").hide(); }, 3000);
        })
    </script>
@endsection
