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
<script type="text/javascript">
  $(document).ready(function(){
    $('#back_btn').click(function(){
      $('#myModal').modal('show');
      location.reload();
    });
  });
</script>
<button type="button" id="back_btn" class="btn-circle"><i class="fa fa-arrow-left" aria-hidden="true"></i></button><br>
<form action="{{ route('payment-details') }}" method="POST" id="stripe_form">
  <div class="form-group">
    <label for="public_key">Publishable Key of Stripe</label>
    <input type="text" class="form-control" id="public_key" placeholder="Enter Public Key" required name="public_key">
  </div>
  <div class="form-group">
    <label for="private_key">Secret Key of Stripe</label>
    <input type="text" class="form-control" id="private" placeholder="Enter Private Key" required name="private_key">
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    <input type="hidden" name="stripe" value="1">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
  </div>
</form>
<!-- Modal for loader -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div align="center">please wait...</div>
        <div align="center"><img src="{{url('/')}}/public/imgx/loader.gif" id="loader"></div>
      </div>
    </div>
  </div>
</div>