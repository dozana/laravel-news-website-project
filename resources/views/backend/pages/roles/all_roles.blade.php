@extends('admin.admin_dashboard')

@section('title', 'All Roles')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All Roles</h1>
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
                            <h3 class="card-title">All Roles</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-sm text-nowrap">
                                <thead>
                                <tr>
                                    <th class="col-md-1">#</th>
                                    <th class="col-md-3">Roles Name</th>
                                    <th class="col-md-2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($role as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('edit.role', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                            <a href="{{ route('delete.role', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No data available</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.role') }}" class="btn btn-primary mb-3">Add Role</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
