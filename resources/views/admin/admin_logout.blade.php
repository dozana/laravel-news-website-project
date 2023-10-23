<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Logout</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition lockscreen">

<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="#"><b>Buy</b></a>
    </div>
    <!-- User name -->
    <div class="help-block text-center">
        See you again!
    </div>
    <div class="text-center mb-4">
        You are now successfully sign out. <br>
        Back to <a href="{{ route('admin.login') }}">Sign in</a>.
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2023 All rights reserved
    </div>
</div>

<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
