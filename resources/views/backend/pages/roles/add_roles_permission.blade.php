@extends('admin.admin_dashboard')

@section('title', 'Add Roles In Permission')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Roles in Permission</h1>
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
                            <form method="post" action="{{ route('store.role.permission') }}">
                                @csrf

                                <!-- Select All Roles -->
                                <div class="form-group">
                                    <label for="role_id">All Roles</label>
                                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="role_id">
                                        <option selected disabled>- Select Role -</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Select All Permissions Checkbox -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="all_permissions" id="all_permissions" value="">
                                    <label class="form-check-label text-capitalize" for="all_permissions">Permission All</label>
                                </div>

                                <hr class="mb-4">

                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <!-- Group Names -->
                                            <div class="form-check">
                                                <input type="checkbox" id="" class="form-check-input">
                                                <label class="form-check-label text-capitalize" for="">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                            @endphp
                                            <div class="card">
                                                <div class="card-header bg-success">Permissions</div>
                                                <div class="card-body">
                                                    @foreach($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}" class="form-check-input">
                                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

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
