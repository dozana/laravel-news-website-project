@extends('admin.admin_dashboard')

@section('title', 'Add Video')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Add Video</h1>
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
                            <h3 class="card-title">Add Video</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('store.video.gallery') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <img width="120" class="img-fluid d-block mb-2" id="show_image" src="{{ (!empty($admin_data->photo)) ? url('upload/admin_images/'.$admin_data->photo) : url('upload/no_image.png') }}" alt="">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url">
                                    @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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
