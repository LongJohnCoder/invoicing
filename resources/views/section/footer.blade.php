<!-- jQuery 2.1.4 -->
    <script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
        <script>
    	$(document).ready(function(){
    		$('#counter').val('0');
    		$('#no_of_item').val('1');
            $('#qty').val('0');
            $('#total_price').val('0');
    		$('#add_item').click(function(){
    			var i = parseInt($('#counter').val())+1;
    			$('#counter').val(i);
    			$('#no_of_item').val(i+1);
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
            var value_read_only = new Array();
            $(document).delegate('.click', 'keyup', function(){ 
                var count = $('#counter').val();
                for(var j=0; j<=count; j++)
                {
                    value_read_only= $('input[id="Quantity['+j+']"]').map(function(){
                            return this.value;
                        }).get();
                    /*var total = 0;
                    for(var k=0; k<=value_read_only[0].length; k++)
                    {
                        console.log('hi');
                    } */
                    
                }
                //console.log(total);
                console.log(value_read_only);
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
