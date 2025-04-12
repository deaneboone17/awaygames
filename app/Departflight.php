<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Trip;
use DateTime;

class Departflight extends Model
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

	public function departconnect()
    {

    return $this->hasOne(Departconnect::class, 'tripNum');
	}


    //Grabs departing flights with connections from the database
	public static function flightConnect(){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

        
		$flightDisplay=Departflight::leftjoin('departconnects', 'departflights.tripNum','=','departconnects.tripNum')
            ->select(DB::raw("departflights.*, departconnects.trip_id as conTrip_id, departconnects.carrier as conCarrier, departconnects.flightNumber as conFlightNumber, departconnects.originAirport as conOriginAirport, departconnects.destinationAirport as conDestinationAirport, departconnects.departureTime as conDepartureTime, departconnects.arrivalTime as conArrivalTime, departconnects.flightDuration as conFlightDuration, departconnects.saleTotal as conSaleTotal "))
            ->where('departflights.trip_id','=',$tripId)
            ->where('departconnects.trip_id','=',$tripId)
            ->get();


            return $flightDisplay;
	}


    //Grabs departing direct flight information from the database
    public static function flightDirect(){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

        
        $flightDirect=Departflight::select(DB::raw('departflights.*'))
            ->where('departflights.trip_id','=',$tripId)
            ->get();
//var_dump($flightDisplay);
            //dd($flightDirect);
            return $flightDirect;
    }




    //Grabs individual connecting flight information
	public static function flightShowConnect($id, $tripId){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid], ['tripActive','=',1]])->first();

            
		$flightDisplay=Departflight::leftjoin('departconnects', 'departflights.tripNum','=','departconnects.tripNum')
            ->select(DB::raw("departflights.*, departconnects.carrier as conCarrier, departconnects.flightNumber as conFlightNumber, departconnects.originAirport as conOriginAirport, departconnects.destinationAirport as conDestinationAirport, departconnects.departureTime as conDepartureTime, departconnects.arrivalTime as conArrivalTime, departconnects.flightDuration as conFlightDuration, departconnects.saleTotal as conSaleTotal "))
            ->where('departflights.trip_id','=',$tripId)
            ->where('departconnects.trip_id','=',$tripId)
            ->find($id);


            return $flightDisplay;
	}


    //Grabs individual direct flights from the database
    public static function flightShowDirect($id, $tripId){

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        
        $flightDirect=Departflight::select(DB::raw('departflights.*'))
            ->where('departflights.trip_id','=',$tripId)
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

            
    $flightDisplay=Departflight::leftjoin('departconnects', 'departflights.tripNum','=','departconnects.tripNum')
            ->select(DB::raw("departflights.*, departconnects.carrier as conCarrier, departconnects.flightNumber as conFlightNumber, departconnects.originAirport as conOriginAirport, departconnects.destinationAirport as conDestinationAirport, departconnects.departureTime as conDepartureTime, departconnects.arrivalTime as conArrivalTime, departconnects.flightDuration as conFlightDuration, departconnects.saleTotal as conSaleTotal "))
            ->where('departflights.trip_id','=',$tripId)
            ->where('departconnects.trip_id','=',$tripId)
            ->find($id);

            //$test=datetime('g:i a', strtotime($flightDisplay->departureTime));
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
        
        $flightDirect=Departflight::select(DB::raw('departflights.*'))
            ->where('departflights.trip_id','=',$tripId)
            ->find($id);

            //$test=datetime('g:i a', strtotime($flightDisplay->departureTime));
            $departTime = new DateTime($flightDirect->departureTime);

            $arriveTime = new DateTime($flightDirect->arrivalTime);


            $duration = date_diff($arriveTime,$departTime);
            
            $duration = $duration->h." hour(s) ".$duration->i." min(s)";
            
            return compact('duration');


    }

//Calculate duration for departures with connections
    public static function calDurationC()
    {
        //

      $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid], ['tripActive','=',1]])->first();
        $tripId = $trip->id;
        
        $flightDirect=Departflight::select(DB::raw('departflights.*'))
            ->where('departflights.trip_id','=',$tripId)
            ->get();

            //$test=datetime('g:i a', strtotime($flightDisplay->departureTime));
            foreach($flightDirect as $flightTime){

            $departTime = new DateTime($flightDirect->departureTime);

            $arriveTime = new DateTime($flightDirect->arrivalTime);

            $layover = date_diff($departTimeConnect,$arriveTime);

            $layover = $layover->h." hour(s) ".$layover->i." min(s)";

            $duration = date_diff($arriveTime,$departTime);
            
            $duration = $duration->h." hour(s) ".$duration->i." min(s)";
            
            
            }
            return compact('duration','layover');

    }








}
