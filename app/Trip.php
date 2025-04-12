<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $guarded = [];



    public function user()
    {

    return $this->belongsTo(User::class);
    }


    public function departflights()
    {

    return $this->hasMany(Departflight::class);
	}

    public function returnflights()
    {

    return $this->hasMany(Returnflight::class);
    }

    public function games()
    {

    return $this->hasOne(Game::class);
    }

    public function hotels()
    {

    return $this->hasOne(Hotel::class);
    }

    public function pois()
    {

    return $this->hasOne(Poi::class);
    }

    public function tickets()
    {

    return $this->hasOne(Ticket::class);
    }

    

}
