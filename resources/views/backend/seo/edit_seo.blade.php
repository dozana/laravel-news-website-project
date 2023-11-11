@extends('admin.admin_dashboard')

@section('title', 'Edit SEO')

@section('styles')
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
                    <h1 class="m-0">Edit SEO</h1>
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
                            <h3 class="card-title">Edit SEO</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('update.seo', $seo->id) }}">
                                @csrf

                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" id="meta_title" value="{{ $seo->meta_title }}" class="form-control @error('meta_title') is-invalid @enderror">
                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_author">Meta Author</label>
                                    <input type="text" name="meta_author" id="meta_author" value="{{ $seo->meta_author }}" class="form-control @error('meta_author') is-invalid @enderror">
                                    @error('meta_author')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <textarea name="meta_keywords" id="meta_keywords" rows="3" class="selectize @error('meta_keywords') is-invalid @enderror">{{ $seo->meta_keywords }}</textarea>
                                    @error('meta_keywords')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label for="meta_keywords">Meta Keywords</label>--}}
{{--                                    <input type="text" class="selectize @error('selectize') is-invalid @enderror" name="meta_keywords" id="meta_keywords" value="">--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="3" class="form-control @error('meta_description') is-invalid @enderror">{{ $seo->meta_description }}</textarea>
                                    @error('meta_description')
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
        <!-- Selectize -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

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
@endsection
