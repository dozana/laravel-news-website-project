<div class="row">
    <div class="col-lg-8 col-md-8">

        <h3>{{ $skip_category_0->category_name }}</h3>

        <div class="row">
            <div class="col-lg-6 col-md-6">

                @foreach($skip_news_0 as $item)
                    @if($loop->index < 1)
                        <div class="card mb-3">
                            <div class="card-header p-0">
                                <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="card-body">
                                <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                    {{ $item->news_title }}
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <div class="col-lg-6 col-md-6">
                <table class="table table-hover table-bordered">
                    <tbody>
                    @foreach($skip_news_0 as $item)
                        @if($loop->index > 1)
                            <tr>
                                <td class="text-center"><img src="{{ asset($item->image) }}" class="img-fluid img-rounded" style="width: 120px; height: 60px" alt=""></td>
                                <td><a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="col-lg-4 col-md-4">

        <div class="card mb-3">
            <div class="card-header p-0">
                <img src="https://picsum.photos/400/350" class="img-fluid" alt="">
            </div>
            <div class="card-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </div>
        </div>

    </div>
</div>
