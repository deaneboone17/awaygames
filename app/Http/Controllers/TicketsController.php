<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Trip;
use App\Game;
use App\Team;

class TicketsController extends Controller
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
        //Send GET request to SeatGeek API

        try{
        //Find user ID of current user
        $userid = Auth::user()->id;

        //Find the active trip record in the trips table and return the games_id

        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $games_id = $trip->games_id;

        $games = Game::find($games_id);

        //Find the id for the home and away teams

        $home_id=$games->home_id;
        $team_id=$games->team_id;

        //Find the SeatGeek performer id for submission to the SeatGeek API

        $team =Team::find($home_id);
        $home = $team->seatGeekId;

        $visitTeam =Team::find($team_id);
        $away = $visitTeam->seatGeekId;


        //Make call to the SeatGeek API

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.seatgeek.com/2/']);
        $response = $client->get("https://api.seatgeek.com/2/events?performers[home_team].id=2076&performers.id=2074", ['auth'=>['<Enter API Key>', null]]);

        //echo $response->getBody();
        $data = json_decode($response->getBody(), true);
        
        //dd($data);
        $tickets=$data['events'][0];

        //dd($tickets);
        $ticketArray = array();

        


        $ticketTitle=$tickets['title'];
        $ticketTime=$tickets['datetime_local'];
        $ticketCount=$tickets['stats']['listing_count'];
        $ticketLow=$tickets['stats']['lowest_price'];
        $ticketHigh=$tickets['stats']['highest_price'];
        $ticketUrl=$tickets['url'];
        $ticketVenueName=$tickets['venue']['name'];
        $ticketVenueCity=$tickets['venue']['display_location'];
        $ticketVenueAddress=$tickets['venue']['address'];
        $ticketVenueZip=$tickets['venue']['postal_code'];


        //dd($tickets['venue']['name']);
        $ticketArray[]=['ticketTitle'=>$ticketTitle,'ticketTime'=>$ticketTime,'ticketCount'=>$ticketCount,'ticketLow'=>$ticketLow,'ticketHigh'=>$ticketHigh,'ticketUrl'=>$ticketUrl,'ticketVenueName'=>$ticketVenueName,'ticketVenueCity'=>$ticketVenueCity,'ticketVenueAddress'=>$ticketVenueAddress,'ticketVenueZip'=>$ticketVenueZip,'trip_id'=>$trip->id, 'user_id'=>$trip->user_id]; 

        //Check if tickets exist for current trip
        $ticketCheck= Ticket::where('trip_id','=',$trip->id)->first();

        
        if(is_null($ticketCheck)){

        foreach($ticketArray as $ticket){

                //var_dump($ticket);

        //Insert selected SeatGeek API data into tickets table

            DB::table('tickets')->insert(array($ticket));

            }
        }
        else{

            $ticketCheck->destroy($ticketCheck->id);

            foreach($ticketArray as $ticket){
                
        //Insert selected SeatGeek API data into tickets table

            DB::table('tickets')->insert(array($ticket));

        }
    }

        

        //Call to database to return ticket information to ticket view    

        $tickets= Ticket::where('trip_id','=',$trip->id)->first();

        //dd($tickets);

        return view('tickets.index', compact('tickets'));

        }
        catch(\Exception $e){

        return view('errors.tickets');
        }

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
