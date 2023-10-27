@extends('frontend.home_dashboard')

@section('title', 'My Profile')

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
                    <li class="list-group-item"><a href="#"><i class="fas fa-user-edit"></i> My Profile</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-key"></i> Change Password</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-bookmark"></i> Read Later List</a></li>
                    <li class="list-group-item"><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        User Account
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user_data->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{ $user_data->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user_data->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $user_data->phone }}">
                            </div>
                            <div class="mb-3">
                                <img class="img-fluid mb-2" id="show_image" width="80" src="{{ (!empty($user_data->photo)) ? url('upload/user_images/'.$user_data->photo) : url('upload/no_image.png') }}" alt="{{ $user_data->name }}">
                                <div class="form-group">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Update Image
        $(document).ready(function() {
            $('#photo').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
