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


class TripsController extends Controller
{
    
    public function __construct()
    {

      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

        //$tripDurationC = 0;
        //$tripDurationD = 0;

        $connectCount=Departconnect::where('trip_id','=',$tripId)->count();

        //dd($connectCount);

        if($connectCount>0){

        $depart=Departflight::flightShowConnect($trip->departflights_id,$tripId);
        $tripDurationC= Departflight::calculateDurationC($trip->departflights_id,$tripId);
        }

        else{

        $depart=Departflight::flightShowDirect($trip->departflights_id, $tripId);
        $tripDurationD= Departflight::calculateDurationD($trip->departflights_id,$tripId);
        }


        $connectCountR=Returnconnect::where('trip_id','=',$tripId)->count();

        if($connectCountR>0){

        $return = Returnflight::flightShowConnect($trip->returnflights_id, $tripId);
        $tripDurationC=Returnflight::calculateDurationC($trip->returnflights_id,$tripId);
        }
        else{
            
        $return = Returnflight::flightShowDirect($trip->returnflights_id, $tripId);
            
        $tripDurationD=Returnflight::calculateDurationD($trip->returnflights_id,$tripId);
        }
        
        $ticket = Ticket::where('trip_id','=',$tripId)->first();

        //dd($ticket);

        $hotel = Hotel::find($trip->hotels_id);

        $poi = Poi::find($trip->pois_id);

        

        //$hotel = Hotel::find($trip->hotels_id);

        return view('trips.index', compact('depart', 'return','ticket','hotel', 'poi', 'trip','connectCount','connectCountR','tripDurationC','tripDurationD'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find($id);

        //$tripId = $trip->id;

        $connectCount=Departconnect::where('trip_id','=',$id)->count();
        $connectCountR=Returnconnect::where('trip_id','=',$id)->count();

        if($connectCount>0){

        $depart=Departflight::flightShowConnect($trip->departflights_id, $id);
        $tripDurationC= Departflight::calculateDurationC($trip->departflights_id, $id);
        }

        else{

        $depart=Departflight::flightShowDirect($trip->departflights_id, $id);
        $tripDurationD= Departflight::calculateDurationD($trip->departflights_id, $id);            
        }


        if($connectCountR>0){

        $return = Returnflight::flightShowConnect($trip->returnflights_id, $id);
        $tripDurationC=Returnflight::calculateDurationC($trip->returnflights_id, $id);
        }
        else{
            
        $return = Returnflight::flightShowDirect($trip->returnflights_id, $id);
            
        $tripDurationD=Returnflight::calculateDurationD($trip->returnflights_id, $id);
        }

        
        $ticket = Ticket::where('trip_id','=',$id)->first();

        //dd($ticket);

        $hotel = Hotel::find($trip->hotels_id);

        $poi = Poi::find($trip->pois_id);

        return view('trips.show', compact('depart', 'return','ticket','hotel', 'poi','trip','connectCount', 'connectCountR','tripDurationD','tripDurationC'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function saveTrip($id)
    {
        //Update tripActive value to saved "0" and redirect to user dashboard

        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find($id);

        $trip->tripActive = '0';
        $trip->save();

        $request->session()->flash('alert-success', 'Trip was saved!');
        return redirect()->action('DashboardsController@index');

    }



    public function edit($id)
    {
        //

        //Update tripActive value to active "1" and redirect to user dashboard

        $userid = Auth::user()->id;

        $setInactive = Trip::where([['user_id','=', $userid]])->get();

        foreach($setInactive as $tripInactive){

            $tripInactive->tripActive ='0';
            $tripInactive->save();
        }

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find($id);

        $trip->tripActive = '1';
        $trip->save();

        $visitorId= $trip->visitor_id;

        
        $games=Team::find($visitorId)->games;

        return view('teams.show', compact('games'));



    }


    public function share($id)
    {
        //
        //Find user ID of current user
        $userid = Auth::user()->id;

        //Return trip records with game information for display on dashboard
      
        $trips=Trip::leftjoin('games', 'trips.games_id','=','games.id')
            ->select(DB::raw("trips.*, games.gameDate, games.visitingTeam, games.homeTeam"))
            ->where([['user_id','=', $userid]])
            ->where([['trips.id','=', $id]])
            ->first();
                
        
        return view('share.show', compact('trips'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //

        $userid = Auth::user()->id;

        

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find($id);

        if(count($trip)>0){

        $trip->destroy($id);

        $request->session()->flash('alert-success', 'Trip was deleted!');
        return redirect()->action('DashboardsController@index');
    }
    else{

        $request->session()->flash('alert-success', 'Trip was deleted!');
        return redirect()->action('DashboardsController@index');
        }
    }
}
