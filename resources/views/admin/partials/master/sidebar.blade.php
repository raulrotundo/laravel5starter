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
            <li class="active"><a href="{!! url('admin') !!}"><span>Dashboard</span></a></li>
            @if(Auth::user()->roles->toArray()[0]['role_slug']=='admin')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Administration</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open" style="display: block;">
                    <li>
                        <a href="#"><i class="fa fa-user"></i>Users<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.users.create') !!}"><i class="fa fa-circle-o"></i>Create</a></li>
                            <li><a href="{!! route('admin.users.index') !!}"><i class="fa fa-circle-o"></i>Show</a></li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-users"></i>Roles<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.roles.create') !!}"><i class="fa fa-circle-o"></i>Create</a></li>
                            <li><a href="{!! route('admin.roles.index') !!}"><i class="fa fa-circle-o"></i>Show</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lock"></i>Permissions<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.permissions.create') !!}"><i class="fa fa-circle-o"></i>Create</a></li>
                            <li><a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-circle-o"></i>Show</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-plus"></i>Assign Permissions<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{!! route('admin.permissionroles.create') !!}"><i class="fa fa-circle-o"></i>Create</a></li>
                            <li><a href="{!! route('admin.permissionroles.index') !!}"><i class="fa fa-circle-o"></i>Show</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
</aside>