<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    //
	public function trip()
    {

    return $this->belongsTo(Trip::class);
    }

}
