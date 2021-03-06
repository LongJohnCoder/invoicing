<!-- jQuery 2.1.4 -->
    <script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#update').click(function(){
                if ($('#update').text() == 'Edit Keys') {
                    $('#update').text('save');
                    $value1 = $('#key_one').text();
                    $value2 = $('#key_two').text();
                    if ($value1 && $value2) 
                    {
                        $('#key_one').html('<input type="text" name="key_one_edit" id="key_one_edit" value="'+$value1+'">');
                        $('#key_two').html('<input type="text" name="key_two_edit" id="key_two_edit" value="'+$value2+'">');
                        
                    }
                }
                else
                {
                    $value_updated1 = $('#key_one_edit').val();
                    $value_updated2 = $('#key_two_edit').val();
                    if ($.trim($value_updated1) && $.trim($value_updated2)){
                        $.ajax({
                            url: "./update-keys",
                            data: {_token:'{!! csrf_token() !!}', key1: $value_updated1, key2: $value_updated2},
                            type:"POST",
                            success: function(data) {
                                if(data == 1) {
                                    $('#ac_name').hide();
                                    $('#key_1').hide();
                                    $('#key_2').hide();
                                    $('#loader').show();
                                    location.reload();
                                }
                                else
                                {
                                    $('#error_edit').append('<div class="alert alert-danger">An Error occured please fill all the fields properly</div>');
                                }
                            }
                        });
                    }
                    else
                    {
                        $('#error_edit').append('<div class="alert alert-danger">An Error occured please fill all the fields properly</div>');
                    }
                    $('#key_one').html($value1);
                    $('#key_two').html($value2);
                    $('#update').text('Edit Keys');
                }
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
