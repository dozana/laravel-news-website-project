@extends('admin.admin_dashboard')

@section('title', 'All Roles In Permission')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All Roles In Permission</h1>
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
                            <h3 class="card-title">All Roles In Permission</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-sm">
                                <thead>
                                <tr>
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-2">Roles Name</th>
                                    <th class="col-md-7">Permissions</th>
                                    <th class="col-md-2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($roles as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @foreach($item->permissions as $permission)
                                                <span class="badge bg-info">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.role', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="{{ route('delete.role', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No data available</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
