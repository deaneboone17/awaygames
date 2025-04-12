<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$role_user = new Role();
    	$role_user->roleName = 'User';
    	$role_user->save();

    	$role_admin = new Role();
    	$role_admin->roleName = 'Admin';
    	$role_admin->save();

    	$role_super = new Role();
    	$role_super->roleName = 'SuperAdmin';
    	$role_super->save();
    }
}
