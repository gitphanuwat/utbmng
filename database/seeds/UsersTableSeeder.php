<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = new User();
      $admin->role_id = '1';
      $admin->headname = 'mr.';
      $admin->firstname = 'Admin';
      $admin->lastname = 'LRD';
      $admin->permit = '1';
      $admin->email = 'admin@lrd.com';
      $admin->password = Hash::make('admin');
      $admin->save();
    }
}
