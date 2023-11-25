@extends('admin.admin_dashboard')

@section('title', 'Edit Profile')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Profile</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ (!empty($admin_data->photo)) ? url('upload/admin_images/'.$admin_data->photo) : url('upload/no_image.png') }}" alt="{{ $admin_data->name }}">
                            </div>

                            <h3 class="profile-username text-center mb-3">{{ $admin_data->name }}</h3>
                            <p class="text-muted text-center">@ {{ $admin_data->username }}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Full Name:</b> <a class="float-right">{{ $admin_data->name }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone:</b> <a class="float-right">{{ $admin_data->phone }}</a>
                                </li>
                                <li class="list-group-item border-bottom-0">
                                    <b>E-Mail:</b> <a class="float-right">{{ $admin_data->email }}</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header py-3">
                            <h3 class="card-title">Personal Info</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" name="name" id="full_name" class="form-control" value="{{ $admin_data->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" value="{{ $admin_data->username }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">E-Mail</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $admin_data->email }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" value="{{ $admin_data->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <img class="profile-user-img img-fluid img-square mb-2" id="show_image" src="{{ (!empty($admin_data->photo)) ? url('upload/admin_images/'.$admin_data->photo) : url('upload/no_image.png') }}" alt="profile picture">
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="photo">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // Update Image
        $(document).ready(function() {
           $('#image').change(function (e) {
               let reader = new FileReader();
               reader.onload = function (e) {
                   $('#show_image').attr('src', e.target.result);
               }
               reader.readAsDataURL(e.target.files['0']);
           })
        });
    </script>
@endsection
