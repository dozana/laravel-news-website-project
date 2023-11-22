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
