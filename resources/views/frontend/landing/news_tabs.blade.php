<div class="row mb-3">
    <div class="col-lg-12 col-md-12">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            @foreach($categories as $key => $category)
                <li class="nav-item">
                    <a class="nav-link{{ $key === 0 ? ' active' : '' }}" id="menu{{ $category->id }}-tab" data-bs-toggle="tab" href="#menu{{ $category->id }}" role="tab">
                        {{ $category->category_name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content mb-3">
            @foreach($categories as $key => $category)
                <div class="tab-pane{{ $key === 0 ? ' active' : '' }}" id="menu{{ $category->id }}" role="tabpanel">
                    <div class="row">
                        @php
                            $categoryNews = $news->where('category_id', $category->id);
                        @endphp

                        @if($categoryNews->count() > 0)
                            @foreach($categoryNews as $item)
                                <div class="col-lg-3 col-md-3">
                                    <div class="card mt-3 mb-2">
                                        <div class="card-header p-0">
                                            <img class="img-fluid" src="{{ asset($item->image) }}" alt="#">
                                        </div>
                                        <div class="card-body text-center">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                {{ $item->news_title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-primary mt-3" role="alert">
                                No data found
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
