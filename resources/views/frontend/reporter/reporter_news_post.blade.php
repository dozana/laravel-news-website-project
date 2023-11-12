@extends('frontend.home_dashboard')

@section('title')
    Reporter News Page
@endsection

@section('home')
    <div class="container flex-grow">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    @foreach($news as $item)
                        <div class="col-lg-4 col-md-4">
                            <div class="card mb-3">
                                <div class="card-header p-0">
                                    <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img class="img-fluid" src="{{ asset($item->image) }}" alt="{{ $item->news_title }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="mb-3"><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h6>
                                    <ul class="mb-0 list-unstyled">
                                        <li><i class="far fa-user"></i> {{ $item->user->name }}</li>
                                        <li><i class="far fa-calendar-alt"></i> {{ $item->created_at->format('l M d Y') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <img class="img-fluid mb-4" src="{{ (!empty($reporter->photo)) ? url('upload/admin_images/'.$reporter->photo) : url('upload/no_image.png') }}" alt="{{ $reporter->name }}">
                        <p>{{ $reporter->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
