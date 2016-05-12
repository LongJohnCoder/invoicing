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
<!-- Bootstrap 3.3.5 -->
<script src="{{url('/')}}/public/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="{{url('/')}}/public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="{{url('/')}}/public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="{{url('/')}}/public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="{{url('/')}}/public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{url('/')}}/public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{url('/')}}/public/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="{{url('/')}}/public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{url('/')}}/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="{{url('/')}}/public/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="{{url('/')}}/public/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/public/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('/')}}/public/dist/js/demo.js"></script>
 <script>
      $(function () {
       $("#datemask").inputmask("mm/yyyy", {"placeholder": "mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/yyyy", {"placeholder": "mm/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        $(".paybut").on('click', function(e) {
          var cardname=$("#cardname").val();
          var cardnumber=$("#cardnumber").val();
          var cardcvv=$("#cardcvv").val();
          var cardexpdate=$("#cardexpdate").val();
          var tot=$("#tot").val();
          var inv=$("#inv").val();

          $(".olddis").hide();
          $(".newdis").show();
          $.ajax({
                        url: "<?php echo url('/');?>/aurthopaymen",
                        data: {cardname:cardname,cardnumber:cardnumber,cardcvv:cardcvv,cardexpdate:cardexpdate,tot:tot,inv:inv,_token: '{!! csrf_token() !!}'},
                        type :"post",
                        success: function( data ) {
                          if(data=="1"){
                            var urlnew="<?php echo url('/');?>/client/invoice/"+inv;
                             $(location).attr('href',urlnew);
                          }else{
                            var urlnew="<?php echo url('/');?>/client/invoice/"+inv;
                            $('.errorstatus').html(data);
                            $('.errorstatus').show();
                            $(".olddis").show();
                            $(".newdis").hide();
                          // $(location).attr('href',urlnew);
                          }
                        }
                });
        });
      });
 </script>
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
 <script src="https://checkout.stripe.com/checkout.js"></script>

 @if($Invoice->payment_keys)
  <script>
    var handler = StripeCheckout.configure({
      key: '{{ $Invoice->payment_keys->key_first }}',
      image: '{{url("/")}}'+'/public/admin_new/{{ $Invoice->admin_details == null ? "112203937.png": $Invoice->admin_details->image }}',
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
          $('#invoice_body').hide();
          $('#loader').show();
          var urlnew="<?php echo url('/');?>/client/invoice/"+inv;
          $(location).attr('href',urlnew);
          }
        });
      }
    });
    $('#customButton').on('click', function(e) {
      var tot=parseFloat($("#tot").val())*100;
      handler.open({
        name: '{{ $Invoice->admin_details == null ? "Tier5" : $Invoice->admin_details->name }}',
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
 @else
 @endif
</html>