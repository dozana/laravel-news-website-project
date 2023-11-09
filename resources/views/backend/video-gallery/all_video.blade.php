@extends('admin.admin_dashboard')

@section('title', 'Video Gallery')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Video Gallery</h1>
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
                            <h3 class="card-title">All Video Gallery</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Date</th>
                                        <th class="text-center col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($video as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ (!empty($item->video_image)) ? url($item->video_image) : url('upload/no_image.png') }}" alt="{{ $item->video_title }}"></td>
                                            <td>{{ $item->video_title }}</td>
                                            <td>{{ $item->video_url }}</td>
                                            <td>{{ $item->post_date }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.video.gallery', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="{{ route('delete.video.gallery', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6">All Videos: {{ count($video) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.video.gallery') }}" class="btn btn-primary mb-3">Add New Video</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
