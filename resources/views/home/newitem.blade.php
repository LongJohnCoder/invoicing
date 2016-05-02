<br><br>
<div class="col-xs-3">
	<input type="text" class="form-control" placeholder="Item" id="Item[{{$i}}]" name="Item[{{$i}}]"/>
</div>
<div class="col-xs-4">
	<input type="number" class="form-control qtycal" placeholder="Quantity" id="Quantity_{{$i}}" name="Quantity[{{$i}}]" />
</div>
<div class="col-xs-5">
	<input type="text" class="form-control prical" placeholder="Price" id="Price_{{$i}}" name="Price[{{$i}}]"/>
</div>
<script src="{{url('/')}}/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
        <script>
    	$(document).ready(function(){
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