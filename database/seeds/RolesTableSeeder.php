<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->title = 'ผู้ดูแลระบบ';
        $admin->slug = 'Admin';
        $admin->save();

        $admin = new Role();
        $admin->title = 'มหาวิทยาลัย';
        $admin->slug = 'University';
        $admin->save();

        $admin = new Role();
        $admin->title = 'ศูนย์จัดการเครือข่าย';
        $admin->slug = 'Manager';
        $admin->save();

        $admin = new Role();
        $admin->title = 'พื้นที่ชุมชน';
        $admin->slug = 'Operator';
        $admin->save();
    }
}
