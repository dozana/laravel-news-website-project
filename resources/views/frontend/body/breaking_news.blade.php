@php
    $breaking_news = \App\Models\NewsPost::where('status', 1)->where('breaking_news', 1)->limit(7)->get();
@endphp

<div class="bg-light text-white text-center py-1 mb-3 border-bottom">
    <div class="container marquee">
        <marquee direction="left" scrollamount="5px" onmouseover="this.stop()" onmouseout="this.start()">
            @foreach($breaking_news as $item)
                <a href="#">
                    <img src="{{ asset('frontend/assets/dist/img/favicon.png') }}" alt="Logo" title="Logo" width="16px">
                    {{ $item->news_title }}
                </a>
            @endforeach
        </marquee>
    </div>
</div>
