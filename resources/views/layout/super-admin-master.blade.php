<!DOCTYPE html>
<html>
    <head>
        @include('super-admin.head-script')
    </head>
	<body class="skin-black">
        @include('super-admin.header')
		<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                @if($admin_info->admin_details != null && $admin_info->admin_details->image != null)
                                    <img src="{{url('/')}}/public/admin_new/{{$admin_info->admin_details->image}}" class="img-circle" alt="User Image" />
                                @else
                                    <img src="{{url('/')}}/public/imgx/logo.png" class="img-circle" alt="User Image" />
                                @endif
                                
                            </div>
                            <div class="pull-left info">
                                @if($admin_info->admin_details != null && $admin_info->admin_details->name != null)
                                <p>Hello, {{$admin_info->admin_details->name}}</p>
                                @else
                                <p>Hello, Buddy</p>
                                @endif
                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="general.html">
                                <i class="fa fa-credit-card"></i> <span>Manage Accounts</span>
                            </a>
                        </li>

                        <li>
                            <a href="basic_form.html">
                                <i class="fa fa-user"></i> <span>Manage Admins</span>
                            </a>
                        </li>

                        <li>
                            <a href="simple.html">
                                <i class="fa fa-list"></i> <span>Manage All Invoices</span>
                            </a>
                        </li>

                    </ul>
                </section><!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                <!-- Main content -->
                @yield('content')
                <div class="footer-main">
                    Copyright &copy Director, 2014
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
		@include('super-admin.foot-script')
    </body>
</html>