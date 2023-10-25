<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="online newspaper, news">
<meta name="description" content="Popular news paper of Georgia">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="stylesheet" href="{{ asset('frontend/assets/dist/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/dist/css/styles.css') }}">
<link rel="stylesheet icon" href="{{ asset('frontend/assets/dist/img/favicon.png') }}" type="image/x-icon">
@yield('styles')
