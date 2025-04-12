<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    //

    public function teams()
    {

    return $this->belongsTo(Team::class);
	}

	public function departflights()
    {

    return $this->hasMany(Departflight::class);
	}

	public function departconnects()
    {

    return $this->hasMany(Departconnect::class);
	}

	public function returnflights()
    {

    return $this->hasMany(Returnflight::class);
	}

	public function returnconnects()
    {

    return $this->hasMany(Returnconnect::class);
	}

    public function airportName($code)
    {
        $airportName=Airport::select(DB::raw('airports.*'))
            ->where('airports.airportCode','=',$code)
            ->get();

        return $airportName;
    }

}
