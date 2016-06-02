<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Admin;

class SuperAdmin extends Controller
{
    public function getProfile() {
    	$admin_info = $this->DynamicDataMasterBlade();
    	return view('super-admin.admin-profile', compact('admin_info'));
    }
    public function postAdminDetails(Request $request) {
        dd($request);
    }

    //use this function DynamicDataMaster blade if you want to use master blade for some dynamic datas
    public function DynamicDataMasterBlade() {
    	$admin_id = Session::get('admin_id');
    	$admin_information = Admin::where('id', $admin_id)->with('admin_details')->first();
    	return $admin_information;
    }
}
