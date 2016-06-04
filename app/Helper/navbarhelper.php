<?php

namespace App\Helper;
use Session;
use DB;
use App\Admin;
use App\Model\AdminDetail;
class navbarhelper
{
	//use this function DynamicDataMaster blade if you want to use master blade for some dynamic datas
    public function DynamicDataMasterBlade() {
    	$admin_id = Session::get('admin_id');
    	$admin_information = Admin::where('id', $admin_id)->with('admin_details')->first();
    	return $admin_information;
    }
}