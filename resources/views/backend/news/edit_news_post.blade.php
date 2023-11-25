@extends('admin.admin_dashboard')

@section('title', 'Edit Post')

@section('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- selectize -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
@endsection

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Edit Post</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{ route('update.news.post', $news_post->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-4">

                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Post Details</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="category_id">Select Category</label>
                                    <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror">
                                        <option selected>- Select Category -</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $news_post->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_id">Select Subcategory</label>
                                    <select name="subcategory_id" class="custom-select @error('subcategory_id') is-invalid @enderror">
                                        @if($news_post->subcategory_id == NULL)
                                            <option value="">Subcategory doesn't exists</option>
                                        @else
                                            <option disabled>- Select Subcategory -</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $news_post->subcategory_id ? 'selected' : '' }}>
                                                    {{ $subcategory->subcategory_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Select Writer</label>
                                    <select name="user_id" class="custom-select @error('category_id') is-invalid @enderror">
                                        <option selected>- Select Writer -</option>
                                        @foreach($admin_user as $user)
                                            <option value="{{ $user->id }}" {{ $user->id == $news_post->user_id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <img class="profile-user-img img-fluid img-square mb-2" id="show_image" src="{{ asset($news_post->image) }}" alt="">
                                    <div class="form-group">
                                        <label for="show_image">Select Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="view_section">View Section</label>
                                    <div class="form-group mb-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="breaking_news" id="breaking_news" value="1" {{ $news_post->breaking_news == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="breaking_news">Breaking News</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="top_slider" id="top_slider" value="1" {{ $news_post->top_slider == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="top_slider">Top Slider</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="first_section_three" id="first_section_three" value="1" {{ $news_post->first_section_three == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="first_section_three">First Section Three</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="first_section_nine" id="first_section_nine" value="1" {{ $news_post->first_section_nine == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="first_section_nine">First Section Nine</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="tags">Select Tags</label>
                                    <input type="text" class="selectize @error('selectize') is-invalid @enderror" name="tags" id="tags" value="{{ $news_post->tags }}">
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header py-3">
                                <h3 class="card-title">Post Content</h3>
                                <button type="submit" class="btn btn-primary btn-xs btn-flat float-sm-right">Update</button>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="news_title">Post Title</label>
                                    <input type="text" class="form-control @error('news_title') is-invalid @enderror" name="news_title" id="news_title" value="{{ $news_post->news_title }}">
                                    @error('news_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <label for="news_details">Post Details</label>
                                    <textarea class="form-control summernote @error('news_title') is-invalid @enderror" name="news_details">{{ $news_post->news_details }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

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

    <!-- Selectize -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script>
        $(".selectize").selectize({
            delimiter: ",",
            persist: false,
            maxItems: null,
            create: function (input) {
                return {
                    value: input,
                    text: input,
                };
            }
        });
    </script>

    <!-- Summernote -->
    <script src="{{ asset('backend/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            $('.summernote').summernote();
        });
    </script>

    <script>
        // Dependent Menu
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function () {
                let category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="subcategory_id]').html('');
                            let d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">'+ value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('Danger');
                }
            });
        });
    </script>

@endsection
