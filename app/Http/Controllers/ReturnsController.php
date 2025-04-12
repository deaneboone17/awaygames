<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Departflight;
use App\Returnflight;
use App\Returnconnect;
use App\Trip;

use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;

class ReturnsController extends Controller
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
        //Call method in the Departflight model
        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        $tripId = $trip->id;

        $connectCount = Returnconnect::where([['trip_id','=',$tripId]])
            ->count();

            if($connectCount>0){

              $tripReturn=Returnflight::flightConnect();

            }

            else{

              $tripReturn=Returnflight::flightDirect();
            }


            return view('returns.index', compact('tripReturn', 'connectCount'));



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

    public function show($id)
    {
        //

        //Get id for current authenticated user
        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Update the trip table with the selected game id
        $trip->returnflights_id=$id;
        $trip->save();

        $tripId = $trip->id;

        $connectCount = Returnconnect::where([['trip_id','=',$tripId]])
            ->count();

            if($connectCount>0){

        $return = Returnflight::flightShowConnect($id, $tripId);
        $tripDurationC=Returnflight::calculateDurationC($id, $tripId);
        }
        else{
            
        $return = Returnflight::flightShowDirect($id, $tripId);
            
        $tripDurationD=Returnflight::calculateDurationD($id, $tripId);

        //dd($tripDuration);
        }
            return view('returns.show', compact('return','connectCount','tripDurationD','tripDurationC'));
      
        
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
    
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
