<!DOCTYPE html>
<html>
  @include('section.headdashboard')
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>InV</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Invoice</span>
          
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          @if (Auth::check()) 
           <a href="{{ route('admin-logout') }}" class="btn btn-link" style="float: right; color: #fff;!important">Logout</a>
           @endif
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      @include('section.sidenav')

      @yield('content')
      
	@include('section.foot')
      
      
    </div><!-- ./wrapper -->

    @include('section.footerdashboard')
  </body>
</html>
