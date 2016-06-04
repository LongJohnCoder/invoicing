<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{url('/')}}/public/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#register_btn').click(function(){
          var password = $('#pass').val();
          var conf_password = $('#conf_pass').val();
          
          if (password && conf_password) 
          {
            if(password == conf_password) {
              return true;
            }
            else
            {
              $('#error_div').html("password and confirm password didn't match"+'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
              $('#error_div').show();
              return false;
            }
          }
          else
          {
            $('#error_div').html("please fill out password and confirm password"+'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
            $('#error_div').show();
            return false;
          }
        });
      });
    </script>