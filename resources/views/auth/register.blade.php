@extends('frontend.home_dashboard')

@section('home')
    <div class="container flex-grow">
        <div class="mt-4">
            <div class="card">
                <div class="card-header text-center">Register</div>
                <div class="card-body">
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button class="btn btn-primary" type="submit">Register</button>
                        <a href="{{ route('login') }}" class="btn btn-dark">Already have account?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


