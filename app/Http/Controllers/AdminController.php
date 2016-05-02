<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Auth;
class AdminController extends Controller
{
	public function getIndex()
	{
		return view('admin.admin-login');
	}
	public function AdminLogin(Request $request)
	{
		$email = $request->email;
		$password = $request->password;
		$token = $request->_token;
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return view('admin.admin-dashboard');
        }
        else
        {
        	return redirect()->back()->with(['fail' => 'Error! Wrong email or password']);
        }
	}
}