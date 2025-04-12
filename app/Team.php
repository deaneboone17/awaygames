<?php

namespace App;
use App\Team;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{
    //


    public function games()
    {

    return $this->hasMany('App\Game');
	}


	public function airport()
    {

    return $this->hasOne(Airport::class);
	}














}
