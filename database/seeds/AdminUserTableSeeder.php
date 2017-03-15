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
        $admin->name = 'Sunday Doctolero';
        $admin->email = 'sunjhen29@yahoo.com';
        $admin->password = bcrypt('forever');
        $admin->save();
        
        $admin = new Admin();
        $admin->name = 'Michelle Ong';
        $admin->email = 'mijaeya@gmail.com';
        $admin->password = bcrypt('707');
        $admin->save();
    
        $user = new User();
        $user->name = 'sunjhen29';
        $user->firstname = 'Sunday';
        $user->lastname = 'Doctolero';
        $user->email = 'sunjhen29@yahoo.com';
        $user->access_level = 9;
        $user->password = bcrypt('forever');
        $user->save();
        
        $user = new User();
        $user->name = 'mijaeya';
        $user->firstname = 'Michele';
        $user->lastname = 'Ong';
        $user->email = 'mijaeya@gmail.com';
        $user->access_level = 9;
        $user->password = bcrypt('707');
        $user->save();
    
    }
}
