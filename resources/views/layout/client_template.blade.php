<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INVOICINGYOU.COM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('/')}}/public/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/')}}/public/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 @yield('content')
 <script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <script src="https://checkout.stripe.com/checkout.js"></script>
 <script>
  var handler = StripeCheckout.configure({
    key: 'pk_test_bwlT7RjDMbKUe0j08xzXX73o',
    image: '/img/documentation/checkout/marketplace.png',
    locale: 'auto',
    token: function(token) {
      console.log(token);
      var tot=parseFloat($("#tot").val());
      var inv=$("#inv").val();
      $.ajax({
                        url: "<?php echo url('/');?>/create_payment",
                        data: {token:token,tot:tot,inv:inv,_token: '{!! csrf_token() !!}'},
                        type :"post",
                        success: function( data ) {
                        var urlnew="<?php echo url('/');?>/client/invoice/"+inv;
                        $(location).attr('href',urlnew);
                        }
              });
    }
  });

  $('#customButton').on('click', function(e) {
    var tot=parseFloat($("#tot").val())*100;
    handler.open({
      name: 'Tier5',
      description: 'Invoice',
      amount: tot,
      currency: 'USD'
    });
    e.preventDefault();
  });

  // Close Checkout on page navigation:
  $(window).on('popstate', function() {
    handler.close();
  });
</script>
</html>