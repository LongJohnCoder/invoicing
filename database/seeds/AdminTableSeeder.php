<?php

use Illuminate\Database\Seeder;
use App\Model\AdminDetail;

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
        if ($admin->save()) {
            $admin_detail = new AdminDetail();
            $admin_detail->admin_id = $admin->id;
            $admin_detail->name = "Subhankar Roy";
            $admin_detail->detail = "Roy";
            $admin_detail->save();
        }


        $admin = new \App\Admin();
        $admin->email="support@invoicingyou.com";
        $admin->password = bcrypt('123456');
        if ($admin->save()) {
            $admin_detail = new AdminDetail();
            $admin_detail->admin_id = $admin->id;
            $admin_detail->name = "Jon Vaughn";
            $admin_detail->detail = "Tier5";
            $admin_detail->save();
        }
    }
}
