<?php

use Illuminate\Database\Seeder;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin();
        $admin->email="support@invoicingyou.com";
        $admin->password = Hash::make('123456');
        $admin->admin_type=1;
        $admin->block_status=0;
        $admin->save();
    }
}
