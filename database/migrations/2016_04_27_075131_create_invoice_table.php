<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('invoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('invoice_id');
            $table->double('tax_rate',15,2);
            $table->double('total',15,2);
            $table->double('discount_rate',15,2);
            $table->text('memo');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('invoice');
	}

}
