@extends('admin.admin_dashboard')

@section('title', 'Edit Admin')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Admin</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header py-3">
                            <h3 class="card-title">Edit Admin</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.admin', $admin->id) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="role">Assign Roles</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                        <option selected disabled>- Select Role -</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $admin->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ $admin->username }}">
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $admin->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $admin->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
