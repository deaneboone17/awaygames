<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    //
    public function users()
    {
    	return $this->belongsToMany(User::class, 'user_preference','preferences_id','user_id');
    }
}
