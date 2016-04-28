<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Invoice;                                         /* Model name*/
use App\Model\InvoiceItem;                                       /* Model name*/
use App\Model\User;                                /* Model name*/
class ClientController extends Controller
{
    //
    public function invoice($id=null){
    	
    	$Invoice=Invoice::where('invoice_id', $id)->with('invoice_items','user_details')->first();
    	//dd($Invoice);
    	return view('client.invoice',compact('Invoice'),array('title'=>'Invoice System || Invoice'));
    }
}
