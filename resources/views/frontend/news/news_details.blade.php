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
                        <h4 class="mb-0">{{ $news->news_title }}</h4>
                    </div>
                    <div class="card-body">
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
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <img width="60" src="{{ (!empty($news->user->photo)) ? url('upload/admin_images/'.$news->user->photo) : url('upload/no_image.png') }}" alt="Author Image">
                            <ul class="list-unstyled mb-0 p-2">
                                <li>Posted By {{ $news['user']['name'] }}</li>
                                <li><i class="far fa-clock"></i>Updated: {{ $news->created_at->format('l M d Y') }} / <i class="far fa-eye"></i> {{ $news->view_count }} Read</li>
                            </ul>
                        </div>
                    </div>
                </div>

                @guest
                    <div class="alert alert-primary" role="alert">
                        For adding review you need to <a href="{{ route('login') }}"><strong>login</strong></a> first.
                    </div>
                @else
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Leave a Comment</h4>
                            <form action="{{ route('store.review') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Comments</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Comment</button>
                            </form>
                        </div>
                    </div>

                    <!-- Single Comment -->
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-subtitle mb-2 text-muted">john@example.com</p>
                            <p class="card-subtitle mb-2 text-muted">Subject: Some Subject</p>
                            <p class="card-text">This is a great comment! Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <img src="https://picsum.photos/80/80" class="img-fluid" alt="User Photo">
                        </div>
                    </div>
                    <!-- End Single Comment -->

                    <!-- Another Comment -->
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-subtitle mb-2 text-muted">jane@example.com</p>
                            <p class="card-subtitle mb-2 text-muted">Subject: Another Subject</p>
                            <p class="card-text">I agree with John! This is a fantastic discussion. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <!-- No photo in this example -->
                        </div>
                    </div>
                    <!-- End Another Comment -->
                @endguest

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
                                    <td class="text-center align-middle">
                                        <a href="{{ url('/news/details/'.$news_item->id.'/'.$news_item->news_title_slug) }}">
                                            <img style="width: 80px; height: 40px" class="img-fluid" src="{{ asset($news_item->image) }}" alt="{{ $news_item->news_title }}">
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
                                            <img style="width: 80px; height: 40px" class="img-fluid" src="{{ asset($popular_item->image) }}" alt="{{ $popular_item->news_title }}">
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
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // change content font size
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

    <script>
        // dynamic tabs
        const tabLinks = document.querySelectorAll('.nav-link');
        tabLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Remove the 'active' class from all tab links and tab content
                tabLinks.forEach((link) => {
                    link.classList.remove('active');
                });
                const tabContent = document.querySelectorAll('.tab-pane');
                tabContent.forEach((content) => {
                    content.classList.remove('active');
                });

                // Add the 'active' class to the clicked tab link and its corresponding tab content
                link.classList.add('active');
                const targetTab = document.querySelector(link.getAttribute('href'));
                targetTab.classList.add('active');
            });
        });
    </script>

@endsection
