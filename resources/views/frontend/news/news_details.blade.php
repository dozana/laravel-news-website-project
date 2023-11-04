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

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <img width="60" src="{{ (!empty($news->user->photo)) ? url('upload/admin_images/'.$news->user->photo) : url('upload/no_image.png') }}" alt="Author Image">
                            <ul class="list-unstyled mb-0 p-2">
                                <li>Posted By {{ $news['user']['name'] }}</li>
                                <li><i class="far fa-clock"></i>Updated: {{ $news->created_at->format('l M d Y') }} / <i class="far fa-eye"></i> 60 Read</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">{{ $news->news_title }}</h4>
                        <img src="{{ (!empty($news->image)) ? asset($news->image) : url('https://via.placeholder.com/800x400') }}" class="img-fluid mb-2" alt="Post Image">
                        {!! $news->news_details !!}

                        <div>
                            Tags: {{ $news->tags }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
