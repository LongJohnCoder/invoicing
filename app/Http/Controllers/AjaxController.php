<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Invoice;

use App\Model\InvoiceItem;

use App\Model\User;

use Mail;
use Session;

class AjaxController extends Controller
{
    //
    public function getWeekGraph(){

    	$sevendayearly=date("Y-m-d", strtotime('-7 days'));
    	$todaysdate=date("Y-m-d");
        $admin_id = Session::get('admin_id.id');
    	$user_details = Invoice::where('created_at','>=',$sevendayearly)->where('created_at','<=',$todaysdate)->where('admin_id', $admin_id)->with('invoice_items', 'user_details')->orderBy('created_at', 'desc')->get();
    	//dd($user_details);
    	$inc='1 days';
    	$per=array();
    	for($i=0;$i<8;$i++){
    		//echo $i;
    		$ordate=date('Y-m-d', strtotime('+'.$i.' days', strtotime($sevendayearly)));
    		$sum =Invoice::where('admin_id', $admin_id)->whereDate('created_at', '=', $ordate)->get();
    		$sumc =Invoice::where('admin_id', $admin_id)->whereDate('created_at', '=', $ordate)->where('payment_status','=',1)->get();
    		//dd($sum);
			$per[$ordate]['tot']=0;
			$per[$ordate]['ctot']=0;
    		foreach ($sum as  $Invoice) {
    			if($per[$ordate]['tot']==0){
    				$per[$ordate]['tot']=$Invoice->total+($Invoice->total*($Invoice->tax_rate/100));
    			}
    			else{
    				$per[$ordate]['tot']=$per[$ordate]['tot']+$Invoice->total+($Invoice->total*($Invoice->tax_rate/100));
    			}
    		}
    		foreach ($sumc as  $Invoice) {
    			if($per[$ordate]['ctot']==0){
    				$per[$ordate]['ctot']=$Invoice->total+($Invoice->total*($Invoice->tax_rate/100));
    			}
    			else{
    				$per[$ordate]['ctot']=$per[$ordate]['ctot']+$Invoice->total+($Invoice->total*($Invoice->tax_rate/100));
    			}
    		}

    	}
    	$result=array();
    	foreach ($per as $key => $raw) {
    		$result['intvalu'][]=$key;
    		$result['totvalu'][]=$raw['tot'];
    		$result['recvalu'][]=$raw['ctot'];
    	}
    	return json_encode($result);
    }
}
