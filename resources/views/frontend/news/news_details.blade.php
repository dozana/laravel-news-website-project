@extends('frontend.home_dashboard')

@section('home')
    <div class="container flex-grow">

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $news['category']['category_name'] }}</li>
                        @if($news->subcategory_id == NULL)
                            <li class="breadcrumb-item" aria-current="page">Uncategorized</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $news['subcategory']['subcategory_name'] }}</li>
                        @endif
                    </ol>
                </nav>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <img width="60" src="{{ (!empty($news->user->photo)) ? url('upload/admin_images/'.$news->user->photo) : url('upload/no_image.png') }}" alt="Author Image">
                            <ul class="list-unstyled mb-0 p-2">
                                <li>Posted By {{ $news['user']['name'] }}</li>
                                <li><i class="far fa-clock"></i>Updated: {{ $news->created_at->format('l M d Y') }} / <i class="far fa-eye"></i> {{ $news->view_count }} Read</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">{{ $news->news_title }}</h4>
                        <img src="{{ (!empty($news->image)) ? asset($news->image) : url('https://via.placeholder.com/800x400') }}" class="img-fluid mb-2" alt="Post Image">

                        <div class="mb-2">
                            <button id="inc" class="btn btn-primary btn-sm">A+</button>
                            <button id="dec" class="btn btn-primary btn-sm">A-</button>
                        </div>

                        <div class="news-details">
                            <p>{!! $news->news_details !!}</p>
                        </div>

                        <h6>Tags</h6>
                        <div class="mb-3">
                            @foreach($tags_all as $tag)
                                <span class="badge bg-secondary">{{ ucwords($tag) }}</span>
                            @endforeach
                        </div>

                        <h6>Share News</h6>
                        <div class="d-flex align-items-center">
                            <a href="#" class="text-dark"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-twitter fa-lg ml-2"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-linkedin fa-lg ml-2"></i></a>
                            <a href="#" class="text-dark"><i class="fab fa-pinterest fa-lg ml-2"></i></a>
                        </div>
                    </div>
                </div>

                <h5 class="mb-3">Related News</h5>
                <div class="row">
                    @foreach($related_news as $item)
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-header p-0 text-center">
                                    <a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                        <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6><a href="{{ url('/news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a></h6>
                                    <small><i class="far fa-calendar-alt"></i> {{ $item->created_at->format('l M d Y') }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                dsaf
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        let size = 16;

        function setFontSize(s) {
            size = s;
            $('.news-details p').css('font-size', size + 'px');
        }

        function increaseFontSize() {
            setFontSize(size + 5);
        }

        function decreaseFontSize() {
            if (size > 5) {
                setFontSize(size - 5);
            }
        }

        $('#inc').click(increaseFontSize);
        $('#dec').click(decreaseFontSize);
        setFontSize(size);
    </script>
@endsection
