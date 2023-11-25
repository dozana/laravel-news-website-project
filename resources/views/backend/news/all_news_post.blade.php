@extends('admin.admin_dashboard')

@section('title', 'All Posts')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">All Posts</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Posts</span>
                            <span class="info-box-number">{{ count($news_post) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Active Posts</span>
                            <span class="info-box-number">{{ count($active_news) }}</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inactive Posts</span>
                            <span class="info-box-number">{{ count($inactive_news) }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-bullhorn"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Breaking News</span>
                            <span class="info-box-number">{{ count($breaking_news) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Posts</h3>
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
                                    @forelse($news_post as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ (!empty($item->image)) ? url($item->image) : url('upload/no_image.png') }}" alt="{{ $item->image }}"></td>
                                            <td>{{ Str::limit($item->news_title, 20) }}</td>
                                            <td>{{ $item['category']['category_name'] }}</td>
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>
                                                <div>{{ \Carbon\Carbon::parse($item->post_date)->diffForHumans() }}</div>
                                                <div><small>{{ $item->post_date }}</small></div>
                                            </td>
                                            <td class="text-center">
                                                @if($item->status == 1)
                                                    <span class="badge bg-success"><i class="far fa-smile"></i> Active</span>
                                                @else
                                                    <span class="badge bg-danger"><i class="far fa-times-circle"></i> Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->status == 1)
                                                    <a href="{{ route('inactive.news.post', $item->id) }}" class="btn btn-dark btn-xs" title="Inactive"><i class="fas fa-thumbs-down"></i></a>
                                                @else
                                                    <a href="{{ route('active.news.post', $item->id) }}" class="btn btn-success btn-xs" title="Active"><i class="fas fa-thumbs-up"></i></a>
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
                                       <td colspan="9">All Admins: {{ count($news_post) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add.news.post') }}" class="btn btn-primary mb-3">Add News Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
