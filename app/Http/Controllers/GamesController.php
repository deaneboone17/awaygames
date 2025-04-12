<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Game;
use App\Airport;
use App\Team;
use App\Trip;
//

class GamesController extends Controller
{
    
	public function __construct()
    {

      $this->middleware('auth');
    }
    //

	public function index()
	{
		$games = Game::all();

		return view('games.index', compact('games'));
	}



	public function show($id)
	{
		//Pull the airport information from the Airport table and prepend a default for display in the drop down
		$airports=Airport::orderBy('airportName')->pluck('airportCode', 'airportName');
		$airports->prepend("",'Select Departure Airport');

		//Display the information for the selected game
		$games = Game::find($id);

		//Get id for current authenticated user
        $userid = Auth::user()->id;

		//Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Update the trip table with the selected game id
        $trip->games_id=$id;
        $trip->save();

		
		//Grab the home team id from the games record and use it to find the destination airport

		$teamid=$games->home_id;
		$arriveAirport = Team::find($teamid)->airport->airportCode;
		
		//$img = $games->team_id;
		//dd($img);
		
	    return view('games.show', compact('games', 'airports', 'arriveAirport'));
	}

















}
