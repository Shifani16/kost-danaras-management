@extends('layouts.app')
@section('content')
<title>Login</title>
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"></div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control  @error('email') is-invalid @enderror" type="text" name="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <div class="text-center forgotpass">
                                <a href="{{ route('forgot-password') }}">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

