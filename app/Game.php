<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //

    public function team()
    {

    return $this->belongsTo(Team::class);
	}

	public function trip()
    {

    return $this->belongsTo(Trip::class);
	}
}
