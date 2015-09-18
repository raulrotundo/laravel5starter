<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator | @yield('title', 'Dashboard')</title>
    @include('admin.partials.access.style')
</head>
<body class="hold-transition login-page">
    @yield('content')    
    @include('admin.partials.access.script')
</body>
</html>