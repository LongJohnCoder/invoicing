
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
              @if(Session::has('image'))
                <img src="{{url('/')}}/public/admin_new/{{Session::get('image')}}" class="" alt="User Image">
              @endif
                <small class="pull-right">Date: {{date("M d Y",strtotime($Invoice->created_at))}}</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>{{$Invoice->admin_details->name}}</strong><br>
                {{$Invoice->admin_details->detail}}
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
                    <th>Tax(%)</th>
                    <th>Unit Price #</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($Invoice->invoice_items as $invoice)
                  <tr>
                    <td>{{round($invoice->qty,0)}}</td>
                    <td>{{$invoice->name}}</td>
                    <td>{{ $invoice->tax_rate }}</td>
                    <td>{{$invoice->price}}</td>
                    <td>{{$invoice->price_in_tax}}</td>
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
                    {{ $subtotal='' }}
                    {{ $total='' }}
                    <div style="display: none;">
                      @foreach($Invoice->invoice_items as $invoice)
                      {{$subtotal+= $invoice->price*$invoice->qty}}
                      {{ $total += $invoice->price_in_tax }}
                      @endforeach
                    </div>
                    <td>${{ number_format($subtotal, 2) }}</td>
                  </tr>
                  <tr>
                    <th>Tax(%)</th>
                    <td>${{ number_format(($total - $subtotal),2) }}</td>
                  </tr>
                  
                  <tr>
                    <th>Total:</th>
                    <td>${{ number_format($total, 2) }}
                    <input type="hidden" id="tot" value="{{ $total }}">
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
              <button id="customButton" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> 
              Make Payment</button>
              
              <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
              <i class="fa fa-credit-card"></i> 
              Make Payment
              </button>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Payment Process</h4>
                      </div>
                      <div class="modal-body olddis">
                        

                      
                      <div class="box box-success">
                        <div class="box-header">
                          <h3 class="box-title">Payment Details</h3><br>
                          <h2 class="box-title errorstatus" style="display: none; color: red;"></h2>
                        </div>
                      <div class="box-body">
                      <!-- Date dd/mm/yyyy -->
                          <div class="form-group">
                            <label>Card Name:</label>
                            <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                            </div>
                            <input type="text" data-mask="" id="cardname" class="form-control">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Card No:</label>
                            <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="number" data-mask="" id="cardnumber"class="form-control">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>CVV No:</label>
                            <div class="input-group">
                            <div class="input-group-addon">
                            CVV
                            </div>
                            <input type="number" data-mask="" id="cardcvv" class="form-control">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                          <div class="form-group">
                            <label>Expiry Date:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                                <input type="text" class="form-control" id="cardexpdate" data-inputmask="'alias': 'mm/yyyy'" data-mask>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                      </div><!-- /.box-body -->
                      
                      </div>
                      

                      </div>
                      <div class="modal-body newdis" style="display: none;">
                        Payment In Progress .........
                      </div>
                      <div class="modal-body newdisnew" style="display: none;">
                        Opps Please Try Again Later !!
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary paybut">PAY</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div>



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
<style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
    </style>
@stop