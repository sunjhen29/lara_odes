<?php

use Illuminate\Database\Seeder;

use App\Admin;

use App\User;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@test.com';
        $admin->password = bcrypt('1234');
        $admin->save();
    }
}
