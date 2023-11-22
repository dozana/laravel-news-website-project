<h5 class="mb-4 py-2 bg-light">Posts</h5>
<div class="row">
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
