<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">            
            <div class="pull-left image">
            @if (Auth::user()->avatar)
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="{{ Auth::user()->name }}" />
                @else 
                &nbsp;
            @endif
            </div>                 
            <div class="pull-left info">
                <p>{!! Auth::user()->name !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active"><a href="{!! url('admin') !!}"><span>{{ trans('admin/dashboard.menu.dashboard') }}</span></a></li>
            @if(Auth::user()->roles->toArray()[0]['role_slug']=='admin')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>{{ trans('admin/dashboard.menu.administration.main_title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open" style="display: block;">
                    <li>
                        <a href="#"><i class="fa fa-user"></i>{{ trans('admin/dashboard.menu.administration.users') }}<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.users.create') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.create') }}</a></li>
                            <li><a href="{!! route('admin.users.index') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.show') }}</a></li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i>{{ trans('admin/dashboard.menu.administration.roles') }}<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.roles.create') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.create') }}</a></li>
                            <li><a href="{!! route('admin.roles.index') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.show') }}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lock"></i>{{ trans('admin/dashboard.menu.administration.permissions') }}<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.permissions.create') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.create') }}</a></li>
                            <li><a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-circle-o"></i>{{ trans('admin/dashboard.menu.show') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
</aside>