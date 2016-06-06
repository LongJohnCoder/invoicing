@extends('layout.super-admin-master')
@section('content')
	<style type="text/css">
	  .btn-circle {
	  width: 30px;
	  height: 30px;
	  text-align: center;
	  padding: 6px 0;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	  float: right;
	}
	</style>
	<div class="row">
	  <div class="col-lg-6">
	  	@if(Session::has('saved_details'))
	      	<div class="alert alert-success">
	        	<strong>Success!</strong> {{Session::get('saved_details')}}
	        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	</div>
	    @endif
      	@if(Session::has('failed_details'))
	      	<div class="alert alert-danger">
	        	<strong>Error!</strong> {{Session::get('failed_details')}}
	        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	</div>
      	@endif
	      <section class="panel">
	          <header class="panel-heading">
	              Choose your payment account ?
	          </header>
	          <div class="panel-body">
		          <div class="form-group" id="payment_div">
		               <input type="radio" name="stripe_super" id="stripe_super">Stripe</input>
		               <input type="radio" name="auth_super" id="auth_super">Authorize.Net</input>
		          </div>
		          <div class="form-group" style="display: none;" id="show_stripe">
		          	<button type="button" onclick="window.location.reload()" class="btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></button><br>
		          	 <form action="{{ route('postAccountSuper') }}" method="post">
		          	 <label for="pub_key">Publishable Key</label>
                     <input type="text" class="form-control" id="pub_key" name="pub_key" placeholder="Enter publishable key for stripe" required>
                     <label for="sec_key">Secret Key</label>
                     <input type="text" class="form-control" id="sec_key" name="sec_key" placeholder="Enter secret key for stripe" required><br>
                     <button type="submit" class="btn btn-info" id="submit_stripe" name="btn" value="stripe">Submit</button>
                     <input type="hidden" name="_token" value="{{ Session::token() }}" />
                     </form>
		          </div>
		          <div class="form-group" style="display: none;" id="show_auth">
		          	<button type="button" onclick="window.location.reload()" class="btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></button><br>
		          	 <form action="{{ route('postAccountSuper') }}" method="post">
		          	 <label for="l_id">Login ID</label>
                     <input type="text" class="form-control" id="l_id" name="l_id" placeholder="Enter login id" required>
                     <label for="t_key">Transaction Key</label>
                     <input type="text" class="form-control" id="t_key" name="t_key" placeholder="Enter transaction key" required><br>
                     <button type="submit" class="btn btn-info" id="submit_auth" name="btn" value="authorize">Submit</button>
                     <input type="hidden" name="_token" value="{{ Session::token() }}" />
                     </form>
		          </div>
		          <div class="form-group" style="display: none;" id=show_details>
		          	hello

		          </div>
	          </div>
	      </section>
	  </div>
@endsection