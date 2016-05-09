<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AdminPaymentMap extends Model
{
    public function PaymentKeys()
    {
    	return $this->hasOne('App\Model\PaymentKeys', 'admin_id', 'admin_id');
    }
}
