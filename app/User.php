<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','firstname', 'lastname','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function trips()
    {

    return $this->hasMany(Trip::class);
    }


    public function roles()
    {

    return $this->belongsToMany(Role::class, 'user_role','user_id','role_id');
    }

    public function hasAnyRole($roles)
    {

        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }



    public function hasRole($role){
        if($this->roles()->where('roleName','=',$role)->first()){
            return true;
        }
            return false;
    }

    public function preferences()
    {

    return $this->belongsToMany(Preference::class, 'user_preference','user_id','preferences_id');
    }



}
