<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Hotel;
use App\Trip;
use App\Game;
use app\Preference;

class HotelsController extends Controller
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

        $hotelChoice = Auth::user()->preferences()->where('prefName','=','hotelNum')->first();
        
        $hotelChoice= $hotelChoice->prefNum;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();

        $tripId = $trip->id;

      $api_token='t0EWzW0isTavSKzvujplXPGrDT6FBZAPhKVgKRABKV2nLEazJxZYDmVg-eo94fcTwzZuiQyikR1Sw5u3rqLYwEKpziEa-zkz5ynD-9830k2I_5L_xB0zBvnmdsfOWHYx';

        //$trip = Trip::where('tripActive',1)->find($user_id);


        $games_id = $trip->games_id;

        //var_dump($games_id);

        $games = Game::find($games_id);

        //Encode the string parameter for use in the request
        $location=urlencode($games->venueLocation);
        //$location=urlencode('Fed Ex Field');
        //dd($location);
        
        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.yelp.com/v3/businesses/search'],
         ['headers'=>['Authorization'=>'Bearer '.$api_token]]);
        $response = $client->get("https://api.yelp.com/v3/businesses/search?term=hotels+motels&limit=".$hotelChoice."&location=".$location,
            ['headers'=>['Authorization'=>'Bearer '.$api_token]]
            );

        //echo $response->getBody();
        $data = json_decode($response->getBody(), true);

        $hotels = $data['businesses'];
        
        //dd($hotels);

        $hotelArray = array();
        

        foreach($hotels as $hotel){


        $hotelName=$hotel['name'];
        $hotelAddress=$hotel['location']['address1'];
        $hotelCity=$hotel['location']['city'];
        $hotelState=$hotel['location']['state'];
        $hotelZip=$hotel['location']['zip_code'];
        $hotelPhone=$hotel['display_phone'];
        $hotelUrl=$hotel['url'];
        
        //$hotels['price']= $hotels['price'] ?:'';
        
        

        
        //dd($hotels['venue']['name']);
        $hotelArray[]=['hotelName'=>$hotelName,'hotelAddress'=>$hotelAddress,'hotelCity'=>$hotelCity,'hotelState'=>$hotelState,'hotelZip'=>$hotelZip,'hotelPhone'=>$hotelPhone,'hotelUrl'=>$hotelUrl, 'trip_id'=>$tripId]; 

        

        //$hotelArray = collect($hotelArray);
        
        }



        $hotelCheck = Hotel::with('trip')->where('trip_id', '=', $tripId)->count();
//var_dump($hotelArray);

            if(count($hotelCheck)>0){

                DB::table('hotels')->where('trip_id','=',$tripId)->delete();

        foreach($hotelArray as $hotel){

              //Iterate through the array and insert into hotels table
                DB::table('hotels')->insert(array($hotel));
            }
            }else{
 
              DB::table('hotels')->insert(array($hotel));
            }




        //Call to database to return hotel information to hotel view    

        $hotels= Hotel::with('trip')->where('trip_id','=',$tripId)->get();

        return view('hotels.index', compact('hotels'));

        }
        catch(\Exception $e){

        return view('errors.hotels');
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
        $trip->hotels_id=$id;
        $trip->save();

        $hotel=Hotel::find($id);


      return view('hotels.show', compact('hotel'));
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
