<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.body.head')
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    @include('admin.body.navbar')
    @include('admin.body.sidebar')
    <div class="content-wrapper">
        @yield('admin')
    </div>
    @include('admin.body.footer')
</div>

@include('admin.body.bottom')

</body>
</html>
