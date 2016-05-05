<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
    //
    public $timestamps = true;
	protected $table = 'admin_details';
	protected $guarded = array();
	
    public function invoice()
    {
    	return $this->hasMany('App\Model\Invoice', 'admin_id');
    }
}
