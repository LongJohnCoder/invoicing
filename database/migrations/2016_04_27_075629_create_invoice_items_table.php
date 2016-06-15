<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_id');
            $table->string('name');
            $table->double('qty',15,2);
            $table->double('price',15,2);
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
