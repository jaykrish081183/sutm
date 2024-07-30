@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="shape-bg">
        <div class="login-logo">
            <img src="{{ asset('images/login-logo.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7 mx-auto">
                    <div class="loginbg">
                        <h2>Authorize Login</h2>
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{asset('images/lock.png')}}" alt="">
                            </div>
                            <div class="col">
                                <div class="ps-4 authorize-login">
                                    <h3>Check your email</h3>
                                    <p>We sent an email with login instructions the email you logged in with</p>
                                    <h3>Didn’t get the email?</h3>
                                    <p>Send an SMS text verification instead.</p>
                                    <form action="{{route('VerifyAuthorizeCode')}}" method="post">
                                        <input type="hidden" name="email" value="{{isset($email)?$email:''}}">
                                        <input type="hidden" name="password" value="{{isset($password)?$password:''}}">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" name="verify_code" id="verify_code"
                                            style="background-color: rgb(172, 204, 194)" class="form-control">
                                            @if(isset($error))
                                                <span class="text-danger">{{$error}}</span>
                                            @endif
                                        </div>
                                        <button type="submit"  class="btn btn-primary text-uppercase">Verify Code</button>
                                        <a href="javascript:void(0)" class="btn btn-primary text-uppercase">Send Text</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="loginfooter-text">
                            Having issues signing into your account? Please <a href="javascript:void(0)">contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
