<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.body.head')
</head>
<body>

@include('frontend.body.header')
@include('frontend.body.breaking_news')
@include('frontend.body.search')
@yield('home')
@include('frontend.body.footer')

</body>
</html>
