@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<div class="shape-bg">
    <div class="login-logo">
        <img src="{{asset('images/login-logo.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row mb-5">
           <div class="col-md-7 mx-auto">
              <div class="loginbg mb-4">
                {{-- <span style="font-size:36px;color: #42617a">Forgot Password ?</span> --}}
                <h2>Forgot Password ?</h2>
                @if (session('error-message'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error-message') }}
                    </div>
                @endif
                @if (session('success-msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success-msg') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('ForgetPasswordPost')}} {{-- {{ route('password.email') }} --}}">
                    @csrf
                    <div class="mb-4 mt-4">
                        <p style="font-size: 18px;color:#62676c">To Reset your Password, enter your account email address below. You will receive an email with instructions to reset your password.</p>
                    </div>
                    <div class="mb-3 mt-4">
                        <label class="form-label" style="font-size: 18px;color:#62676c">Email address</label>
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-4">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        <a href="{{route('login')}}" class="btn btn-primary text-uppercase">Back</a>
                    </div>
                </form>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection
