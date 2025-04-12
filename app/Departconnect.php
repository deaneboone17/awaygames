<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departconnect extends Model
{
    //
    public function departflights()
    {

    return $this->belongsTo(Departflight::class, 'tripNum', 'tripNum');
	}

	public function airport()
    {

    return $this->belongsTo(Airport::class);
    }
}
