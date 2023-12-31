@php
    $seo = App\Models\Seo::find(1);
@endphp
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="title" content="{{ $seo->meta_title }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keywords }}">
<meta name="description" content="{{ $seo->meta_description }}">
<title>@yield('title')</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets/dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/dist/css/styles.css') }}">
<link rel="stylesheet icon" href="{{ asset('frontend/assets/dist/img/favicon.png') }}" type="image/x-icon">
@yield('styles')
