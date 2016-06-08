<!DOCTYPE html>
<html>
  <head>
    @include('section.admin-lte-header')
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Admin</b>LTE</a>
      </div>
      <div class="alert alert-danger" id="error_div" style="display: none;"></div>
      @if(Session::has('custom_err'))
        <div class="alert alert-danger">
          <strong>Sorry!</strong> {{Session::get('custom_err')}}
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div>
      @endif
      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="{{ route('postRegister') }}" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name" name="usr_name" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="usr_email" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="pass" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password" name="conf_pass" id="conf_pass" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <select class="form-control" id="select_membership" name="select_membership" required>
                <option value="1">Basic</option>
                <option value="2">Professional</option>
                <option value="3">Gold</option>
              </select>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" id="terms" required> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" id="register_btn">Register</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="{{ route('admin-login') }}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    @include('section.admin-lte-footer')
  </body>
</html>