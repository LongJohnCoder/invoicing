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
<form action="#" method="POST" id="authorize_form">
  <div class="form-group">
    <label for="login_id">Login ID</label>
    <input type="text" class="form-control" id="login_id" placeholder="Enter login id of authorize.net" required>
  </div>
  <div class="form-group">
    <label for="t_key">Transaction key</label>
    <input type="text" class="form-control" id="t_key" placeholder="Enter Private Key" required>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
</form>