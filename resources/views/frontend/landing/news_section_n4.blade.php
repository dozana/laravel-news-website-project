<h3 class="mb-3">
    <a href="{{ url('news/category/'.$skip_category_6->id.'/'.$skip_category_6->category_slug) }}">
        {{ $skip_category_6->category_name }}
    </a>
</h3>

<div class="row">
    <div class="col-lg-5 col-md-5">
        @foreach($skip_news_6 as $item)
            @if($loop->index < 1)
                <div class="card mb-3">
                    <div class="card-header p-0">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                    </div>
                    <div class="card-body">
                        <h6><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h6>
                        {!! Str::limit($item->news_details, 150) !!}
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-lg-7 col-md-7">
        <div class="row">
            @foreach($skip_news_6 as $item)
                @if($loop->index > 0)
                    <div class="col-lg-6 col-md-6">
                        <div class="card mb-3">
                            <div class="card-header p-0">
                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                            </div>
                            <div class="card-body">
                                <h6><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h6>
                                {!! Str::limit($item->news_details, 150) !!}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
