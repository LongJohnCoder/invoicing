<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Admin;
use App\Model\AdminDetail;
use App\Helper\navbarhelper;
use Hash;
use App\Model\PaymentKeys;
use App\Model\PaymentTypes;
use App\Model\AdminPaymentMap;

class SuperAdmin extends Controller
{
    public function getProfile() {
        $obj = new navbarhelper();
    	$admin_info = $obj->DynamicDataMasterBlade();
    	return view('super-admin.admin-profile', compact('admin_info'));
    }
    public function postAdminDetails(Request $request) {
        $name = $request->name;
       // $gender = $request->gender;
        $details = $request->details;
        $membership = 3;
        $admin_id = Session::get('admin_id');
        //image storing
        if ($request->image) {
            $imgval=$request->image;
            //dd($imgval);
            $extension =$imgval->getClientOriginalExtension();
            $destinationPath = 'public/admin_new/';   // upload path
            $fileName = rand(111111111,999999999).'.'.$extension; // renameing image
            $imgval->move($destinationPath, $fileName); // uploading file to given path 
        }
        else {
            $check_image = AdminDetail::where('admin_id' , $admin_id)->first();
            if ($check_image) {
                $fileName = $check_image->image;
            }
            else
            {
                $fileName = '';
            }
        }
        $image = $fileName;
        $UpdateDetails = AdminDetail::where('admin_id' , $admin_id)->first();
        if ($UpdateDetails) {
            $UpdateDetails->name = $name;
            //$UpdateDetails->gender = $gender;
            $UpdateDetails->detail = $details;
            $UpdateDetails->image = $image;
            $UpdateDetails->membership = $membership;
            if ($UpdateDetails->save()) {
                return redirect()->route('admin-profile')->with('update_succ', 'Your information has successfully updated!');
            }
            else
            {
                return redirect()->route('admin-profile')->with('update_fail', "Sorry! can't update your information right now.");
            }
        }
        else
        {
            $insert_details = new AdminDetail();
            $insert_details->admin_id = $admin_id;
            $insert_details->name = $name;
            $insert_details->detail = $details;
            $insert_details->image = $image;
            //$insert_details->gender = $gender;
            $insert_details->membership = $membership;
            if ($insert_details->save()) {
                return redirect()->route('admin-profile')->with('update_succ', 'Your information has successfully updated!');
            }
            else
            {
               return redirect()->route('admin-profile')->with('update_fail', "Sorry! can't update your information right now."); 
            }
        }     
    }
    public function getChangePassword() {
        $obj = new navbarhelper();
        $admin_info = $obj->DynamicDataMasterBlade();
        return view('super-admin.change-password',compact('admin_info'));
    }
    public function postChangePassword(Request $request) {
        $admin_id = Session::get('admin_id');
        $search_admin = Admin::find($admin_id);
        if (Hash::check($request->p_pas, $search_admin->password)) {
            $search_admin->password = Hash::make($request->conf_new_pass);
            if ($search_admin->save()) {
                return redirect()->route('change-password')->with('pass_succ', 'Password Updated Successfully!');
            }
            else
            {
               return redirect()->route('change-password')->with('pass_fail', 'Some error occured please contact site adminstrator!');
            }
        }
        else
        {
            return redirect()->route('change-password')->with('pass_fail', 'Please enter your previous password correctly!');
        }
    }
    public function getPaymentManage() {
        $obj = new navbarhelper();
        $admin_info = $obj->DynamicDataMasterBlade();
        $admin_id = Session::get('admin_id');
        $payment_status = PaymentKeys::where('admin_id', $admin_id)->first();
        return view('super-admin.manage-payment', compact('admin_info', 'payment_status'));
    }
    public function postAccountSuper(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($request->btn == 'stripe') {
            $payment_keys = new PaymentKeys();
            $payment_keys->admin_id = $admin_id;
            $payment_keys->payment_id = 1; //1 for stripe 2 for authorize
            $payment_keys->key_first = $request->pub_key;
            $payment_keys->key_second = $request->sec_key;
            if ($payment_keys->save()) {
                $admin_payment_map = new AdminPaymentMap();
                $admin_payment_map->admin_id = $admin_id;
                $admin_payment_map->payment_type = 1; //1 for stripe 2 for authorize
                $admin_payment_map->gateway_status =1; //1 for active or not
                if ($admin_payment_map->save()) {
                    return redirect()->route('managePaymentAccount')->with('saved_details', 'Your account details has successfully saved.');
                }
                else
                {
                   return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not save your details please try again later');
                }
                
            }
            else 
            {
                return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not save your details please try again later');
            }
        } 
        else 
        {
            $payment_keys = new PaymentKeys();
            $payment_keys->admin_id = $admin_id;
            $payment_keys->payment_id = 2; //1 for stripe 2 for authorize
            $payment_keys->key_first = $request->l_id;
            $payment_keys->key_second = $request->t_key;
            if ($payment_keys->save()) {
                $admin_payment_map = new AdminPaymentMap();
                $admin_payment_map->admin_id = $admin_id;
                $admin_payment_map->payment_type = 2; //1 for stripe 2 for authorize
                $admin_payment_map->gateway_status =1; //1 for active or not
                if ($admin_payment_map->save()) {
                    return redirect()->route('managePaymentAccount')->with('saved_details', 'Your account details has successfully saved.');
                }
                else
                {
                    return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not save your details please try again later');
                }
            }
            else
            {
                return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not save your details please try again later');
            }
        }
    }
    public function AccOperations(Request $request) {
        $admin_id = Session::get('admin_id');
        if ($request->btn == 'update') {
            $search_admin = PaymentKeys::where('admin_id', $admin_id)->first();
            if($search_admin) {
                $search_admin->key_first = $request->key_one;
                $search_admin->key_second = $request->key_two;
                if ($search_admin->save()) {
                    return redirect()->route('managePaymentAccount')->with('saved_details', 'Your account details has successfully updated.');
                }
            }
            else
            {
                return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not update your details please try again later');
            }
        }
        else
        {
            $delete_keys = PaymentKeys::where('admin_id', $admin_id)->delete();
            if ($delete_keys) {
                $delete_map = AdminPaymentMap::where('admin_id', $admin_id)->delete();
                if ($delete_map) {
                    return redirect()->route('managePaymentAccount')->with('saved_details', 'Your account details has successfully deleted.');
                }
                else
                {
                    return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not delete your details please try again later');
                }
            }
            else
            {
                return redirect()->route('managePaymentAccount')->with('failed_details', 'Could not delete your details please try again later');
            }
        }
    }
}