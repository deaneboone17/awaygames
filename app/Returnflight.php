<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Trip;
use DateTime;


class Returnflight extends Model
{
    //

    public function trip()
    {

    return $this->belongsTo(Trip::class);
	}

    public function airport()
    {

    return $this->belongsTo(Airport::class);
    }

	public function returnconnect()
    {

    return $this->hasOne(Returnconnect::class, 'tripNum');
	}


    
	public static function flightConnect(){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

		$flightDisplay=Returnflight::leftjoin('returnconnects', 'returnflights.tripNum','=','returnconnects.tripNum')
            ->select(DB::raw("returnflights.*, returnconnects.carrier as conCarrier, returnconnects.flightNumber as conFlightNumber, returnconnects.originAirport as conOriginAirport, returnconnects.destinationAirport as conDestinationAirport, returnconnects.departureTime as conDepartureTime, returnconnects.arrivalTime as conArrivalTime, returnconnects.flightDuration as conFlightDuration, returnconnects.saleTotal as conSaleTotal "))
            ->where('returnflights.trip_id','=',$tripId)
            ->where('returnconnects.trip_id','=',$tripId)
            ->get();

            return $flightDisplay;
	}



    public static function flightDirect(){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

        
        $flightDirect=Returnflight::select(DB::raw('returnflights.*'))
            ->where('returnflights.trip_id','=',$tripId)
            ->get();
//var_dump($flightDisplay);
            //dd($flightDisplay);

            return $flightDirect;
    }





	public static function flightShowConnect($id, $tripId){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $flightDisplay=Returnflight::leftjoin('returnconnects', 'returnflights.tripNum','=','returnconnects.tripNum')
            ->select(DB::raw("returnflights.*, returnconnects.carrier as conCarrier, returnconnects.flightNumber as conFlightNumber, returnconnects.originAirport as conOriginAirport, returnconnects.destinationAirport as conDestinationAirport, returnconnects.departureTime as conDepartureTime, returnconnects.arrivalTime as conArrivalTime, returnconnects.flightDuration as conFlightDuration, returnconnects.saleTotal as conSaleTotal "))
                ->where('returnflights.trip_id','=',$tripId)
                ->where('returnconnects.trip_id','=',$tripId)
            ->find($id);

            return $flightDisplay;
	}



    public static function flightShowDirect($id, $tripId){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        
        $flightDirect=Returnflight::select(DB::raw('returnflights.*'))
            ->where('returnflights.trip_id','=',$tripId)
            ->find($id);

            //dd($flightDirect);

            return $flightDirect;
    }



//Calculate the flight duration and layover times
    public static function calculateDurationC($id, $tripId)
    {
        //

      $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid], ['tripActive','=',1]])->first();

            
    $flightDisplay=Returnflight::leftjoin('returnconnects', 'returnflights.tripNum','=','returnconnects.tripNum')
            ->select(DB::raw("returnflights.*, returnconnects.carrier as conCarrier, returnconnects.flightNumber as conFlightNumber, returnconnects.originAirport as conOriginAirport, returnconnects.destinationAirport as conDestinationAirport, returnconnects.departureTime as conDepartureTime, returnconnects.arrivalTime as conArrivalTime, returnconnects.flightDuration as conFlightDuration, returnconnects.saleTotal as conSaleTotal "))
            ->where('returnflights.trip_id','=',$tripId)
            ->where('returnconnects.trip_id','=',$tripId)
            ->find($id);

            //$test=datetime('g:i a', strtotime($flightDisplay->returnureTime));
            $departTime = new DateTime($flightDisplay->departureTime);

           
            $arriveTimeConnect = new DateTime($flightDisplay->conArrivalTime);
 
            $departTimeConnect = new DateTime($flightDisplay->conDepartureTime);

            $arriveTime = new DateTime($flightDisplay->arrivalTime);


            $duration = date_diff($arriveTimeConnect,$departTime);
            $layover = date_diff($departTimeConnect,$arriveTime);

            $layover = $layover->h." hour(s) ".$layover->i." min(s)";
            $duration = $duration->h." hour(s) ".$duration->i." min(s)";
            
            return compact('layover','duration');


    }


    //Calculate the flight duration and layover times
    public static function calculateDurationD($id, $tripId)
    {
        //

      $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid], ['tripActive','=',1]])->first();
        
        $flightDirect=Returnflight::select(DB::raw('returnflights.*'))
            ->where('returnflights.trip_id','=',$tripId)
            ->find($id);

            //$test=datetime('g:i a', strtotime($flightDisplay->departureTime));
            $departTime = new DateTime($flightDirect->departureTime);

            $arriveTime = new DateTime($flightDirect->arrivalTime);


            $duration = date_diff($arriveTime,$departTime);
            
            $duration = $duration->h." hour(s) ".$duration->i." min(s)";
            
            return compact('duration');







}








}
