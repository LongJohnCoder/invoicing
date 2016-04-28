<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Invoice;

use App\Model\InvoiceItem;

use App\Model\User;

class HomeController extends Controller
{
    //
    public function index(){
    	return view('home.index',array('title'=>'Invoice System || Create Invoice'));
    }

   public function addItems(Request $request) {
   	//$value = Request::all();
   	//dd($request->i);
   	$i = $request->i;
    return view('home.newitem',array('title'=>'Invoice System || Create Invoice'), compact('i'));
   }
   public function Invoice(Request $request)
   {
   		$name = $request->name; //user name
   		$user_id = time().substr($name,0,5); //user id
   		$email = $request->email; //user email
   		$memo = $request->memo; //user memo
   		$user = new User;
   		$user->user_id = $user_id;
   		$user->name = $name;
   		$user->email =$email;
   		$user->memo = $memo;
   		$user->save(); //stored in user table
   		$invoice_id = date('ymd').rand('000','999');
   		$user_id_invoice = $user->id; //last inserted id
   		$tax_rate = $request->tax_rate;
   		$count = $request->counter; //counter for loop
   		$price_ex_tax = '';
   		$items = '';
   		for ($i=0; $i <= $count; $i++) { 
   			if ($price_ex_tax == '') {
   				$price_ex_tax = $request->Quantity[$i] * $request->Price[$i];
   			}
   			else
   			{
   				$price_ex_tax = $price_ex_tax+ ($request->Quantity[$i] * $request->Price[$i]);
   			}
   			$InvoiceItem = new InvoiceItem;
	   		$InvoiceItem->invoice_id = $user_id;
	   		$InvoiceItem->name = $request->Item[$i];
	   		$InvoiceItem->qty =$request->Quantity[$i];
	   		$InvoiceItem->price = $request->Price[$i];
	   		$InvoiceItem->save(); //stored in user table
   			
   		}

   		$invoice = new Invoice;
   		$invoice->user_id = $user_id_invoice;
   		$invoice->invoice_id = $invoice_id;
   		$invoice->tax_rate = $tax_rate;
   		$invoice->total = $price_ex_tax;
   		$invoice->memo = $memo;
   		$invoice->save(); //stored in invoice table
   }
}
