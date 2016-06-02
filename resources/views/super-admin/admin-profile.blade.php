@extends('layout.super-admin-master')
@section('content')
	<div class="col-lg-6">
		<section class="panel">
      		<header class="panel-heading">
          		Account Details
      		</header>
            <div class="panel-body">
              <form role="form" action="{{ route('postAdminDetails') }}" method="post">
                  <div class="form-group">
                      <label for="exampleInputname1">Name</label>
                      <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter name" required name="name">
                  </div>
                  <div class="form-group">
                      <label for="gender">Gender</label>
                      <input type="text" id="gender" name="gender" placeholder="gender" class="form-control" required>
                  </div>
                 <div class="form-group">
                      <label for="details">Details</label>
                      <textarea name="details" class="form-control" required placeholder="details"></textarea>
                 </div>
                 <div class="form-group">
                 	<label for="membership">Membership</label>
                 	<input type="text" name="membership" class="form-control" readonly></input>
                 </div>
                 <div class="form-group">
                 	<label for="image">Profile picture</label>
                 	<input type="file" name="image" class="form-control" required></input>
                 </div>
                  <button type="submit" class="btn btn-info">Submit</button>
                  <input type="hidden" name="_token" value="{{Session::token()}}"></input>
              </form>

            </div>
		</section>
	</div>
@endsection