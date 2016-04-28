<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    //
    public $timestamps = true;
	protected $table = 'invoice_items';
	protected $guarded = array();
}
