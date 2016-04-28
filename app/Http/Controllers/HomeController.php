<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
}
