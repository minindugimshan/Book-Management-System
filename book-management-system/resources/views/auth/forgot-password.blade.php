@extends('layout')

@section('content')
    <h1>Forgot Password</h1>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
        <a href="{{ route('login') }}" class="btn btn-link">Back to Login</a>
    </form>
@endsection
