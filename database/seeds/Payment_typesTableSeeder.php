<?php

use Illuminate\Database\Seeder;

class Payment_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_types = new \App\Model\PaymentTypes();
        $payment_types->payment_name = 'Stripe';
        $payment_types->gateway_type = 'live';
        $payment_types->save();
        $payment_types->payment_name = 'Authorize.net';
        $payment_types->gateway_type = 'live';
        $payment_types->save();
    }
}
