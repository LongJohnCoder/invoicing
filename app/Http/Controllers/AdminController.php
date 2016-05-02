<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;
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
		$password = $request->password;
		$token = $request->_token;
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        }
        else
        {
        	return redirect()->back()->with(['fail' => 'Error! Wrong email or password']);
        }
	}
	public function AdminLogout()
	{
		 Auth::logout();
		 return redirect()->route('admin-login');
	}
}