@extends('admin.admin_dashboard')

@section('title', 'Dashboard')

@php
    $auth_user = Auth::user()->id;
    $user_data = App\Models\User::find($auth_user);
    $user_status = $user_data->status;
@endphp

@section('admin')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-lg-12 col-sm-12">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            @if($user_status == 'active')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($news_post) }}</h3>
                                <p>News</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-file-alt"></i>
                            </div>
                            <a href="{{ route('all.news.post') }}" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($active_news) }}</h3>
                                <p>Active News</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($inactive_news) }}</h3>
                                <p>Inactive News</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-thumbs-down"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($breaking_news) }}</h3>
                                <p>Breaking News</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($categories) }}</h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-stream"></i>
                            </div>
                            <a href="{{ route('all.category') }}" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($subcategories) }}</h3>
                                <p>Subcategories</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-stream"></i>
                            </div>
                            <a href="{{ route('all.subcategory') }}" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Tags</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Reviews</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-comment-dots"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Pending Reviews</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-comment-dots"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Approve Reviews</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-comment-dots"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($admins) }}</h3>
                                <p>Admins</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($users) }}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Ad</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-ad"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>-</h3>
                                <p>Photo Gallery</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-images"></i>
                            </div>
                            <a href="#" class="small-box-footer">View all <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            Admin account is <span class="text-danger">Inactive</span> please contact web administrator.
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
