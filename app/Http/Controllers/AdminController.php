<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\AdminDetail;
class AdminController extends Controller
{
	public function getIndex()
	{
		if (Auth::check()) {
			return redirect()->route('dashboard');
		}
		return view('admin.admin-login');
	}
	public function AdminLogin(Request $request)
	{
		$email = $request->email;
		$details = Admin::where('email', '=', $email)->first(); //fetching admin id	
		if ($details) {
			if ($details->block_status == 1) {
			return redirect()->route('admin-login')->with('block', "Sorry! you are blocked by system adminstrator");
			}
			else
			{
				$request->session()->put('admin_id', $details->id); //putting id in session
				$password = $request->password;
				$remember = ($request->remember) == 'on'? true : false;
				if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
					
					return redirect()->route('dashboard');
		            
		        }
		        else
		        {
		        	return redirect()->back()->with(['fail' => 'Error! Wrong email or password']);
		        }
			}
		}
		else
		{
			return redirect()->back()->with(['fail' => 'Error! Wrong user name']);
		}
	}
	public function AdminLogout()
	{
		 Auth::logout();
		 Session::forget('image');
		 return redirect()->route('admin-login');
	}
}