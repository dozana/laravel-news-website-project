@extends('admin.admin_dashboard')

@section('title', 'Edit Live TV')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Live TV</h1>
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
                            <h3 class="card-title">Edit Live TV</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.live.tv', $live->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <img width="120" class="img-fluid d-block mb-2" id="show_image" src="{{ (!empty($live->live_image)) ? asset($live->live_image) : url('upload/no_image.png') }}" alt="">
                                    <label for="live_image">Live Image</label>
                                    <input type="file" class="form-control-file @error('live_image') is-invalid @enderror" name="live_image" id="live_image">
                                    @error('live_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="live_url">Live URL</label>
                                    <input type="text" class="form-control @error('live_url') is-invalid @enderror" name="live_url" id="live_url" value="{{ $live->live_url }}">
                                    @error('live_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

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
        // Update Image
        $(document).ready(function() {
            $('#image').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
