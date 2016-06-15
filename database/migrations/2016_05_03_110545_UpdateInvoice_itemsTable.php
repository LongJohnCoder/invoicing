<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('invoice_items', function ($table) {
          $table->double('tax_rate',15,2);
          $table->boolean('tax_status');
          $table->double('price_in_tax',15,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('invoice_items', function ($table) {
            $table->dropColumn('tax_rate');
            $table->dropColumn('tax_status');
            $table->dropColumn('price_in_tax');
        });
    }
}
