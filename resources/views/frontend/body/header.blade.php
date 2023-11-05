<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">NEWSPORTAL</a>

        <ul class="navbar-nav mr-auto">
            @php
                $categories = \App\Models\Category::orderBy('id', 'ASC')->limit(12)->get();
            @endphp

            @foreach($categories as $category)

                @php
                    $subcategories = \App\Models\Subcategory::where('category_id',$category->id)->orderBy('id', 'ASC')->get();
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link {{ count($subcategories) > 0 ? 'dropdown-toggle' : '' }}" href="#" id="{{ $category->category_slug }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ ucfirst($category->category_name) }}
                    </a>
                    @if(count($subcategories) > 0)
                        <div class="dropdown-menu" aria-labelledby="{{ $category->category_slug }}">
                            @foreach($subcategories as $subcategory)
{{--                                <a class="dropdown-item" href="{{ url('/news/details/'.$subcategory->id.'/'.$subcategory->subcategory_name) }}">--}}
{{--                                    {{ $subcategory->subcategory_name }}--}}
{{--                                </a>--}}

                                <a class="dropdown-item" href="#">{{ $subcategory->subcategory_name }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
            @endforeach

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Sports--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="languageDropdown">--}}
{{--                    <a class="dropdown-item" href="#">Item 1</a>--}}
{{--                    <a class="dropdown-item" href="#">Item 2</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Archive</a>--}}
{{--            </li>--}}
        </ul>

        <ul class="navbar-nav">
            @auth()
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
</nav>
