<div class="row">
    @foreach($skip_news_3 as $item)
        @if($loop->index < 1)
            <div class="col-lg-4 col-md-4">
                <h3 class="mb-3">
                    <a href="{{ url('news/category/'.$skip_category_3->id.'/'.$skip_category_3->category_slug) }}">
                        {{ $skip_category_3->category_name }}
                    </a>
                </h3>
                <div class="card mb-3">
                    <div class="card-header p-0">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                    </div>
                    <div class="card-body">
                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                    </div>
                </div>
                <table class="table table-sm table-bordered">
                    @foreach($skip_news_3 as $item)
                        @if($loop->index > 0)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" class="img-fluid" width="50" alt=""></td>
                                <td>
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        {{ $item->news_title }}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if(count($skip_news_3) > 0)
                        <tr>
                            <td colspan="2">
                                <a href="{{ url('news/category/'.$skip_category_3->id.'/'.$skip_category_3->category_slug) }}" class="btn btn-primary btn-sm">Read More</a>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        @endif
    @endforeach

    @foreach($skip_news_4 as $item)
        @if($loop->index < 1)
            <div class="col-lg-4 col-md-4">
                <h3 class="mb-3">
                    <a href="{{ url('news/category/'.$skip_category_4->id.'/'.$skip_category_4->category_slug) }}">
                        {{ $skip_category_4->category_name }}
                    </a>
                </h3>
                <div class="card mb-3">
                    <div class="card-header p-0">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                    </div>
                    <div class="card-body">
                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                    </div>
                </div>
                <table class="table table-sm table-bordered">
                    @foreach($skip_news_4 as $item)
                        @if($loop->index > 0)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" class="img-fluid" width="50" alt=""></td>
                                <td>
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        {{ $item->news_title }}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if(count($skip_news_4) > 0)
                        <tr>
                            <td colspan="2">
                                <a href="{{ url('news/category/'.$skip_category_4->id.'/'.$skip_category_4->category_slug) }}" class="btn btn-primary btn-sm">Read More</a>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        @endif
    @endforeach

    @foreach($skip_news_5 as $item)
        @if($loop->index < 1)
            <div class="col-lg-4 col-md-4">
                <h3 class="mb-3">
                    <a href="{{ url('news/category/'.$skip_category_5->id.'/'.$skip_category_5->category_slug) }}">
                        {{ $skip_category_5->category_name }}
                    </a>
                </h3>
                <div class="card mb-3">
                    <div class="card-header p-0">
                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                    </div>
                    <div class="card-body">
                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                    </div>
                </div>
                <table class="table table-sm table-bordered">
                    @foreach($skip_news_5 as $item)
                        @if($loop->index > 0)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" class="img-fluid" width="50" alt=""></td>
                                <td>
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        {{ $item->news_title }}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @if(count($skip_news_5) > 0)
                        <tr>
                            <td colspan="2">
                                <a href="{{ url('news/category/'.$skip_category_5->id.'/'.$skip_category_5->category_slug) }}" class="btn btn-primary btn-sm">Read More</a>
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        @endif
    @endforeach
</div>
