<?php

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $preference_user = new Preference();
    	$preference_user->prefName = 'flightNum';
        $preference_user->prefNum = 2;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'flightNum';
        $preference_user->prefNum = 3;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'flightNum';
        $preference_user->prefNum = 4;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'flightNum';
        $preference_user->prefNum = 5;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'hotelNum';
        $preference_user->prefNum = 2;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'hotelNum';
        $preference_user->prefNum = 3;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'hotelNum';
        $preference_user->prefNum = 4;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'hotelNum';
        $preference_user->prefNum = 5;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'poisNum';
        $preference_user->prefNum = 2;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'poisNum';
        $preference_user->prefNum = 3;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'poisNum';
        $preference_user->prefNum = 4;
    	$preference_user->save();

    	$preference_user = new Preference();
    	$preference_user->prefName = 'poisNum';
        $preference_user->prefNum = 5;
    	$preference_user->save();

    }
}
