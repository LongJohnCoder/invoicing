<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Model\Invoice;                                         /* Model name*/
use App\Model\InvoiceItem;                                       /* Model name*/
use App\Model\User;                                /* Model name*/

use Illuminate\Support\Facades\Request;
use Input; /* For input */
use Validator;
use Session;
use DB;
use Mail;
use Hash;
use Stripe;
class ClientController extends Controller
{
    //
    public function invoice($id=null){
    	$id=base64_decode($id);
    	$Invoice=Invoice::where('invoice_id', $id)->with('invoice_items','user_details', 'admin_payment_maps')->first();
    	return view('client.invoice',compact('Invoice'),array('title'=>'Invoice System || Invoice'));
    }
    public function payment(){
    	// echo gettype(Request::input('tot'));
    	$invouce_id=base64_decode(Request::input('inv'));
    	$tottal_value=floatval(Request::input('tot'));
    	
    	$stripe = Stripe::make('sk_test_hJDVAuZdTXlVbyBFY1U5TSSh');
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
