<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Model\Invoice;                             /* Model name*/
use App\Model\InvoiceItem;                         /* Model name*/
use App\Model\User;                                /* Model name*/
use Illuminate\Support\Facades\Request;
use Input; /* For input */
use Validator;
use Session;
use DB;
use Mail;
use Hash;
use Stripe;

class PaymentController extends Controller
{
    //
    public function checkauthor(){
    	$post_url = "https://test.authorize.net/gateway/transact.dll";

            $post_values = array(
            
            // the API Login ID and Transaction Key must be replaced with valid values
            "x_login"           => "3CGw9R6nR",
            "x_tran_key"        => "6g7N2436BY7njHsJ",
            "x_version"         => "3.1",
            "x_delim_data"      => "TRUE",
            "x_delim_char"      => "|",
            "x_relay_response"  => "FALSE",
            "x_type"            => "AUTH_CAPTURE",
            "x_method"          => "CC",
            "x_trans_id"        => time(),
            "x_card_num"        => "4042760173301988",
            "x_card_code"		=> "1234",
            "x_exp_date"        => '2038-12',                //$card_exp_month.$card_exp_year 
            "x_amount"          => '1',
            "x_description"     => "Miramix Transaction"
            
        );
            $post_string = "";
        foreach( $post_values as $key => $value )
            { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        $post_string = rtrim( $post_string, "& " );
            $request = curl_init($post_url); // initiate curl object
            curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
            curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
            $post_response = curl_exec($request); // execute curl post and store results in $post_response
            
            curl_close ($request); // close curl object
            dd($post_response);
    }
    public function AuthorizedPayment(){
    	//dd(Request::input("cardexpdate"));
$invouce_id=base64_decode(Request::input('inv'));
    	$post_url = "https://test.authorize.net/gateway/transact.dll";
    	//$post_url = "https://secure.authorize.net/gateway/transact.dll";

            $post_values = array(
            
            // the API Login ID and Transaction Key must be replaced with valid values
            "x_login"           => "3CGw9R6nR", //6Z7S5dmfD
            "x_tran_key"        => "6g7N2436BY7njHsJ",//24M24CgbjgV25cAY
            "x_version"         => "3.1",
            "x_delim_data"      => "TRUE",
            "x_delim_char"      => "|",
            "x_relay_response"  => "FALSE",
            "x_type"            => "AUTH_CAPTURE",
            "x_method"          => "CC",
            "x_trans_id"        => time(),
            "x_card_num"        => Request::input("cardnumber"),
            "x_card_code"		=> Request::input("cardcvv"),
            "x_exp_date"        => Request::input("cardexpdate"),                //$card_exp_month.$card_exp_year 
            "x_amount"          => Request::input("tot"),
            "x_description"     => "Miramix Transaction"
            
        );
            $post_string = "";
        foreach( $post_values as $key => $value )
            { $post_string .= "$key=" . urlencode( $value ) . "&"; }
        $post_string = rtrim( $post_string, "& " );
            $request = curl_init($post_url); // initiate curl object
            curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
            curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
            $post_response = curl_exec($request); // execute curl post and store results in $post_response
            
            curl_close ($request); // close curl object
            //dd($post_response);
            $response_array = explode($post_values["x_delim_char"],$post_response);
            if($response_array[0] != 1){

            	return $response_array[3];
            }else{
            $Invoice=Invoice::where('invoice_id', $invouce_id)->first();
			$Invoice->payment_status=1;
			$Invoice->payment_mode=1;
			$Invoice->payment_feedback=json_encode($response_array);
			$Invoice->save();
            	return 1;
            }
        
    }
    public function getView()
    {
        $view_name = Request::input('view');
        if ($view_name == 'stripe') {
            return view('home.paymentviewstripe');
        }
        else
        {
            return view('home.paymentviewauthorize');
        }
    }
}
