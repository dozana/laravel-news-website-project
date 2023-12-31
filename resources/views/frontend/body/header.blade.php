@php
    $user = Auth::user();
    $categories = \App\Models\Category::orderBy('id', 'ASC')->limit(6)->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Technology</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                @foreach($categories as $category)

                    @php
                        $subcategories = \App\Models\Subcategory::where('category_id',$category->id)->orderBy('id', 'ASC')->get();
                    @endphp

                    <li class="nav-item dropdown">
                        <a href="{{ url('news/category/'.$category->id.'/'.$category->category_slug) }}" class="nav-link {{ count($subcategories) > 0 ? 'dropdown-toggle' : '' }}" id="{{ $category->category_slug }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ ucfirst($category->category_name) }}
                        </a>
                        @if(count($subcategories) > 0)
                            <div class="dropdown-menu" aria-labelledby="{{ $category->category_slug }}">
                                @foreach($subcategories as $subcategory)
                                    <a class="dropdown-item" href="{{ url('news/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                                        {{ $subcategory->subcategory_name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ $user->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language
                    </a>
                    <div class="dropdown-menu" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="#">English</a>
                        <a class="dropdown-item" href="#">Spanish</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
