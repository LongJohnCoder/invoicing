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
		          	 <form action="#" method="post">
		          	 <label for="pub_key">Publishable Key</label>
                     <input type="text" class="form-control" id="pub_key" name="pub_key" placeholder="Enter publishable key for stripe">
                     <label for="sec_key">Secret Key</label>
                     <input type="text" class="form-control" id="sec_key" name="sec_key" placeholder="Enter secret key for stripe"><br>
                     <button type="submit" class="btn btn-info">Submit</button>
                     <input type="hidden" name="_token" value="{{ Session::token() }}" />
                     </form>
		          </div>
		          <div class="form-group" style="display: none;" id="show_auth">
		          	<button type="button" onclick="window.location.reload()" class="btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></button><br>
		          	 <form action="#" method="post">
		          	 <label for="l_id">Login ID</label>
                     <input type="text" class="form-control" id="l_id" name="l_id" placeholder="Enter login id for stripe">
                     <label for="sec_key">Secret Key</label>
                     <input type="text" class="form-control" id="sec_key" name="sec_key" placeholder="Enter secret key for stripe"><br>
                     <button type="submit" class="btn btn-info">Submit</button>
                     <input type="hidden" name="_token" value="{{ Session::token() }}" />
                     </form>
		          </div>
	          </div>
	      </section>
	  </div>
@endsection