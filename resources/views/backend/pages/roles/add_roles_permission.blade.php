@extends('admin.admin_dashboard')

@section('title', 'Add Roles In Permission')

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
                            <h3 class="card-title">Add Roles In Permission</h3>
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

                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" name="all_permissions" id="all_permissions">
                                    <label class="form-check-label text-capitalize" for="all_permissions">Permission All</label>
                                </div>

                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="">
                                                <label class="form-check-label text-capitalize" for="">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                            @endphp
                                            <div class="card">
                                                <div class="card-body">
                                                    @foreach($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="">
                                                            <label class="form-check-label" for="">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
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

@section('scripts')
    <script>
        $('#all_permissions').click(function () {
           if($(this).is(':checked')) {
               $('input[type=checkbox]').prop('checked', true);
           } else {
               $('input[type=checkbox]').prop('checked', false);
           }
        });
    </script>
@endsection
