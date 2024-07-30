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
              <div class="loginbg">
                <span style="font-size: 42px;color:#62676c">Reset Password</span>
                <form method="POST" action="{{route('ResetPasswordPost')}}">
                    @csrf
                    <input type="hidden" name="token" value="{{isset($token)?$token:"";}}">
                    <input type="hidden" id="email" name="email" value="{{isset($email)?$email:''}}">
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors as $error)
                                {{$error}}<br/>
                            @endforeach
                        </div>
                    @endif
                    <div class="mt-4 mb-3">
                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-uppercase">
                            {{ __('Reset Password') }}
                        </button>
                     </div>
                </form>
              </div>
           </div>
        </div>
    </div>
</div>
@endsection
