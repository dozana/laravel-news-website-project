@extends('admin.admin_dashboard')

@section('title', 'Edit Photo')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Photo</h1>
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
                            <h3 class="card-title">Edit Photo</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.photo.gallery', $photo_gallery->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <img src="{{ asset($photo_gallery->photo_gallery) }}" class="d-block mb-3" width="100" alt="">
                                    <label for="multi_image">Choose Photos</label>
                                    <input type="file" class="form-control-file @error('multi_image') is-invalid @enderror" name="multi_image" id="multi_image" multiple>
                                    @error('multi_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
