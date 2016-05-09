@extends('layout/home_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Invoice
          </h1>
          @if(Session::has('conf_success'))
            <div class="alert alert-success" align="center"><strong>Success!</strong> {{ Session::get('conf_success') }}  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
          @endif
          {{ Session::forget('conf_success') }}
          @if(Session::has('del_succ'))
            <div class="alert alert-success" align="center"><strong>Successfully!</strong> {{ Session::get('del_succ') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
          @endif
          {{ Session::forget('del_succ') }}
          @if(Session::has('del_fail'))
            <div class="alert alert-danger" align="center"><strong>Error!</strong> {{ Session::get('del_fail') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
          @endif
          {{ Session::forget('del_fail') }}
        </section>
        <form action="{{ route('create-invoice') }}" method="POST">
        <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-md-6">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Create Invoice</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Select Payment Account</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Account Details</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                          
                        
                          <!-- right column -->
                          <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                              <div class="box-header with-border">
                                <h3 class="box-title">Basic info</h3>
                              </div><!-- /.box-header -->
                              <!-- form start -->
                              <div class="se-pre-con"></div>
                              <div class="form-horizontal">
                                <div class="box-body">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email" required>
                                    </div>
                                  </div>
                                  
                                </div><!-- /.box-body -->
                                
                              </div>
                            </div><!-- /.box -->
                            <div class="box box-danger">
                              <div class="box-header with-border">
                                <h3 class="box-title">Requirements</h3>
                              </div>
                              <input type="hidden" id="counter" name="counter" value="0">
                              <div class="box-body">
                                <div class="row first">
                                <div class="col-xs-1">
                                  <input type="checkbox" name="tax[0]"/>
                                </div>
                                  <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="Item" id="Item_0" name="Item[0]" required>
                                  </div>
                                  <div class="col-xs-3">
                                    <input type="number" class="form-control qtycal" placeholder="Quantity" id="Quantity_0" name="Quantity[0]" required>
                                  </div>
                                  <div class="col-xs-5">
                                    <input type="text" class="form-control prical" placeholder="Price" id="Price_0" name="Price[0]" required>
                                  </div>
                                </div>
                              </div><!-- /.box-body -->
                              <div class="box-footer">
                                  <div class="row">
                                  <div class="col-xs-3">
              						<div class="input-group">
              							<span class="input-group-addon">No</span>
              							<input class="form-control" type="text" placeholder="No Of Items" id="no_of_item" readonly>
              						</div>
                                  </div>
                                  <div class="col-xs-4">
                                    <div class="input-group">
              							<span class="input-group-addon">Qty</span>
              							<input class="form-control" type="text" placeholder="Total Quantity" id="qty" readonly>
              						</div>
                                  </div>
                                  <div class="col-xs-5">
                                    <div class="input-group">
              							<span class="input-group-addon">$</span>
              							<input class="form-control" type="text" placeholder="Total Price"id="total_price" readonly>
              						</div>
                                  </div>
                                </div>
                                </div>
                              <div class="box-footer">
                                  <button class="btn btn-block btn-success btn-flat" id="add_item" type="button">Add More Item</button>
                                </div>
                            </div><!-- /.box -->
                            <!-- general form elements disabled -->
              	          <div class="box box-warning">
              	            <div class="box-header with-border">
              	              <h3 class="box-title">Others</h3>
              	            </div><!-- /.box-header -->
              	            <div class="box-body">
              	              <form role="form">
              	                <!-- text input -->
              	                <div class="form-group">
              	                  <label>Tax Rate (in %)</label>
              	                  <input type="text" class="form-control" placeholder="Enter ..." name="tax_rate" required>
              	                </div>
              	                <div class="form-group">
              	                  <label>Memo</label>
              	                  <textarea class="form-control" rows="3" placeholder="Enter ..." name="memo" required></textarea>
              	                </div>
              	              </form>
              	            </div><!-- /.box-body -->
              	          </div><!-- /.box -->
              	          <div class="box box-success">
                              
                              <div class="box-body pad table-responsive">
                                
                                <table class="table table-bordered text-center">
                                  <tbody><tr>
                                    <th><button class="btn btn-block btn-success" type="submit">DONE</button></th>
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                  </tr>
                                  
                                </tbody></table>
                              </div><!-- /.box -->
                            </div>
                          </div><!--/.col (right) -->
                          </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="tab_2">
                        @if($payment_ac_details == null)
                          <label><strong>Select Any of the Payment Option which You wana recieve ?  </strong></label><br>
                          <input type="radio" value="Stripe" id="stripe" />
                          <label for="stripe">Stripe</label><br>
                          <input type="radio" value="Authorize.net" id="authorize" />
                          <label for="authorize">Authorize.net</label>
                        @else
                          <label class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> You Have Already choose your payment account to change delete that account and save a new one ! </label>
                        @endif
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="tab_3">
                        @if($payment_ac_details)
                          <form action="{{route('delete-account')}}" method="post">
                            <button type="submit" class="btn btn-danger"style="float:right; margin-left: 1%;">Delete</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
                          </form>
                          <button type="submit" id="update" name="update" class="btn btn-warning" style="float:right;">Edit Keys</button>
                        @endif
                        @if($payment_ac_details)
                          <label>Account Name: 
                            @if($payment_ac_details->payment_type == 1 && $payment_ac_details->gateway_status == 1)
                            stripe
                            @elseif ($payment_ac_details->payment_type == 2 && $payment_ac_details->gateway_status == 1)
                              Authorize.net
                            @else
                              Sorry! Some Error occured
                            @endif
                          </label><br>
                          <label>{{ $payment_ac_details->payment_type == 1 && $payment_ac_details->gateway_status == 1 ? 'Public Key' : 'Login ID'}}: <p id="key_one">{{$payment_ac_details->PaymentKeys->key_first}}</p> </label><br>
                          <label>{{ $payment_ac_details->payment_type == 1 && $payment_ac_details->gateway_status == 1 ?
                          'Private Key' : 'Transaction key'}} <p id="key_two">{{$payment_ac_details->PaymentKeys->key_second}}</p></label>
                        @else
                        <label class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> No records found please select a payment option! </label>
                        @endif
                        <div id="error_edit"></div>
                        </div><!-- /.tab-pane -->
                      </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                  </div><!-- /.col -->
            </div>   <!-- /.row -->
          </section><!-- /.content -->
        </form>
      </div><!-- /.content-wrapper -->
@stop
