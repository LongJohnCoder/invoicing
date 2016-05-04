@extends('layout/home_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Create Invoice
          </h1>
          
        </section>
        <form action="{{ route('create-invoice') }}" method="POST">
        <!-- Main content -->
          <section class="content">
            <div class="row">
              
              <!-- right column -->
              <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Basic info</h3>
                  </div><!-- /.box-header -->
                  <!-- form start -->
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
                   <!-- <input type="text" id="count" value="fdadfadfadf"/> -->
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
            </div>   <!-- /.row -->
          </section><!-- /.content -->
        </form>
      </div><!-- /.content-wrapper -->
@stop
