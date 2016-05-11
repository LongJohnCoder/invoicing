<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public $timestamps = true;
	protected $table = 'invoice';
	protected $guarded = array();
	public function invoice_items() {
        return $this->hasMany('App\Model\InvoiceItem', 'invoice_id','invoice_id');
        }
    public function user_details(){
        return $this->hasOne('App\Model\User', 'id','user_id');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin', 'admin_id');
    }
    public function admin_details()
    {
        return $this->belongsTo('App\Model\AdminDetail', 'admin_id', 'admin_id');
    }
    public function admin_payment_maps()
    {
        return $this->belongsTo('App\Model\AdminPaymentMap', 'admin_id', 'admin_id');
    }
    public function payment_keys()
    {
        return $this->hasOne('App\Model\PaymentKeys', 'admin_id', 'admin_id');
    }
}
