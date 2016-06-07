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
        <form action="#" method="post" id="payment-form">
          <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    		data-key="pk_test_bwlT7RjDMbKUe0j08xzXX73o"
		    data-amount="999"
		    data-name="LaunchPad"
		    data-description="Widget"
		    data-image="/img/documentation/checkout/marketplace.png"
		    data-locale="auto">
  		 </script>
        </form>

        <a href="{{ route('admin-login') }}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    @include('section.admin-lte-footer')
  </body>
</html>