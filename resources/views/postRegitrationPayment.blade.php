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
      <div class="register-box-body">
        <p class="login-box-msg">{{ $membership == 'pro' ? 'Pay $10 / month and get unlimited access' : 'Pay $20 / month and get unlimited access' }}</p>
        @if($super_admin_account->payment_keys->payment_id == 1)
          <form method="POST" id="payment-form" action="{{ route('postPayment') }}">
            <span class="payment-errors"></span>
            <div class="form-row">
              <label>
              <span>Card Number</span>
              <input type="text" size="20" data-stripe="number">
              </label>
            </div>
            <div class="form-row">
              <label>
              <span>Expiration (MM/YY)</span>
              <input type="text" size="2" data-stripe="exp_month">
              </label>
              <span> / </span>
              <input type="text" size="2" data-stripe="exp_year">
            </div>
            <div class="form-row">
              <label>
              <span>CVC</span>
              <input type="text" size="4" data-stripe="cvc">
              </label>
            </div>
            <input type="submit" class="submit" value="Submit Payment">
            <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
            <input type="hidden" name="last_inserted_id" value="{{ $last_inserted_id }}" />
            <input type="hidden" name="secret_key" value="{{$super_admin_account->payment_keys->key_second}}" />
            <input type="hidden" name="stripeAmount" value="{{ $membership == 'pro' ? '10' : '20' }}" />
          </form>
        @else
          yet to be build authorize.net
        @endif
        <a href="{{ route('admin-login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    @include('section.admin-lte-footer')
  </body>
  <!-- stripe js-->
  <script type="text/javascript">
    $(document).ready(function(){
      //set dyanmic publishable key here
      Stripe.setPublishableKey('{{$super_admin_account->payment_keys->key_first}}');
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
</html>