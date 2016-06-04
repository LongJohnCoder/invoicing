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
        $admin->email="roysubho687@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->admin_type=0;
        $admin->block_status=0;
        $admin->save();

        $admin->email="support@invoicingyou.com";
        $admin->password = bcrypt('123456');
        $admin->admin_type=1;
        $admin->block_status=0;
        $admin->save();
    }
}
