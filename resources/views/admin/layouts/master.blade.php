<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{config('app.app_name')}} | @yield('title', 'Dashboard')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        @include('admin.partials.master.style')
    </head>
    <body class="skin-yellow">
        <div class="wrapper">
            @include('admin.partials.master.header')
            @include('admin.partials.master.sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield('title', 'Page Title')
                    </h1>
                    @include('admin.partials.master.breadcrumb')                    
                </section>
                <section class="content">
                    @include('admin.partials.master.flashes')
                    <div class="box box-default">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('admin.partials.master.footer')
        </div>        
        @include('admin.partials.master.script')
        @yield('javascript')
    </body>
</html>