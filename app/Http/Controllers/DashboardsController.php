<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Trip;
use App\Game;
use User;


class DashboardsController extends Controller
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
        //Find user ID of current user
        $userid = Auth::user()->id;

        //Return trip records with game information for display on dashboard
        
        $tripCheck = DB::table('trips')->where('tripActive','=',1)->where('user_id','=',$userid)->count();

        

        if($tripCheck>0){
            $tripCheck = DB::table('trips')->where('tripActive','=',1)->where('user_id','=',$userid)->delete();
           $trips=Trip::leftjoin('games', 'trips.games_id','=','games.id')
            ->select(DB::raw("trips.*, games.gameDate, games.visitingTeam, games.homeTeam"))
            ->where([['user_id','=', $userid]])
            ->orderBy('trips.created_at','asc')
            ->get(); 

        }
        else{


        $trips=Trip::leftjoin('games', 'trips.games_id','=','games.id')
            ->select(DB::raw("trips.*, games.gameDate, games.visitingTeam, games.homeTeam"))
            ->where([['user_id','=', $userid]])
            ->orderBy('trips.created_at','asc')
            ->get();
        }

        $tripClean = Trip::where([['games_id','=',null],['user_id','=',$userid]])->first();

        if(!is_null($tripClean)){

        $tripClean->delete();
        }
        

                
        
        return view('dashboard.index', compact('trips'));

        
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
    public function show()
    {
        //
        //Find user ID of current user
        $userid = Auth::user()->id;

        //Return trip records with game information for display on dashboard
      
        $trips=Trip::leftjoin('games', 'trips.games_id','=','games.id')
            ->select(DB::raw("trips.*, games.gameDate, games.visitingTeam, games.homeTeam"))
            ->where([['user_id','=', $userid]])
            ->get();
                
        
        return view('dashboard.show', compact('trips'));
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
