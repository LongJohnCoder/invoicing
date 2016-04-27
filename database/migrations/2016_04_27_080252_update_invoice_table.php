<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('invoice', function ($table) {
			$table->integer('payment_status')->default(0)->after('memo');
			$table->integer('payment_mode')->default(0)->after('payment_status');
			$table->text('payment_feedback')->after('payment_mode');
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
		Schema::table('invoice', function ($table) {
			$table->dropColumn('payment_status');
			$table->dropColumn('payment_mode');
			$table->dropColumn('payment_feedback');
		});
	}

}
