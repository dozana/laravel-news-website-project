@extends('frontend.home_dashboard')

@php
    $news_slider = \App\Models\NewsPost::where('status', 1)->where('top_slider', 1)->limit(3)->get();
    $section_three = \App\Models\NewsPost::where('status', 1)->where('first_section_three', 1)->limit(3)->get();
    $section_nine = \App\Models\NewsPost::where('status', 1)->where('first_section_nine', 1)->limit(9)->get();
    $banner = App\Models\Banner::find(1);
    $photo_gallery = \App\Models\PhotoGallery::latest()->get();
    $video_gallery = \App\Models\VideoGallery::latest()->get();
    $live_tv = \App\Models\LiveTv::find(1);
    $news = App\Models\NewsPost::where('status', 1)->orderBy('id', 'ASC')->limit(8)->get();
    $categories = App\Models\Category::orderBy('id', 'ASC')->get();
@endphp

@section('title')
    Welcome
@endsection

@section('home')
    <div class="container flex-grow">

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @include('frontend.landing.slider', ['news_slider' => $news_slider])
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @include('frontend.landing.section_three', ['section_three' => $section_three])
                    </div>
                </div>
                @include('frontend.landing.banner_block_a', ['banner' => $banner])
                @include('frontend.landing.section_nine', ['section_nine' => $section_nine])
            </div>
            <div class="col-lg-4 col-md-4">
                @include('frontend.landing.live_tv', ['live_tv' => $live_tv])
                @include('frontend.landing.old_news')
                @include('frontend.landing.latest_and_popular_news', ['new_news_post' => $new_news_post, 'news_popular' => $news_popular])
            </div>
        </div>

        @include('frontend.landing.banner_block_b', ['banner' => $banner])

        <div class="row">
            <div class="col-lg-8 col-md-8">
                @include('frontend.landing.photo_gallery', ['photo_gallery' => $photo_gallery])
            </div>
            <div class="col-lg-4 col-md-4">
                @include('frontend.landing.video_gallery', ['video_gallery' => $video_gallery])
            </div>
        </div>

        @include('frontend.landing.news_tabs', ['categories' => $categories, 'news' => $news])

        @include('frontend.landing.news_section_n1')
        @include('frontend.landing.news_section_n2')
        @include('frontend.landing.news_section_n3')
        @include('frontend.landing.news_section_n4')

    </div>
@endsection


@section('scripts')
    <script>
        // Update Image
        $(document).ready(function() {
            // Pause YouTube video when modal is closed
            document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
                var youtubeIframe = document.getElementById('youtubeIframe');
                var src = youtubeIframe.src;
                youtubeIframe.src = '';
                youtubeIframe.src = src;
            });
        });
    </script>
@endsection
