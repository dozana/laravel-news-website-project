@php
    $review_count = Auth::user()->unreadNotifications()->count();
    $user = Auth::user();
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link" target="_blank">Public</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">{{ $review_count }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                @forelse($user->notifications as $notification)
                    <a href="{{ route('pending.review') }}" class="dropdown-item">
                        <div class="media">
{{--                            <img src="{{ asset('backend/assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
                            <div class="media-body">
                                <p class="text-sm">{{ $notification->data['message'] }}</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                    No reviews exists.
                @endforelse

                <a href="{{ route('pending.review') }}" class="dropdown-item dropdown-footer">View All</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
