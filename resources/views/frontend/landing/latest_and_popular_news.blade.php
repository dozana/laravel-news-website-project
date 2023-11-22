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
                    <td class="text-center p-1 align-middle">
                        <a href="{{ url('/news/details/'.$news_item->id.'/'.$news_item->news_title_slug) }}">
                            <img style="width: 100%; height: 40px" class="img-fluid" src="{{ asset($news_item->image) }}" alt="{{ $news_item->news_title }}">
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
                            <img style="width: 100%; height: 40px" class="img-fluid" src="{{ asset($popular_item->image) }}" alt="{{ $popular_item->news_title }}">
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
