@extends('layouts.app')
@section('title', 'Home')
@section('content')
        <!--Loading Area Start-->
        <div class="loading">
    		<div class="text-center middle">
    			<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    		</div>
    	</div>
        <!--Loading Area End-->
        <!--Main Wrapper Start-->
        <div class="as-mainwrapper">
            <!--Bg White Start-->
            <div class="bg-white">

                <!--Login Register Area Strat-->
                <div class="login-register-area pt-100 pb-70">
                    <div class="container">
                        <div class="row">
                            <!--Login Form Start-->
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="customer-login-register">
                                    <div class="form-login-title" style="text-align: center;">
                                        <h2>Admin Login </h2>

                                    </div>
                                    @if (session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if (session('error-msg'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error-msg') }}
                                        </div>
                                    @endif
                                    <div class="login-form">
                                        <form action="{{route('admin.loginPost')}}" method="post" style="text-align: center;">
                                            @csrf
                                            <div class="form-fild">
                                                <p><label>Email address <span class="required">*</span></label></p>
                                                <input name="email" value="" type="text" style="text-align: center;">
                                            </div>
                                            <div class="form-fild">
                                                <p><label>Password <span class="required">*</span></label></p>
                                                <input name="password" value="" type="password" style="text-align: center;">
                                            </div>
                                            <div class="login-submit">
                                                <button type="submit" class="button-default">Login</button>
                                                <a href="{{route('home')}}" class="button-default">Back</a>
                                            </div>
                                            <div class="lost-password">
                                                <a href="javascript:void(0)">Lost your password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <!--Login Form End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Bg White-->
        </div>
        <!--End of Main Wrapper Area-->
@endsection
