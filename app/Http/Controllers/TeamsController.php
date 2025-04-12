<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Game;
use App\Trip;



class TeamsController extends Controller
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
        $trip = Trip::where([['user_id','=', $userid]])->count();

        if($trip>0){

        $setInactive = Trip::where([['user_id','=', $userid]])->get();

        foreach($setInactive as $tripInactive){

            $tripInactive->tripActive ='0';
            $tripInactive->save();

        }

    }

        Trip::create([
            'user_id' =>auth()->id()
            ]);

    


        $teams=Team::all();
        return view('teams.index', compact('teams'));
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
        //Display selected team away schedule after clicking team name

        $games=Team::find($id)->games;
        
        //Get id for current authenticated user
        $userid = Auth::user()->id;

        //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Update the trip table with the selected team id
        $trip->visitor_id=$id;
        $trip->save();

        return view('teams.show', compact('games'));
    }

    /**
     * Show the form for editing the specified resource.
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
