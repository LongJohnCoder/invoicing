<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentKeys extends Model
{
    public function Invoice()
    {
    	return $this->hasMany('App\Model\Invoice', 'admin_id', 'admin_id');
    }
}

