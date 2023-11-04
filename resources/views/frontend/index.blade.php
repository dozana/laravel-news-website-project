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
                                            <h5>{{ $slider->news_title }} {{ $slider->created_at->format('M d Y') }}</h5>
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
                                    <td class="text-center"><img width="80" src="{{ asset($three->image) }}" class="img-fluid" alt=""></td>
                                    <td>{{ $three->news_title }}</td>
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
                                <div class="card-body">
                                    <img class="img-fluid mb-4" src="{{ asset($nine->image) }}" alt="">
                                    <h5>{{ $nine->news_title }}</h5>
                                    <small><i class="far fa-calendar-alt"></i> {{ $nine->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card mb-4">
                    <div class="card-header">Live</div>
                    <div class="card-body">
                        ...
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Old News</div>
                    <div class="card-body">

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                        </div>

                        <nav class="nav nav-pills flex-column flex-sm-row mb-4">
                            <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Latest</a>
                            <a class="flex-sm-fill text-sm-center nav-link" href="#">Popular</a>
                        </nav>

                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td><img src="https://place-hold.it/50x50" class="img-fluid" alt=""></td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td><img src="https://place-hold.it/50x50" class="img-fluid" alt=""></td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <td><img src="https://place-hold.it/50x50" class="img-fluid" alt=""></td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
