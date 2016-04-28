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
