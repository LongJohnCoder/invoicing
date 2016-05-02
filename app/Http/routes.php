<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::post('/additems', 'HomeController@addItems');
Route::get('client/invoice/{id}','ClientController@invoice');
Route::post('/invoice-details' , ['uses' => 'HomeController@Invoice','as' => 'create-invoice']);
Route::post('/create_payment','ClientController@payment');
Route::get('invoice-created/{id}','ClientController@invoiveCreated');
Route::any('/all-invoices',['uses' => 'HomeController@allRecords','as' => 'all-invoices']);
Route::get('/print/{id}','ClientController@invoicePrint');


/*
|---------------------------------------------------------------------------------
|Admin Routes
|---------------------------------------------------------------------------------
|All the routes related to admin authentication.
|
*/
Route::get('/admin',['uses' => 'AdminController@getIndex','as' => 'admin-login']);

Route::post('/signin',['uses' => 'AdminController@AdminLogin','as'=>'admin-dashboard']);

Route::any('/dashboard', ['uses' =>'HomeController@Dashboard','middleware' => 'auth','as'=>'dashboard']);

Route::get('/admin/logout', ['uses' => 'AdminController@AdminLogout','as' => 'admin-logout']);



