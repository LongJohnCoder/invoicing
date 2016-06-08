@extends('layout.super-admin-master')
@section('content')
	<div class="col-lg-6">
		<section class="panel">
			    @if(Session::has('update_succ'))
      				<div class="alert alert-success">
      					<strong>Success!</strong> {{Session::get('update_succ')}}
      					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      				</div>
      			@endif

      			@if(Session::has('update_fail'))
      				<div class="alert alert-danger">
      				<strong>Error!</strong> 
      					{{Session::get('update_succ')}}
      					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      				</div>
      			@endif
      		<header class="panel-heading">
          		Account Details
      		</header>
            <div class="panel-body">
	            @if($admin_info->admin_details)
		            <form role="form" action="{{ route('postAdminDetails') }}" method="post" enctype="multipart/form-data">
	                  <div class="form-group">
	                      <label for="exampleInputname1">Name</label>
	                      <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name" name="name" value="{{$admin_info->admin_details->name}}">
	                  </div>
	                 <div class="form-group">
	                      <label for="details">Details</label>
	                      <textarea name="details" class="form-control" placeholder="details">{{$admin_info->admin_details->detail}}</textarea>
	                 </div>
	                 <div class="form-group">
	                 	<label for="membership">Membership</label>
	                 	@if($admin_info->admin_details->membership == 1)
	                 		<input type="text" name="membership" class="form-control" readonly value="Basic"></input>
	                 	@elseif($admin_info->admin_details->membership == 2) 
	                 		<input type="text" name="membership" class="form-control" readonly value="Professional"></input>
	                 	@else
	                 		<input type="text" name="membership" class="form-control" readonly value="Gold"></input>
	                 	@endif
	                 </div>
	                 <div class="form-group">
	                 	<label for="image">Profile picture</label>
	                 	<input type="file" name="image" class="form-control"></input>
	                 </div>
	                 <div class="form-group">
	                 	<img src="{{url('/')}}/public/admin_new/{{$admin_info->admin_details->image}}" height="200px" width="200px">
	                 </div>
	                  <button type="submit" class="btn btn-info">Submit</button>
	                  <input type="hidden" name="_token" value="{{Session::token()}}"></input>
	              </form>
	            @else
		            <form role="form" action="{{ route('postAdminDetails') }}" method="post" enctype="multipart/form-data">
	                  <div class="form-group">
	                      <label for="exampleInputname1">Name</label>
	                      <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name" name="name" value="Name yourself">
	                  </div>
	                 <div class="form-group">
	                      <label for="details">Details</label>
	                      <textarea name="details" class="form-control" placeholder="details">I want to know more about you. please tell me who you are?</textarea>
	                 </div>
	                 <div class="form-group">
	                 	<label for="membership">Membership</label>
	                 		<input type="text" name="membership" class="form-control" readonly value="Gold"></input>
	                 </div>
	                 <div class="form-group">
	                 	<label for="image">Profile picture</label>
	                 	<input type="file" name="image" class="form-control"></input>
	                 </div>
	                 <div class="form-group">
	                 	<img src="{{url('/')}}/public/imgx/logo.png" height="200px" width="200px">
	                 </div>
	                  <button type="submit" class="btn btn-info">Submit</button>
	                  <input type="hidden" name="_token" value="{{Session::token()}}"></input>
	              </form>
	            @endif
              

            </div>
		</section>
	</div>
@endsection