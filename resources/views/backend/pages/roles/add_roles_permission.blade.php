@extends('admin.admin_dashboard')

@section('title', 'Add Role')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Role Permissions Manager</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Role</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <form method="post" action="{{ route('store.role') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="group_name">All Roles Permissions Manager</label>
                                    <select class="form-control @error('group_name') is-invalid @enderror" name="group_name" id="group_name">
                                        <option selected disabled>- Select Role -</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('group_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Primary</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="group_name">Group Name</label>
                                    <select class="form-control @error('group_name') is-invalid @enderror" name="group_name" id="group_name">
                                        <option selected disabled>- Select Category -</option>
                                        <option value="category">Category</option>
                                        <option value="subcategory">SubCategory</option>
                                    </select>
                                    @error('group_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
