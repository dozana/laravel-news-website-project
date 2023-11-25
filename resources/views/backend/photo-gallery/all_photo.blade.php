@extends('admin.admin_dashboard')

@section('title', 'All Photos')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All Photos</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">All Photos</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th class="text-center col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($photo as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ (!empty($item->photo_gallery)) ? url($item->photo_gallery) : url('upload/no_image.png') }}" alt="{{ $item->image }}"></td>
                                            <td>{{ $item->post_date }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.photo.gallery', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="{{ route('delete.photo.gallery', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">All Photos: {{ count($photo) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.photo.gallery') }}" class="btn btn-primary btn-sm mb-3">New</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
