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
    			//console.log(i);
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


            $('.qtycal').keyup(function(){
                    var counter=parseInt($('#counter').val());
                    var callprice=0;
                    var callqty=0;
                    for(i=0;i<=counter;i++){
                        if(callqty==0){
                            callqty=parseInt($('#Quantity_'+i).val());
                        }
                        else{
                            callqty=callqty+parseInt($('#Quantity_'+i).val());
                        }
                        if(callprice==0){
                            if($('#Price_'+i).val()==""){
                             callprice=0;   
                            }else{
                              callprice=parseFloat($('#Price_'+i).val())*parseInt($('#Quantity_'+i).val());  
                            }
                            
                        }
                        else{
                            if($('#Price_'+i).val()==""){
                                callprice=callprice+0; 
                            }else{
                             callprice=callprice+(parseFloat($('#Price_'+i).val())*parseInt($('#Quantity_'+i).val()));   
                            }
                            
                        }
                    }

                    $('#qty').val(callqty);
                    $('#total_price').val(callprice);
            })

            $('.prical').keyup(function(){
                var counter=parseInt($('#counter').val());
                var callprice=0;
                 for(i=0;i<=counter;i++){
                    if(callprice==0){
                        callprice=parseFloat($('#Price_'+i).val())*parseInt($('#Quantity_'+i).val());
                    }
                    else{
                        callprice=callprice+(parseFloat($('#Price_'+i).val())*parseInt($('#Quantity_'+i).val()));
                    }
                }
                $('#total_price').val(callprice);
            })

    	});

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#stripe').click(function(){
               $.ajax({
                    url: "./load-views",
                    data: {_token: '{!! csrf_token() !!}', view: 'stripe' },
                    type :"post",
                    success: function( data ) {
                       $('#tab_2').html(data);
                    }
                });
            })
            $('#authorize').click(function(){
                $.ajax({
                    url: "./load-views",
                    data: {_token: '{!! csrf_token() !!}', view: 'authorize'},
                    type:"post",
                    success: function(data) {
                        $('#tab_2').html(data);
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
