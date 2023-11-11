@extends('frontend.home_dashboard')

@section('title')
    {{ $breadcrumb_subcategory->subcategory_name }} - Technology
@endsection

@section('home')
    <div class="container flex-grow">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_subcategory->subcategory_name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-8 col-md-8">

                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        @foreach($news as $item)
                            @if($loop->index < 1)
                                <div class="card mb-4">
                                    <div class="card-header p-0 text-center">
                                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6>
                                            <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                {{ $item->news_title }}
                                            </a>
                                        </h6>

                                        <div class="mb-4">
                                            {!! $item->news_details !!}
                                        </div>

                                        <small>
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $item->created_at->format('l M d Y') }}
                                        </small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-4">
                        @foreach($news_two as $item)
                            @if($loop->index > 0)
                                <div class="card mb-4">
                                    <div class="card-header p-0 text-center">
                                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                            <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6>
                                            <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                {{ $item->news_title }}
                                            </a>
                                        </h6>

                                        <div class="mb-4">
{{--                                            {!! Str::limit($item->news_details) !!}--}}
                                            {!! $item->news_details !!}
                                        </div>

                                        <small>
                                            <i class="far fa-calendar-alt"></i>
                                            {{ $item->created_at->format('l M d Y') }}
                                        </small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Popular</a>
                    </li>
                </ul>
                <div class="tab-content mb-4">
                    <div class="tab-pane active" id="tab1">
                        <table class="table table-bordered mt-2 mb-0">
                            <tbody>
                            @foreach($new_news_post as $key => $news_item)
                                <tr>
                                    <td class="text-center align-middle bg-light">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ url('/news/details/'.$news_item->id.'/'.$news_item->news_title_slug) }}">
                                            <img style="width: 80px; height: 40px" class="img-fluid" src="{{ asset($news_item->image) }}" alt="{{ $news_item->news_title }}">
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('/news/details/'.$news_item->id.'/'.$news_item->news_title_slug) }}">
                                            {{ $news_item->news_title }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <table class="table table-bordered mt-2 mb-0">
                            <tbody>
                            @foreach($news_popular as $key => $popular_item)
                                <tr>
                                    <td class="text-center align-middle bg-light">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ url('/news/details/'.$popular_item->id.'/'.$popular_item->news_title_slug) }}">
                                            <img style="width: 80px; height: 40px" class="img-fluid" src="{{ asset($popular_item->image) }}" alt="{{ $popular_item->news_title }}">
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ url('/news/details/'.$popular_item->id.'/'.$popular_item->news_title_slug) }}">
                                            {{ $popular_item->news_title }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news as $item)
                @if($loop->index < 1)
                    <div class="col-lg-4 col-md-4">
                        <div class="card mb-3">
                            <div class="card-header p-0">
                                <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                    <img class="img-fluid" src="{{ asset($item->image) }}" alt="{{ $item->news_title }}">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h5>
                                <small><i class="far fa-calendar-alt"></i> {{ $item->created_at }}</small>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
