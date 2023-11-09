@php
    $current_date = new DateTime();
    $breaking_news = \App\Models\NewsPost::where('status', 1)->where('breaking_news', 1)->limit(7)->get();
@endphp

<div class="bg-light text-white text-center py-1 mb-3 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3">
                <div class="text-dark pt-1">
                    <small>
                        <i class="far fa-calendar-alt"></i>
                        {{ $current_date->format('l d-m-Y') }}
                    </small>
                </div>
            </div>
            <div class="col-lg-10 col-md-9">
                <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()" class="marquee">
                    @foreach($breaking_news as $item)
                        <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                            <img src="{{ asset('frontend/assets/dist/img/favicon.png') }}" alt="{{ $item->news_title }}" title="{{ $item->news_title }}" width="16px">
                            {{ $item->news_title }}
                        </a>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div>
