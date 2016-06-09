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

Route::get('/generate-invoice', ['uses' => 'HomeController@index', 'as' => 'index']);
Route::post('/additems', 'HomeController@addItems');
Route::get('client/invoice/{id}','ClientController@invoice');
Route::post('/invoice-created' , ['uses' => 'HomeController@Invoice','as' => 'create-invoice']);
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
Route::get('/login',['uses' => 'AdminController@getIndex','as' => 'admin-login']);
Route::any('/ajax/getweekgraph/', 'AjaxController@getWeekGraph');
Route::post('/signin',['uses' => 'AdminController@AdminLogin','as'=>'admin-dashboard']);
Route::any('/dashboard', ['uses' =>'HomeController@Dashboard','middleware' => 'auth','as'=>'dashboard']);
Route::get('/admin/logout', ['uses' => 'AdminController@AdminLogout','as' => 'admin-logout']);
Route::any('/checkauthorise','PaymentController@checkauthor');
Route::any('/aurthopaymen','PaymentController@AuthorizedPayment');
Route::get('/profile',['uses' => 'HomeController@getProfile','as' => 'profile']);
Route::post('/profilr_update',['uses' => 'HomeController@updateProfile','as' => 'profile-update']);
Route::any('/load-views',['uses' => 'PaymentController@getView','as' => 'getview']);
Route::post('/payment-details', ['uses' => 'PaymentController@postPaymentDetails', 'as' => 'payment-details']);
Route::post('/delete', ['uses' => 'PaymentController@DeleteAccount', 'as' => 'delete-account' ]);
Route::post('/update-keys', ['uses' => 'PaymentController@UpdateKeys', 'as' => 'update-keys']);

/*register routes*/

Route::get('/',['uses' => 'HomeController@getIndex', 'as' => 'front-page']);
Route::get('/register' , ['uses' => 'HomeController@getRegister' , 'as' => 'register']);
Route::post('/register', ['uses' => 'HomeController@postRegister', 'as' => 'postRegister']);
Route::get('/payment-registration/{membership}/{last_inserted_id}', ['uses' => 'HomeController@postMembershipPayment', 'as' => 'post-registration-payment']);
Route::post('/payment-registration', ['uses' => 'HomeController@postPayment', 'as' => 'postPayment']);

/*super admin routes */
Route::post('/block-admin/{id}', ['uses' => 'HomeController@BanUser', 'as' => 'block-admin']);
Route::get('/admin-profile', ['uses' => 'SuperAdmin@getProfile' , 'as' => 'admin-profile']);
Route::post('/post-admin-profile', ['uses' => 'SuperAdmin@postAdminDetails', 'as' => 'postAdminDetails']);
Route::get('/change-password', ['uses' => 'SuperAdmin@getChangePassword', 'as' => 'change-password']);
Route::post('/change-password', ['uses' => 'SuperAdmin@postChangePassword' , 'as' => 'postChangePassword']);
Route::get('/manage-payment-account', ['uses' => 'SuperAdmin@getPaymentManage', 'as' => 'managePaymentAccount']);
Route::post('/manage-payment-account', ['uses' => 'SuperAdmin@postAccountSuper' , 'as' => 'postAccountSuper']);
Route::post('/manage-account', ['uses' => 'SuperAdmin@AccOperations', 'as' => 'acc_operations']);
Route::get('/manage-all-invoices', ['uses' => 'SuperAdmin@getManageAllInvoices', 'as' => 'manageAllInvoices']);
Route::post('/invoice-details', ['uses' => 'SuperAdmin@postInvoiceDetails' , 'as' => 'postInvoiceDetails']);