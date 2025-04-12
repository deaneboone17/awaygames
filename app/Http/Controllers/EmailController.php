<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Departflight;
use App\Returnflight;
use App\Departconnect;
use App\Returnconnect;
use App\Hotel;
use App\Ticket;
use App\Trip;
use App\Poi;
use App\Team;
use App\Mail\ShareTrip;
use Validator;

class EmailController extends Controller
{
    //

 public function store(Request $request){  



        //Call all form data and run through the Laravel Validator class.  Validates that all input is an email. 

        $validator = Validator::make($request->all(), [
            'email'=>'required|email',

            ]);

        
        //Convert the string from the email form element into an Array.  The Mailable to method takes an array of email addresses

        $recipient=explode(",",$request->email);

        $tripId=$request->tripId;//Stored trip ID as a hidden form value for use in the method

         
 		$sender = Auth::user(); 

        $userid = Auth::user()->id;

        $tripDurationD = 0;
        $tripDurationC = 0;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find($tripId);

        

        $connectCount=Departconnect::where('trip_id','=',$tripId)->count();
        $connectCountR=Returnconnect::where('trip_id','=',$tripId)->count();

        if($connectCount>0){

        $depart=Departflight::flightShowConnect($trip->departflights_id, $tripId);
        $tripDurationC= Departflight::calculateDurationC($trip->departflights_id, $tripId);
        }

        else{

        $depart=Departflight::flightShowDirect($trip->departflights_id, $tripId);
        $tripDurationD= Departflight::calculateDurationD($trip->departflights_id, $tripId);            
        }


        if($connectCountR>0){

        $return = Returnflight::flightShowConnect($trip->returnflights_id, $tripId);
        $tripDurationC=Returnflight::calculateDurationC($trip->returnflights_id, $tripId);
        }
        else{
            
        $return = Returnflight::flightShowDirect($trip->returnflights_id, $tripId);
            
        $tripDurationD=Returnflight::calculateDurationD($trip->returnflights_id, $tripId);
        }

        
        $ticket = Ticket::where('trip_id','=',$tripId)->first();

        //dd($ticket);

        $hotel = Hotel::find($trip->hotels_id);

        $poi = Poi::find($trip->pois_id);

           
        
        
        //Creates a new instance of the ShareTrip object and passes the trip information to the email view

		\Mail::to($recipient)->send(new ShareTrip($depart,$return,$ticket,$hotel,$poi,$trip,$sender,$connectCount,$connectCountR,$tripDurationD,$tripDurationC));


		return redirect('dashboard');
}

}
