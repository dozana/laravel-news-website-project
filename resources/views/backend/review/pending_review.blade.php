@extends('admin.admin_dashboard')

@section('title', 'Pending Reviews')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Pending Reviews</h1>
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
                            <h3 class="card-title">Pending Reviews</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>News</th>
                                        <th>User</th>
                                        <th>Comment</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($review as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img width="50" src="{{ asset($item['news']['image']) }}" alt="{{ $item['news']['news_title'] }}"></td>
                                            <td>{{ $item['news']['news_title'] }}</td>
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>{{ $item->comment }}</td>
                                            <td class="text-center">
                                                @if($item->status == 0)
                                                    <span class="badge bg-danger"><i class="far fa-times-circle"></i> Pending</span>
                                                @else
                                                    <span class="badge bg-success"><i class="far fa-smile"></i> Approve</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('review.approve', $item->id) }}" class="btn btn-primary btn-xs">Approve</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">Pending Reviews: {{ count($review) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/dist/js/code.js') }}"></script>
@endsection
