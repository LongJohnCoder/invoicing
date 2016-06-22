@extends('layout.super-admin-master')
@section('content')
	<div class="col-lg-6">
		@if(Session::has('pass_succ'))
			<div class="alert alert-success">
	    		<strong>Success!</strong> {{Session::get('pass_succ')}}
	    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    	</div>
    	@endif
    	@if(Session::has('pass_fail'))
			<div class="alert alert-danger">
	    		<strong>Error!</strong> {{Session::get('pass_fail')}}
	    		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    	</div>
    	@endif
    		<div class="alert alert-warning" id="confPassMismatch" style="display: none;">
    			Sorry! Password and confirm password didn't match.
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    		</div>
		<section class="panel">
			<header class="panel-heading">
			  change password
			</header>
			<div class="panel-body">
				<form role="form" action="{{ route('postChangePassword') }}" method="post">
	      			<div class="form-group">
	          			<label for="p_pas">Current Password</label>
	          			<input type="password" class="form-control" id="p_pas" name="p_pas" placeholder="Enter current password" required>
	      			</div>
			        <div class="form-group">
			          	<label for="new_pass">New Password</label>
			          	<input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Enter new password" required>
			        </div>
	      			<div class="form-group">
	          			<label for="conf_new_pass">Confirm New Password</label>
	          			<input type="password" class="form-control" id="conf_new_pass" name="conf_new_pass" placeholder="Confirm password" required>
	      			</div>
	      	
	      			<button type="submit" class="btn btn-info" id="submit_passChange">Submit</button>
	      			<input type="hidden" name="_token" value="{{ Session::token() }}"></input>
				</form>
			</div>
		</section>
	</div>
@endsection