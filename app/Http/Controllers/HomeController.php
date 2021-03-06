<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Invoice;
use App\Model\InvoiceItem;
use App\Model\User;
use App\Model\AdminDetail;
use App\Admin;
use Mail;
use Illuminate\Support\Facades\Auth;
use Session;
use Image\Image\ImageInterface;
use Imagine\Image\Box;
use App\Model\AdminPaymentMap;
use App\Model\PaymentKeys;
use App\Model\PaymentTypes;

class HomeController extends Controller
{
  public function index(){
    if (Auth::check()) {
      $admin_id = Session::get('admin_id.id');
      $payment_ac_details = AdminPaymentMap::where('admin_id', '=', $admin_id)->with('PaymentKeys')->first();
      //dd($payment_ac_details->payment_type);
      return view('home.index',array('title'=>'Invoice System || Create Invoice'), compact('payment_ac_details'));
      }
      else
      {
        return redirect()->route('admin-login');
      }      
  }
  public function addItems(Request $request) {
      $i = $request->i;
      return view('home.newitem',array('title'=>'Invoice System || Create Invoice'), compact('i'));
  }
  public function Invoice(Request $request){
    //dd($request);
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
        $InvoiceItem->invoice_id = $invoice_id;
        $InvoiceItem->name = $request->Item[$i];
        $InvoiceItem->qty =$request->Quantity[$i];
        $InvoiceItem->price = $request->Price[$i];
        if(isset($request->tax[$i])) {
          $InvoiceItem->tax_status = 1;
          $InvoiceItem->tax_rate = $tax_rate;
          $InvoiceItem->price_in_tax = ($request->Quantity[$i] * $request->Price[$i]+($request->Quantity[$i] * $request->Price[$i] * ($tax_rate/100)));
        }
        else
        {
          $InvoiceItem->tax_status = 0;
          $InvoiceItem->tax_rate = 0.00;
          $InvoiceItem->price_in_tax = ($request->Quantity[$i] * $request->Price[$i]);
        }
        $InvoiceItem->save(); //stored in user table
        
      }
      $invoice = new Invoice;
      $admin_id = Session::get('admin_id.id');
      $invoice->user_id = $user_id_invoice;
      $invoice->invoice_id = $invoice_id;
      $invoice->tax_rate = $tax_rate;
      $invoice->total = $price_ex_tax;
      $invoice->memo = $memo;
      $invoice->admin_id = $admin_id;
      $invoice->save();
        $user_name = $name;
        $user_email = $email;
        $admin_users_email="hello@tier5.us";
        $activateLink = url('/').'/client/invoice/'.base64_encode($invoice_id);
        $sent = Mail::send('email.invoice_link', array('name'=>$user_name,'email'=>$user_email,'activate_link'=>$activateLink), 
        function($message) use ($admin_users_email, $user_email,$user_name)
        {
        $message->from($admin_users_email);
        $message->to($user_email, $user_name)->subject('Invoice From INVOICINGYOU.COM');
        });
      return redirect('/invoice-created/'.base64_encode($invoice_id));
  }
  public function allRecords(){
      $admin_id = Session::get('admin_id.id');
      $user_details = Invoice::where('invoice_id', '!=',0)
      ->where('admin_id', $admin_id)
      ->with('invoice_items', 'user_details')
      ->get();
      return view('home.invoiceDetails',array('title'=>'Invoice System || Create Invoice'), compact('user_details'));
  }
  public function Dashboard(){
    $cax=[100, 25, 80, 81, 56, 55, 40];
    $admin_id = Session::get('admin_id.id');
    $adminImage = AdminDetail::where('admin_id', '=', $admin_id)->first(['image']);
    $adminImagecount = AdminDetail::where('admin_id', '=', $admin_id)->count();
    if ($adminImagecount == 0) {
      Session::put('image', '');
    }
    else {
      Session::put('image', $adminImage->image);
    }
    
    return view('home.dashboard',array('title'=>'Invoice System || Dashboard'), compact('cax'));
  }
  public function getProfile(){
    $gets=Session::get('admin_id.id');
    //print_r($gets->id);
    $Admin=AdminDetail::where('admin_id',$gets)->first();
    $Admincount=AdminDetail::where('admin_id',$gets)->count();
    return view('home.profile',array('title'=>'Invoice System || Profile'), compact('Admin','Admincount', 'image'));
  }
  public function updateProfile(Request $request){

      
      if($request->id!=""){
        $AdminDetail = AdminDetail::where('id',$request->id)->first();
          if($request->images)
          {
            $imgval=$request->images;
            $extension =$imgval->getClientOriginalExtension();
            $destinationPath = 'public/admin_new/';   // upload path
            $fileName = rand(111111111,999999999).'.'.$extension; // renameing image
            $imgval->move($destinationPath, $fileName); // uploading file to given path 
          }
          else
          {
             
            $fileName = $AdminDetail->image;
          }
      }else{

        $AdminDetail = new AdminDetail;
        if($request->images)
          {
            $imgval=$request->images;
            $extension =$imgval->getClientOriginalExtension();
            $destinationPath = 'public/admin_new/';   // upload path
            $fileName = rand(111111111,999999999).'.'.$extension; // renameing image
            $imgval->move($destinationPath, $fileName); // uploading file to given path 
          }
          else
          {
             
            $fileName = '';
          }
      }
      $AdminDetail->admin_id = Session::get('admin_id.id');
      $AdminDetail->name = $request->name;
      $AdminDetail->detail =$request->details;
      $AdminDetail->image =$fileName;
      $AdminDetail->save();
      if ($AdminDetail->save()) {
        Session::put('confirmation', 'Successfully Updated!');
        return redirect()->route('profile');
      }
      else
      {
        Session::put('confirmation', 'Error! updating Failed!');
        return redirect()->route('profile');
      }
      
    
      /*if($request->id!=""){
        if($request->images){
          $imgval=$request->images;
          $extension =$imgval->getClientOriginalExtension();
          $destinationPath = 'public/admin_new/';   // upload path
          $fileName = rand(111111111,999999999).'.'.$extension; // renameing image
          $imgval->move($destinationPath, $fileName); // uploading file to given path
        }
        
      
      $AdminDetail = AdminDetail::where('id',$request->id)->first();
      $AdminDetail->admin_id = Session::get('admin_id.id');
      $AdminDetail->name = $request->name;
      $AdminDetail->detail =$request->details;
      if($request->images){
        $AdminDetail->image =$fileName;
      }
      
      $AdminDetail->save();
      }else{
        //no image is there
        echo "yes";
        $imgval=$request->images;
        $extension =$imgval->getClientOriginalExtension();
        $destinationPath = 'public/admin_new/';   // upload path
        //$extension =$imgval->getClientOriginalExtension(); // getting image extension
        $fileName = rand(111111111,999999999).'.'.$extension; // renameing image
        $imgval->move($destinationPath, $fileName); // uploading file to given path
        $AdminDetail = new AdminDetail;
        $AdminDetail->admin_id = Session::get('admin_id.id');
        $AdminDetail->name = $request->name;
        $AdminDetail->detail =$request->details;
        $AdminDetail->image =$fileName;
        $AdminDetail->save(); 
      }*/
      
  }
}