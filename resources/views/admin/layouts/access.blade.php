<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>{{config('app.app_name')}} | @yield('title', 'Dashboard')</title>
    @include('admin.partials.access.style')
</head>
<body class="hold-transition login-page">
    @yield('content')    
    @include('admin.partials.access.script')
    @yield('javascript')
</body>
</html>