@extends('frontend.home_dashboard')

@section('title', 'Change Password')

@section('home')
    <div class="container flex-grow">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="text-center">
                    <img src="{{ (!empty($user_data->photo)) ? url('upload/user_images/'.$user_data->photo) : url('upload/no_image.png') }}" class="img-fluid mb-3" alt="{{ $user_data->name }}">
                    <h3>{{ $user_data->name }}</h3>
                    <p>{{ $user_data->email }}</p>
                </div>

                <ul class="list-group mb-3">
                    <li class="list-group-item"><a href="{{ route('dashboard') }}"><i class="fas fa-user-edit"></i> My Profile</a></li>
                    <li class="list-group-item"><a href="{{ route('user.change.password') }}"><i class="fas fa-key"></i> Change Password</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-bookmark"></i> Read Later List</a></li>
                    <li class="list-group-item"><a href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        User Change Password
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.update.password') }}">
                            @csrf

                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old_password">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
                            </div>
                            <button class="btn btn-primary" type="submit">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
