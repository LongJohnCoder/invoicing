@extends('layout.super-admin-master')
@section('content')
     <section class="content">
      	@if(Session::has('block_status'))
        	<div class="alert alert-success">
        		<strong>Success!</strong> {{Session::get('block_status')}}
        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	</div>
        @elseif(Session::has('block_status_er'))
        	<div class="alert alert-danger">
        		<strong>Error!</strong> {{Session::get('block_status_er')}}
        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	</div>
        @else
        @endif
	 	<div class="row" style="margin-bottom:5px;">
            <div class="col-md-4">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                    <div class="sm-st-info">
                    	@if(count($all_invoice_details) > 0)
                    		<span>{{count($all_invoice_details)}}</span>
                        	Total Invoices
                    	@else
                    		<span>There is no record in our database</span>
                    	@endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                    <div class="sm-st-info">
                        @if(count($all_admin_details) > 0)
                    		<span>{{count($all_admin_details)}}</span>
                        	Total Admins
                    	@else
                    		<span>There is no record in our database</span>
                    	@endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sm-st clearfix">
                    <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                    <div class="sm-st-info">
                    <div style="display: none;">
	                    @if($all_invoice_details)
	                    	{{$total_price = 0}}
	                    	@foreach($all_invoice_details as $invoice_details)
	                    		{{$total_price += $invoice_details->total}}
	                    	@endforeach
	                    @else
	                    	no invoice has been yet created by any admin
	                    @endif
	                </div>
                        <span>{{floatval($total_price)!=null || floatval($total_price) ? floatval($total_price) : 0.00}}</span>
                        Total transactions
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                      <header class="panel-heading">
                          Admin Manager
                      </header>
                      <div class="panel-body table-responsive">
                      	<table class="table table-hover">
                        	<thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <!-- <th>Client</th> -->
                                  <th>Account Type</th>
                                  <!-- <th>Price</th> -->
                                  <th>Invoice Created</th>
                                  <th>Block</th>
                                </tr>
                            </thead>
                            <tbody>
                            	 @if(count($all_admin_details) > 0 && $all_admin_details!=null)
                            	 	@foreach($all_admin_details as $details)
	                            	 	<tr>
	                            	 		<td>{{$details->id}}</td>
	                            	 		<td>{{$details->admin_details->name}}</td>
	                            	 		<td>{{$details->email}}</td>
	                            	 		<td>
		                              			@if($details->admin_details->membership == 1)
		                              				Basic
		                              			@elseif($details->admin_details->membership == 2)
		                              				Professional
		                              			@else
		                              				Gold
		                              			@endif
		                              		</td>
		                              		<td>
		                              			<div style="display: none;">
			                              			{{$created_inv = 0}}
			                              			@foreach($all_invoice_details as $invoice)
			                              				{{$invoice->admin_id == $details->id ? $created_inv+=1:0}}
			                              			@endforeach
		                              			</div>
		                              			{{$created_inv}}
		                              		</td>
		                              		<td>
		                              			<form action="{{route('block-admin', ['id' => base64_encode($details->id)])}}" method="POST">
		                              				@if($details->block_status == 1)
		                              				<button type="submit" class="btn btn-primary">Unblock</button>
		                              				@else
		                              				<button type="submit" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button>
		                              				@endif
		                              				<input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                              			</form>
		                              			
		                              		</td>
	                            	 	</tr>
                            	 	
                            	 	@endforeach
                            	 @else
                            	 <td><div class="alert alert-warning">No Records Found!</div></td>
                            	 @endif
                            </tbody>
                        </table>
                    </div>
                </section>


          </div><!--end col-6 -->

                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Graph
                                </header>

                                <ul class="list-group teammates">
                                	graph should be here
                                </ul>
                                <div class="panel-footer bg-white">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                  Todo list
                            </header>
                            <div class="panel-body">

                              <div class="task-content">

                                  <ul class="task-list">
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey list-child"/>
                                              <!-- <input type="checkbox" class="square-grey"/> -->
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Director is Modern Dashboard</span>
                                              <span class="label label-success">2 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Fully Responsive & Bootstrap 3.0.2 Compatible</span>
                                              <span class="label label-danger">Done</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Latest Design Concept</span>
                                              <span class="label label-warning">Company</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Write well documentation for this theme</span>
                                              <span class="label label-primary">3 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Don't bother to download this Dashbord</span>
                                              <span class="label label-inverse">Now</span>
                                              <div class="pull-right">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Give feedback for the template</span>
                                              <span class="label label-success">2 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                              <input type="checkbox" class="flat-grey"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Tell your friends about this admin template</span>
                                              <span class="label label-danger">Now</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>

                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
                                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- row end -->
                </section><!-- /.content -->          
@endsection