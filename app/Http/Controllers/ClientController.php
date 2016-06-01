<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Model\Invoice;                                          
use App\Model\InvoiceItem;                                       
use App\Model\User;                              
use Illuminate\Support\Facades\Request;
use Input;
use Validator;
use Session;
use DB;
use Mail;
use Hash;
use Stripe;
use App\Model\PaymentKeys;
class ClientController extends Controller
{
    //
    public function invoice($id=null){
    	$id=base64_decode($id);
    	$Invoice=Invoice::where('invoice_id', $id)->with('invoice_items','user_details', 'admin_payment_maps', 'admin_details', 'payment_keys')->first();
    	return view('client.invoice',compact('Invoice'),array('title'=>'Invoice System || Invoice'));
    }
    public function payment(){
        $admin_id = Session::get('admin_id.id');
        $keys = PaymentKeys::where('admin_id', '=' , $admin_id)->first();
    	// echo gettype(Request::input('tot'));
    	$invouce_id=base64_decode(Request::input('inv'));
    	$tottal_value=floatval(Request::input('tot'));
    	
    	$stripe = Stripe::make($keys->key_second);
    	$charge = $stripe->charges()->create([
		'source' => Request::input('token.id'),
		'currency' => 'USD',
		'amount'   => $tottal_value,
		]);
    	if($charge['status']=="succeeded"){
    		
			$Invoice=Invoice::where('invoice_id', $invouce_id)->first();
			$Invoice->payment_status=1;
			$Invoice->payment_mode=1;
			$Invoice->payment_feedback=json_encode($charge);
			$Invoice->save();
    	}
    }
    public function invoiveCreated($id=null){
    	return view('home.invoice',compact('id'),array('title'=>'Invoice System || Saved Invoice'));
    }
    public function invoicePrint($id=null){
    	$id=base64_decode($id);
		if (strpos($id, 'DONE') !== false) {
			$id=chop($id,"DONE");
			$Invoice=Invoice::where('invoice_id', $id)->with('invoice_items','user_details')->first();
    		//dd($Invoice);
		}
		else{
			
		}
		return view('client.print',compact('Invoice'),array('title'=>'Invoice Print || Print'));
    }
}
