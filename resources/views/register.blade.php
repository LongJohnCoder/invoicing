<!DOCTYPE html>
<html>
  <head>
    @include('section.admin-lte-header')
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Invoicingyou</b> Register</a>
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
        <form action="{{ route('postRegister') }}" method="post" id="payment-form">
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
                <option value="">Select membersip</option>
                <option value="1">Basic</option>
                <option value="2">Professional</option>
                <option value="3">Gold</option>
              </select>
          </div>
          @if($super_admin_account!=null)
            @if($super_admin_account->payment_keys != null)
            <div class="form-group has-feedback" id="payment_div" style="display: none;">
              <span class="payment-errors" style="color: red;"></span>
              <span style="color: red;" id="pay_value"></span>
              <input type="text" size="20" data-stripe="number" class="form-control" placeholder="card number"/><br/>
              <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
              <div class="col-xs-4">
                <input type="text" size="2" data-stripe="exp_month" class="form-control" placeholder="MM" style="margin-left: -19%;" />
              </div>
              <div class="col-xs-8">
                <input type="text" size="2" data-stripe="exp_year" class="form-control" placeholder="YYYY" style="width: 127%; margin-left: -19%;" />
              </div>
              <input type="text" size="4" data-stripe="cvc" class="form-control" style="margin-top: 16%;" placeholder="cvc">
            </div>
            @else
              <div class="form-group has-feedback" style="color: red;">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Super Admin has not yet set up payment account try basic for now.
              </div>
            @endif
          @else
            <div class="form-group has-feedback" style="color: red;">
              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> No Super Admin Exists Try Basic for now.
            </div>
          @endif
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
  <script type="text/javascript">
    /* payment form slide down slide up script*/
    $(document).ready(function(){
      $('#select_membership').click(function(){
        var value = $('#select_membership').val();
        if($.trim(value) > 1) {
          if(value==2) 
          {
            $('#pay_value').html('You will be charged $10 for your professional membership');
            $('#payment_div').slideDown();
          }
          else
          {
            $('#pay_value').html('You will be charged $20 for your gold membership');
            $('#payment_div').slideDown();
          }
          
        }
        else
        {
          $('#payment_div').slideUp();
        }
      });
    });
  </script>
  <!--stripe js-->
  @if($super_admin_account->payment_keys !=null)
    <script type="text/javascript">
      $(document).ready(function(){
      //set dyanmic publishable key here
        $('#select_membership').bind("keydown change",function(){
          var value = $('#select_membership').val();
          if ($.trim(value) > 1) 
          {
            Stripe.setPublishableKey('{{$super_admin_account->payment_keys->key_first}}');
          }
          else
          {
            console.log('Basic Member');
            return false;
          }
        });
      });
      $(function() {
        var $form = $('#payment-form');
        $form.submit(function(event) {
          // Disable the submit button to prevent repeated clicks:
          $form.find('.submit').prop('disabled', true);
      
          // Request a token from Stripe:
          Stripe.card.createToken($form, stripeResponseHandler);
      
          // Prevent the form from being submitted:
          return false;
        });
      });
      function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#payment-form');
      if (response.error) { // Problem!
      // Show the errors on the form:
      $form.find('.payment-errors').text(response.error.message);
      $form.find('.submit').prop('disabled', false); // Re-enable submission
    
      } else { // Token was created!
    
      // Get the token ID:
      var token = response.id;
      //console.log(token)
      //console.log(response);
      // Insert the token ID into the form so it gets submitted to the server:
      $form.append($('<input type="hidden" name="stripeToken">').val(token));
    
      // Submit the form:
      $form.get(0).submit();
    }
    };
    </script>
  @else
    <script type="text/javascript">
      $(document).ready(function(){
        console.log("Can't Accpet your payment right now");
      });
    </script>
  @endif
</html>