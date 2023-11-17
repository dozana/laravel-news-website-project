@extends('admin.admin_dashboard')

@section('title', 'Edit Roles In Permission')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Roles In Permission</h1>
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
                            <h3 class="card-title">Edit Roles In Permission</h3>
                        </div>
                        <div class="card-body table-responsive">

                            <form method="post" action="{{ route('role.permission.update', $role->id) }}">
                                @csrf

                                <!-- Select All Roles -->
                                <div class="form-group">
                                    <label for="role_id">All Roles</label>
                                    <p>User Role: <code>{{ $role->name }}</code></p>
                                </div>

                                <hr>

                                <!-- Select All Permissions Checkbox -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="all_permissions" id="all_permissions" value="">
                                    <label class="form-check-label text-capitalize" for="all_permissions">Permission All</label>
                                </div>

                                <hr class="mb-4">

                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            @php
                                                $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                                                $role_has_permissions = App\Models\User::roleHasPermissions($role, $permissions);
                                            @endphp
                                            <!-- Group Names -->
                                            <div class="form-check">
                                                <input type="checkbox" value="" id="customcheck1"  class="form-check-input" {{ $role_has_permissions ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize" for="customcheck1">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="col-9">

                                            <div class="card">
                                                <div class="card-header bg-success">Permissions</div>
                                                <div class="card-body">
                                                    @foreach($permissions as $permission)
                                                        <div class="form-check">
                                                            <input name="permission[]"
                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                                type="checkbox"
                                                                value="{{ $permission->id }}"
                                                                id="customcheck_{{ $permission->id }}"
                                                                class="form-check-input">
                                                            <label class="form-check-label" for="customcheck_{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary">Update</button>
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
