<!-- jQuery 2.1.4 -->
    <script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
        <script>
    	$(document).ready(function(){
    		$('#counter').val('0');
    		$('#add_item').click(function(){
    			var i = parseInt($('#counter').val())+1;
    			$('#counter').val(i);
    			console.log(i);
    			var baseUrl = "{{url('/')}}";
    			$.ajax({
	                url: baseUrl+"/additems",
	                data: {_token: '{!! csrf_token() !!}' , i: i},
	                type :"post",
	                success: function( data ) {
	                   $('.first').append(data);
	                }
           		});
           		
            });

    	});

    </script>
    <script src="{{url('/')}}/public/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('/')}}/public/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/')}}/public/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/')}}/public/dist/js/demo.js"></script>
