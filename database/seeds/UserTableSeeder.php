<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_user= Role::where('roleName', 'User')->first();
        $role_admin= Role::where('roleName', 'Admin')->first();
        $role_super= Role::where('roleName', 'SuperAdmin')->first();

    	$user = new User();
    	$user->email= 'timmy.boone@gmail.com';
    	$user->firstname= 'Timothy';
    	$user->lastname= 'Boone';
    	$user->password= bcrypt('user');
    	$user->save();
    	$user->roles()->attach($role_user);

    	$admin = new User();
    	$admin->email= 'bailey.boone@gmail.com';
    	$admin->firstname= 'Bailey';
    	$admin->lastname= 'Boone';
    	$admin->password= bcrypt('user');
    	$admin->save();
    	$admin->roles()->attach($role_admin);

    	$super = new User();
    	$super->email= 'cordell.boone@gmail.com';
    	$super->firstname= 'Cordell';
    	$super->lastname= 'Boone';
    	$super->password= bcrypt('user');
    	$super->save();
    	$super->roles()->attach($role_super);


    }
}
