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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              @if($invoice->admin_details->image != null)
                <img src="{{url('/')}}/public/admin_new/{{$invoice->admin_details->image}}" class="" alt="User Image">
              @else
                <img src="{{url('/')}}/public/imgx/logo.png" class="" alt="User Image">
              @endif
              <small class="pull-right">Date: {{$invoice->created_at->toDateString()}}</small>
            </h2>
          </div><!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>{{$invoice->admin_details->name}} ,</strong><br>
                {{$invoice->admin_details->detail}}
              </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{$invoice->user_details->name}} ,</strong><br>
                
                Email: {{$invoice->user_details->email}}
              </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice # {{$invoice->invoice_id}}</b><br>
              <br>
              
              <b>Order Date:</b> {{$invoice->created_at->toDateString()}} 
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
                  <th>Tax(%)</th>
                  <th>Unit Price #</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($invoice->invoice_items as $items)
                  <tr>
                    <td>{{ $items->qty }}</td>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->tax_rate }}</td>
                    <td>{{ $items->price }}</td>
                    <td>{{ $items->price_in_tax }}</td>
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
                {{$invoice->user_details->memo}}
              </p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Payment Status: {{$invoice->payment_status == 0 ? 'Pending' : 'Paid'}}
              </p>
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Payment Date: {{$invoice->updated_at == $invoice->created_at ? 'Not yet paid' : $invoice->updated_at->toDateString()}}
              </p>
          </div><!-- /.col -->
          <div class="col-xs-6">
              <p class="lead">Amount Due {{$invoice->updated_at->toDateString()}} </p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                      <div style="display: none;">
                      {{$price = 0}}
                      {{$price_in_tax = 0}}
                      @foreach($invoice->invoice_items as $item_price)
                        {{$price += $item_price->qty*$item_price->price}}
                        {{$price_in_tax += $item_price->price_in_tax}}
                      @endforeach
                      </div>
                    <td>${{$price}}</td>
                  </tr>
                  <tr>
                    <th>Tax(%)</th>
                    <td>${{$price_in_tax-$price}}</td>
                  </tr>
                  
                  <tr>
                    <th>Total:</th>
                    <td>${{$price_in_tax}}</td>
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
