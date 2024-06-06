@extends('layouts.app')
@section('content')
    <title>Reset Password</title>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left"></div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Reset Password</h1>
                            <form action="{{ route('password.reset') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" required>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
