<h3><a href="{{ url('news/category/'.$skip_category_2->id.'/'.$skip_category_2->category_slug) }}">{{ $skip_category_2->category_name }}</a></h3>
<div class="row">
    @foreach($skip_news_2 as $item)
        <div class="col-lg-3 col-md-3">
            <div class="card mb-3">
                <div class="card-header p-0">
                    <img src="{{ asset($item->image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                </div>
                <div class="card-body">
                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
