@extends('admin.admin_dashboard')

@section('title', 'All News Post')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All News Post</h1>
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
                            <h3 class="card-title">All News Post</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th class="text-center">Activate</th>
                                    <th class="text-center col-md-2">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($all_news_post as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ (!empty($item->image)) ? url($item->image) : url('upload/no_image.png') }}" alt="{{ $item->image }}"></td>
                                            <td>{{ Str::limit($item->news_title, 20) }}</td>
                                            <td>{{ $item['category']['category_name'] }}</td>
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->post_date)->diffForHumans() }}</td>
                                            <td class="text-center">
                                                @if($item->status == 1)
                                                    <span class="badge bg-success"><i class="far fa-smile"></i> Active</span>
                                                @else
                                                    <span class="badge bg-danger"><i class="far fa-times-circle"></i> Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->status == 1)
                                                    <a href="{{ route('inactive.admin.user', $item->id) }}" class="btn btn-dark btn-xs" title="Inactive"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                    <a href="{{ route('active.admin.user', $item->id) }}" class="btn btn-success btn-xs" title="Active"><i class="fas fa-thumbs-up"></i></a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('edit.news.post', $item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                                <a href="{{ route('delete.news.post', $item->id) }}" class="btn btn-danger btn-xs" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                       <td colspan="9">All Admins: {{ count($all_news_post) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.news.post') }}" class="btn btn-primary">Add News Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
