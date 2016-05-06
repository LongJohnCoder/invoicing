<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('payment_id');
            $table->string('key_first');
            $table->string('key_second');

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
        Schema::drop('payment_keys');
    }
}
