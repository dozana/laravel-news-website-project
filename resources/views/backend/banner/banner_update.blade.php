@extends('admin.admin_dashboard')

@section('title', 'Edit Banners')

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Banners</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header py-3">
                            <h3 class="card-title">Edit Banners</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.banner', $banner->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_1">Home Banner One</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image_1" name="home_one">
                                                    <label class="custom-file-label" for="image_1">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_1">Home Banner One</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="show_image_1" src="{{ (!empty($banner->home_one)) ? url($banner->home_one) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_2">Home Banner Two</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image_2" name="home_two">
                                                    <label class="custom-file-label" for="image_2">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_2">Home Banner Two</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="show_image_2" src="{{ (!empty($banner->home_two)) ? url($banner->home_two) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_3">Home Banner Three</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image_3') is-invalid @enderror" id="image_3" name="home_three">
                                                    <label class="custom-file-label" for="image_3">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_3">Home Banner Three</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="show_image_3" src="{{ (!empty($banner->home_three)) ? url($banner->home_three) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_4">Home Banner Four</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image_4" name="home_four">
                                                    <label class="custom-file-label" for="image_4">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="show_image_4">Home Banner Four</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="show_image_4" src="{{ (!empty($banner->home_four)) ? url($banner->home_four) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="news_category_one">News Category Banner</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image_5" name="news_category_one">
                                                    <label class="custom-file-label" for="image_5">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="news_category_one">News Category Banner</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="news_category_one" src="{{ (!empty($banner->news_category_one)) ? url($banner->news_category_one) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="news_details_one">News Details Banner</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image_6" name="news_details_one">
                                                    <label class="custom-file-label" for="image_6">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="news_details_one">News Details Banner</label>
                                            <img class="profile-user-img img-fluid img-square mb-2" id="news_details_one" src="{{ (!empty($banner->news_details_one)) ? url($banner->news_details_one) : url('upload/no_image.png') }}" alt="" style="width: 400px; height: 60px;">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mb-3">Update</button>
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
            $('#image_1').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image_1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image_2').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image_2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image_3').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image_3').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image_4').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image_4').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image_5').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#news_category_one').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#image_6').change(function (e) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#news_details_one').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

