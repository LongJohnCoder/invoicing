
 @extends('layout/client_template')
@section('content')

  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
          </section>

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
                    <th>Unit Price #</th>
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

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
            @if($Invoice->payment_status!=0)
              <a href="{{url('/').'/print/'.base64_encode($Invoice->invoice_id.'DONE')}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
             @else 
              <button id="customButton" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Make Payment</button>
              




              @endif

              
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    
  </body>

@stop