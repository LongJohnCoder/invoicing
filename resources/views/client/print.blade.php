<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Invoice</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <img src="{{url('/')}}/public/imgx/logo.png">
              <small class="pull-right">Date: {{date("M d Y",strtotime($Invoice->created_at))}}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Tier5</strong><br>
                Email: work@tier5.us
              </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{$Invoice->user_details->name}}</strong><br>
                
                Email: {{$Invoice->user_details->email}}
              </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #{{$Invoice->invoice_id}}</b><br>
              <br>
              
              <b>Order Date:</b> {{date("M d Y",strtotime($Invoice->created_at))}}
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($Invoice->invoice_items as $invoice)

                  <tr>
                    
                    <td>{{round($invoice->qty,0)}}</td>
                    <td>{{$invoice->name}}</td>
                    <td>{{$invoice->price}}</td>
                    <td>{{$invoice->qty*$invoice->price}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">Memorandum:</p>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$Invoice->memo}}
              </p>
              @if($Invoice->payment_status==1)
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Payment Status: Paid
              </p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Payment Date: {{date("M d Y",strtotime($Invoice->updated_at))}}
              </p>
              @endif
          </div><!-- /.col -->
          <div class="col-xs-6">
              <p class="lead">Amount Due {{date("m/d/Y",strtotime($Invoice->created_at))}}</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>${{$Invoice->total}}</td>
                  </tr>
                  <tr>
                    <th>Tax ({{$Invoice->tax_rate}}%)</th>
                    <td>${{round($Invoice->tax_rate*($Invoice->total/100),2)}}</td>
                  </tr>
                  
                  <tr>
                    <th>Total:</th>
                    <td>${{round($Invoice->total+($Invoice->tax_rate*($Invoice->total/100)),2)}}
                    <input type="hidden" id="tot" value="{{round($Invoice->total+($Invoice->tax_rate*($Invoice->total/100)),2)}}">
                    <input type="hidden" id="inv" value="{{base64_encode($Invoice->invoice_id)}}"></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="{{url('/')}}/public/dist/js/app.min.js"></script>
  </body>
</html>
