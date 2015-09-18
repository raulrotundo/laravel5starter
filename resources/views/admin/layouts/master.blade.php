<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrator | @yield('title', 'Dashboard')</title>
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
                    <!--ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol-->
                    <ol class="breadcrumb"> 
                        <li> 
                            <i class="fa fa-dashboard"></i> 
                            <a href="{!! url('admin') !!}">Home</a> 
                            <i class="fa fa-angle-right"></i> 
                        </li> 
                        <?php $link = url('admin'); ?> 
                        @for($i = 1; $i <= count(Request::segments()); $i++)                             
                                @if($i < count(Request::segments()) & $i > 0)
                                    @if(Request::segment($i) <> config('admin.prefix'))
                                        <li> 
                                            <?php $link .= "/" . Request::segment($i); ?> 
                                            <a href="<?= $link ?>">{{Request::segment($i)}}</a> 
                                            {!!'<i class="fa fa-angle-right"></i>'!!} 
                                        </li> 
                                    @endif
                                @else 
                                    {{Request::segment($i)}} 
                                @endif                             
                        @endfor 
                    </ol>
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