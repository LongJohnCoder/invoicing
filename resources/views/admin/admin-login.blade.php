<!DOCTYPE html>
<html>
  <head>
    @include('section.admin-lte-header')
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      @if(Session::has('fail'))
    		<div class="alert alert-danger">{{ Session::get('fail') }}
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
	    @endif
      @if(Session::has('block'))
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{Session::get('block')}}
        </div>
      @endif
      @if(Session::has('success_registration'))
        <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('success_registration') }}
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
      @endif
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ route('admin-dashboard') }}" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" required="required" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="_token" value="{{ Session::token() }}" />
        </form>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
    @include('section.admin-lte-footer')
  </body>
</html>
