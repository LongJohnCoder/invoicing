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
<button type="button" onClick="window.location.reload()" class="btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></button><br>
<form action="#" method="POST" id="stripe_form">
  <div class="form-group">
    <label for="public_key">Public Key of Stripe</label>
    <input type="text" class="form-control" id="public_key" placeholder="Enter Public Key" required>
  </div>
  <div class="form-group">
    <label for="private_key">Private Key of Stripe</label>
    <input type="text" class="form-control" id="private" placeholder="Enter Private Key" required>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
</form>