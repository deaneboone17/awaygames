<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Poi;
use App\Trip;
use App\Game;

class PoisController extends Controller
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

        try{
        $userid = Auth::user()->id;

        $poiChoice = Auth::user()->preferences()->where('prefName','=','poiNum')->first();
        
        $poiChoice= $poiChoice->prefNum;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

             $api_token='<API TOKEN>';

        //$trip = Trip::where('tripActive',1)->find($user_id);

        $games_id = $trip->games_id;

        $games = Game::find($games_id);

        //Encode the string parameter for use in the request
        $location=urlencode($games->venueLocation);
        //$location=urlencode('M&T Bank Stadium');

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.yelp.com/v3/businesses/search'],
         ['headers'=>['Authorization'=>'Bearer '.$api_token]]);
        $response = $client->get("https://api.yelp.com/v3/businesses/search?term=points+of+interest&limit=".$poiChoice."&location=".$location,
            ['headers'=>['Authorization'=>'Bearer '.$api_token]]
            );

        //echo $response->getBody();
        $data = json_decode($response->getBody(), true);

        $pois = $data['businesses'];
        
        $poiArray = array();
    
        foreach($pois as $poi){


        $poiName=$poi['name'];
        $poiAddress=$poi['location']['address1'];
        $poiCity=$poi['location']['city'];
        $poiState=$poi['location']['state'];
        $poiZip=$poi['location']['zip_code'];
        $poiPhone=$poi['display_phone'];
        $poiUrl=$poi['url'];
        


        
        //dd($pois['venue']['name']);
        $poiArray[]=['poiName'=>$poiName,'poiAddress'=>$poiAddress,'poiCity'=>$poiCity,'poiState'=>$poiState,'poiZip'=>$poiZip,'poiPhone'=>$poiPhone,'poiUrl'=>$poiUrl, 'trip_id'=>$tripId]; 

        //var_dump($poiArray);
        
        }

             

        $poisCheck = Poi::with('trip')->where('trip_id', '=', $tripId)->count();


            if(count($poisCheck)>0){

                DB::table('pois')->where('trip_id','=',$tripId)->delete();

        foreach($poiArray as $poi){

              //Iterate through the array and insert into hotels table
                DB::table('pois')->insert(array($poi));
            }
            }else{
 
              DB::table('pois')->insert(array($poi));
            }

        //Call to database to return poi information to poi view    

        $pois= Poi::with('trip')->where('trip_id','=',$tripId)->get();

        
        return view('pois.index', compact('pois'));

        }
        catch(\Exception $e){

        return view('errors.pois');
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
        //Get id for current authenticated user
        $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Update the trip table with the selected game id
        $trip->pois_id=$id;
        $trip->save();

        $poi= Poi::find($id);

        
        return view('pois.show', compact('poi'));

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
