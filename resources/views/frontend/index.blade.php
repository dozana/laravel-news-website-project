@extends('frontend.home_dashboard')

@section('home')
    <div class="container flex-grow">

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @php
                            $news_slider = \App\Models\NewsPost::where('status', 1)->where('top_slider', 1)->limit(3)->get();
                        @endphp
                        <div id="carouselExampleCaptions" class="carousel slide mb-4">
                            <div class="carousel-indicators">
                                @foreach($news_slider as $key => $slider)
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $key }}" @if($key === 0) class="active" @endif aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($news_slider as $key => $slider)
                                    <div class="carousel-item @if($key === 0) active @endif">
                                        <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>
                                                <a href="{{ url('/news/details/'.$slider->id.'/'.$slider->news_title_slug) }}" class="bg-dark text-white">
                                                    {{ $slider->news_title }} - {{ $slider->created_at->format('M d Y') }}
                                                </a>

                                            </h5>
                                            <p>Some representative placeholder content for the slide.</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        @php
                            $section_three = \App\Models\NewsPost::where('status', 1)->where('first_section_three', 1)->limit(3)->get();
                        @endphp
                        <table class="table table-bordered">
                            <tbody>
                            @foreach($section_three as $three)
                                <tr>
                                    <td class="align-middle text-center">
                                        <a href="{{ url('/news/details/'.$three->id.'/'.$three->news_title_slug) }}">
                                            <img style="width: 80px; height: 40px;" class="img-fluid" src="{{ asset($three->image) }}" alt="{{ $three->news_title }}">
                                        </a>
                                    </td>
                                    <td class="align-middle"><a href="{{ url('/news/details/'.$three->id.'/'.$three->news_title_slug) }}">{{ $three->news_title }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    @php
                        $section_nine = \App\Models\NewsPost::where('status', 1)->where('first_section_nine', 1)->limit(9)->get();
                    @endphp
                    @foreach($section_nine as $nine)
                        <div class="col-lg-4 col-md-4">
                            <div class="card mb-3">
                                <div class="card-header p-0">
                                    <a href="{{ url('/news/details/'.$nine->id.'/'.$nine->news_title_slug) }}">
                                        <img class="img-fluid" src="{{ asset($nine->image) }}" alt="{{ $nine->news_title }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5><a href="{{ url('/news/details/'.$nine->id.'/'.$nine->news_title_slug) }}">{{ $nine->news_title }}</a></h5>
                                    <small><i class="far fa-calendar-alt"></i> {{ $nine->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card mb-4">
                    <div class="card-header">Live Stream</div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/320x220" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Old News</div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>

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

    </div>
@endsection
