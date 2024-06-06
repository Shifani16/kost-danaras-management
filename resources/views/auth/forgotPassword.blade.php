@extends('layouts.app')
@section('content')
    <title>Forgot Password</title>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"></div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Forgot Password?</h1>
                            <p class="account-subtitle">Enter your email to reset password</p>
                            <form action="{{ route('password.checkEmail') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Confirm</button>
                                </div>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger mt-2">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success mt-2">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center dont-have">Remember your password? <a href="{{ route('login') }}">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
