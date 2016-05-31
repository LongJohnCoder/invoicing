<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    public function invoice()
    {
    	return $this->hasMany('App\Model\Invoice', 'id');
    }
    public function admin_details() {
    	return $this->hasOne('App\Model\AdminDetail', 'admin_id');
    }
}
