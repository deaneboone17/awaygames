<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Returnconnect extends Model
{
    //
    public function returnflights()
    {

    return $this->belongsTo(Returnflight::class, 'tripNum', 'tripNum');
	}

	public function airport()
    {

    return $this->belongsTo(Airport::class);
    }

}
