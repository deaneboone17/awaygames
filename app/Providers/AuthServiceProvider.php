<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Role;
use App\User;
use App\Preference;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        User::created(function ($user) {

        $user->roles()->attach(Role::where('roleName', 'User')->first());
        $user->preferences()->attach(Preference::where('prefName','flightNum')->where('prefNum', 3)->first());
        $user->preferences()->attach(Preference::where('prefName','hotelNum')->where('prefNum', 3)->first());
        $user->preferences()->attach(Preference::where('prefName','poiNum')->where('prefNum', 3)->first());

        });

        //
    }
}
