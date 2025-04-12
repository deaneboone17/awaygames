<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;
use App\Trip;
use App\Departconnect;
use App\Departflight;
use App\Returnflight;
use App\Game;
use App\Hotel;
use App\Airport;
use DateTime;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

      $this->middleware('auth');
    }

    public function index()
    {

      $airports=Airport::orderBy('airportCode')->pluck('airportCode', 'airportName');
      foreach($airports as $key=>$value){
        echo $key;
      }

      dd($key);
        
      $userid = Auth::user()->id;

    //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid]])->find(37);

            $tripId = $trip->id;

    $flightDisplay=Departflight::leftjoin('departconnects', 'departflights.tripNum','=','departconnects.tripNum')
            ->select(DB::raw("departflights.*, departconnects.carrier as conCarrier, departconnects.flightNumber as conFlightNumber, departconnects.originAirport as conOriginAirport, departconnects.destinationAirport as conDestinationAirport, departconnects.departureTime as conDepartureTime, departconnects.arrivalTime as conArrivalTime, departconnects.flightDuration as conFlightDuration, departconnects.saleTotal as conSaleTotal "))
            ->where('departflights.trip_id','=',$tripId)
            ->where('departconnects.trip_id','=',$tripId)
            ->find($id);


            dd($depart);
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

   public function getSeatGeek($id)

    {

        //Send GET request to SeatGeek API

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.seatgeek.com/2/']);
        $response = $client->get("https://api.seatgeek.com/2/performers/$id", ['auth'=>['NjU3MTE5MHwxNDgzNzI5NTMy', null]]);
//?performers[home_team].id=$home&performers.id=$away
        //echo $response->getBody();
        $data = json_decode($response->getBody(), true);
        dd($data);

        $tickets=$data['events'][0];

        
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
        $ticketArray[]=['ticketTitle'=>$ticketTitle,'ticketTime'=>$ticketTime,'ticketCount'=>$ticketCount,'ticketLow'=>$ticketLow,'ticketHigh'=>$ticketHigh,'ticketUrl'=>$ticketUrl,'ticketVenueName'=>$ticketVenueName,'ticketVenueCity'=>$ticketVenueCity,'ticketVenueAddress'=>$ticketVenueAddress,'ticketVenueZip'=>$ticketVenueZip]; 
        

        foreach($ticketArray as $ticket){

                //var_dump($ticket);

            DB::table('tickets')->insert(array($ticket));

            }


        //dd($ticketArray);

            return $tickets;

        

    }

public function getSchedules($schedule)

    {

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://profootballapi.com/']);
        $response = $client->get("schedules/$schedule", 
            ['auth'=>['CE31VkJwcXaTRSp7oi849j2tBYDGnQHz', null]],
            ['query'=>['performers.slug'=>'virginia-tech']]);

        //echo $response->getBody();
        $data = json_decode($response->getBody(), false);
        dd($data);
        //echo $test=$data->title;



        //DB::table('tests')->insert(['title'=>$test]);

    }

    public function getQPX()

    {

           $data = array ( "request" => array(
            "passengers" => array( 
                    "adultCount" => 1
                        ),
                    "slice" => array( 
                            array(
                                "origin" => "BWI",
                                "destination" => "IAH",
                                "date" => "2017-09-04"),
                            array(
                                "origin" => "IAH",
                                "destination" => "BWI",
                                "date" => "2017-09-07"),
                            ),
                                "solutions" => "1"
                            ),                   
             );                                                                                   
                $data_string = json_encode($data);
                $ch = curl_init('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyCWKmFRWW-1pZWa5WnEbDoVRmxpmes1cLg');                                                                      
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);                                                                      
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   

                $result = curl_exec($ch);
                curl_close($ch);

                dd($result);

    }

    public function getQPX2()

    {
        $client = new \GuzzleHttp\Client(['base_uri' =>'https://www.googleapis.com/qpxExpress/v1/trips']);

             $data = [
                      'request'=> [
                        'slice'=> [
                          [
                            'origin'=> 'bwi',
                            'destination'=> 'dfw',
                            'date'=> '2017-09-12'
                          ],
                          [
                            'origin'=> 'dfw',
                            'destination'=> 'bwi',
                            'date'=> '2017-09-14'
                          ]
                        ],
                        'passengers'=> [
                          'adultCount'=> 1,
                          'infantInLapCount'=> 0,
                          'infantInSeatCount'=> 0,
                          'childCount'=> 0,
                          'seniorCount'=> 0
                        ],
                        'solutions'=> 2,
                        'refundable'=> false
                      ]
                    ];                                                                                   
                $data_string = json_encode($data);

        $request = $client->post('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyCWKmFRWW-1pZWa5WnEbDoVRmxpmes1cLg',['json'=>$data]);
            

        //$request->setBody($data_string);

        //$response= $request->send();

        //echo $request->getBody();
        $response = json_decode($request->getBody(), true);
dd($response);

        dd($response->trips->tripOption[0]->slice[0]->segment[0]->leg[0]->origin);


}


    public function getYelp(){

        $api_token='t0EWzW0isTavSKzvujplXPGrDT6FBZAPhKVgKRABKV2nLEazJxZYDmVg-eo94fcTwzZuiQyikR1Sw5u3rqLYwEKpziEa-zkz5ynD-9830k2I_5L_xB0zBvnmdsfOWHYx';

        //$trip = Trip::where('tripActive',1)->find($user_id);

        //$games_id = $trip->games_id;

        //$games = Game::find($games_id);

        //Encode the string parameter for use in the request
        //$location=urlencode($games->venueName);
        $location=urlencode('Santa Clara, California');

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.yelp.com/v3/businesses/search'],
         ['headers'=>['Authorization'=>'Bearer '.$api_token]]);
        $response = $client->get("https://api.yelp.com/v3/businesses/search?term=hotels+motels&limit=5&location=".$location,
            ['headers'=>['Authorization'=>'Bearer '.$api_token]]
            );

        //echo $response->getBody();
        $data = json_decode($response->getBody(), true);

        $hotels = $data['businesses'];
        
        $hotelArray = array();
    
        foreach($hotels as $hotel){


        $hotelName=$hotel['name'];
        $hotelAddress=$hotel['location']['address1'];
        $hotelCity=$hotel['location']['city'];
        $hotelState=$hotel['location']['state'];
        $hotelZip=$hotel['location']['zip_code'];
        $hotelPhone=$hotel['display_phone'];
        $hotelUrl=$hotel['url'];
        $hotelPriceRange=$hotel['price'];


        
        //dd($hotels['venue']['name']);
        $hotelArray[]=['hotelName'=>$hotelName,'hotelAddress'=>$hotelAddress,'hotelCity'=>$hotelCity,'hotelState'=>$hotelState,'hotelZip'=>$hotelZip,'hotelPhone'=>$hotelPhone,'hotelUrl'=>$hotelUrl,'hotelPriceRange'=>$hotelPriceRange]; 

        //var_dump($hotelArray);
        
        }

        foreach($hotelArray as $hotel){

                var_dump($hotel);

            //Iterate through the array and insert into hotels table
                DB::table('hotels')->insert(array($hotel));

            }

        //Call to database to return hotel information to hotel view    

        $hotels= Hotel::all();

        return view('hotels.index', compact('hotels'));


        //dd($test);

    }

    public function getYelpAuth(){

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://api.yelp.com/oauth2/token
']);

        $request = $client->post('https://api.yelp.com/oauth2/token',

            ['grant_type'=>'client_credentials'],
            ['client_id'=>'86XwvCP_8WtFhT-c9ZfiyA'],
            ['client_secret'=>'2qUf1oFzigqFx70rURgWovA467aoBDGz2TcRVcl7ohapJc9OZwDmP8Y5gGmaBkoI']
            );


    }









    public function store(Request $request)
    {
        //
       $tests = new Test;

        $tests->title = $request->title;

        $tests->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculateDuration($id, $tripId)
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


    public function airportName()
    {
        
       $client = new \GuzzleHttp\Client(['base_uri' =>'https://www.googleapis.com/qpxExpress/v1/trips']);

             $data = [
                      'request'=> [
                        'slice'=> [
                          [
                            'origin'=> 'bwi',
                            'destination'=> 'dfw',
                            'date'=> '2017-10-10',
                            'maxStops'=>1
                          ],
                          [
                            'origin'=> 'dfw',
                            'destination'=> 'bwi',
                            'date'=> '2017-10-12',
                            'maxStops'=>1
                          ]
                        ],
                        'passengers'=> [
                          'adultCount'=> 2,
                          'infantInLapCount'=> 0,
                          'infantInSeatCount'=> 0,
                          'childCount'=> 0,
                          'seniorCount'=> 0
                        ],
                        'solutions'=> 3,
                        'refundable'=> false
                      ]
                    ];                                                                                   
                $data_string = json_encode($data);

        $request = $client->post('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyCWKmFRWW-1pZWa5WnEbDoVRmxpmes1cLg',['json'=>$data]);
            
        $response = json_decode($request->getBody(), true);

//dd($response);

      $airports = $response['trips']['data']['airport'];

      dd($airports);
       $trips=$response['trips']['tripOption'];

       

       

       //Iterate over the JSON data returned by the Google QPX API
        

        //Store selected data from API in an array

        $tripArray = array();

        foreach($airports as $key=>$airport){
          $airportName = $airport['name'];

        foreach($trips as $key=>$trip){
            $tripNum=$key;
            $saleTotal=$trip['saleTotal'];
            

                foreach($trip['slice'] as $key=>$slice){
                      
                    $sliceNum=$key;
                    foreach($slice['segment'] as $segment){

                        $carrier=$segment['flight']['carrier'];
                        $flightNumber=$segment['flight']['number'];
                        $flightDuration=$segment['duration'];

                            foreach($segment['leg'] as $leg){


                                 $originAirport=$leg['origin'];
                                 $destinationAirport=$leg['destination'];
                                 $departureTime=$leg['departureTime'];
                                 $arrivalTime=$leg['arrivalTime'];


             //Fill the array with data                    

           $tripArray[]=['airportName'=>'$airportName','tripNum'=>$tripNum,'sliceNum'=>$sliceNum,'carrier'=>$carrier,'flightNumber'=>$flightNumber,'originAirport'=>$originAirport,'destinationAirport'=>$destinationAirport,'departureTime'=>$departureTime,'arrivalTime'=>$arrivalTime,'flightDuration'=>$flightDuration,'saleTotal'=>$saleTotal];      

                            }

                    }

                
                }
        }


    }
    dd($tripArray);
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
