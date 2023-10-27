@extends('frontend.home_dashboard')

@section('home')
    <div class="container flex-grow">
        <div class="mt-4">
            <div class="card">
                <div class="card-header text-center">Login</div>
                <div class="card-body">
                    <form class="mt-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button class="btn btn-primary" type="submit">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-dark">
                            <i class="mdi mdi-account-circle"></i> Create an account
                        </a>
                        <a href="{{ route('password.request') }}" class="btn btn-dark">
                            <i class="mdi mdi-lock"></i> Forgot your password?
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
