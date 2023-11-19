@extends('admin.admin_dashboard')

@section('title', 'All Admins')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All Admins</h1>
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
                            <h3 class="card-title">All Admins</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Phone</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Activate</th>
                                    <th class="text-center col-md-2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($admins as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/no_image.png') }}" alt="{{ $item->name }}"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td class="text-center">
                                                @if($item->status == 'active')
                                                    <span class="badge bg-success"><i class="far fa-smile"></i> Active</span>
                                                @else
                                                    <span class="badge bg-danger"><i class="far fa-times-circle"></i> Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($item->roles as $role)
                                                    <span class="badge bg-info">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @if($item->status == 'active')
                                                    <a href="{{ route('inactive.admin.user', $item->id) }}" class="btn btn-dark btn-xs" title="Inactive"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                    <a href="{{ route('active.admin.user', $item->id) }}" class="btn btn-success btn-xs" title="Active"><i class="fas fa-thumbs-up"></i></a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.admin', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="{{ route('delete.admin', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <td colspan="8">All Admins: {{ count($admins) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.admin') }}" class="btn btn-primary mb-3">Add Admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
