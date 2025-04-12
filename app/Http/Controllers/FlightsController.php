<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Departflight;
use App\Departconnect;
use App\Returnflight;
use App\Trip;
use App\Airport;
use app\Preference;
use DateTime;

use \RecursiveIteratorIterator;
use \RecursiveArrayIterator;

class FlightsController extends Controller
{ 


    public function __construct()
    {

      $this->middleware('auth');
    }
    //

    public function index()
    {
        //
        //$flights=Flight::all();
        //return view('auth.login');
      
    }


	public function show($id)
    {
        //

      //Get id for current authenticated user
        $userid = Auth::user()->id;


      //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Update the trip table with the selected game id
        $trip->departflights_id=$id;
        $trip->save();

        $tripId = $trip->id;

        //$tripDurationC = 0;
        //$tripDurationD = 0;


      $connectCount = Departconnect::where([['trip_id','=',$tripId]])
            ->count();
            
            //

            if($connectCount>0){

              $depart=Departflight::flightShowConnect($id,$tripId);
              $tripDurationC= Departflight::calculateDurationC($id,$tripId);

                                       
            }

            else{

              $depart=Departflight::flightShowDirect($id, $tripId);
              $tripDurationD= Departflight::calculateDurationD($id,$tripId);

              
              
             //dd($depart);
                           
            }

            return view('flights.show', compact('depart','connectCount','tripDurationD', 'tripDurationC'));
     

        

        
    }


public function store(Request $request)
    {
        //
        
        //Assign variables for form data

    	try{

        $arriveAirport=$request->arriveAirport;
        $departDate=$request->departDate;
        $returnDate=$request->returnDate;
        $travelers=$request->travelers;
        $departAirport=$request->departAirport;


        $this->validate($request, [
        'departDate' => 'required|before_or_equal:returnDate',
        'returnDate' => 'required|after:departDate',
        'travelers' => 'required|numeric',
        'departAirport' => 'required|string|min:3',
    ]);



        //Update flight table with trip id
        $userid = Auth::user()->id; 


        //Grab user preference from the database--number of flights to return
        $flightChoice = Auth::user()->preferences()->where('prefName','=','flightNum')->first();
        
        $flightChoice= $flightChoice->prefNum;



        //Get active record from the trip table for the authenticated user
        $trip = Trip::where([['user_id','=', $userid],['tripActive','=',1]])->first();
        
        //Get the id of the active trip record
        $tripId = $trip->id;
        




        //Pass form data to Google QPX API and return flight results


        $client = new \GuzzleHttp\Client(['base_uri' =>'https://www.googleapis.com/qpxExpress/v1/trips']);

             $data = [
                      'request'=> [
                        'slice'=> [
                          [
                            'origin'=> $departAirport,
                            'destination'=> $arriveAirport,
                            'date'=> $departDate,
                            'maxStops'=>1
                          ],
                          [
                            'origin'=> $arriveAirport,
                            'destination'=> $departAirport,
                            'date'=> $returnDate,
                            'maxStops'=>1
                          ]
                        ],
                        'passengers'=> [
                          'adultCount'=> $travelers,
                          'infantInLapCount'=> 0,
                          'infantInSeatCount'=> 0,
                          'childCount'=> 0,
                          'seniorCount'=> 0
                        ],
                        'solutions'=> $flightChoice,
                        'refundable'=> false
                      ]
                    ];                                                                                   
                $data_string = json_encode($data);

        $request = $client->post('https://www.googleapis.com/qpxExpress/v1/trips/search?key=AIzaSyCWKmFRWW-1pZWa5WnEbDoVRmxpmes1cLg',['json'=>$data]);
            
        $response = json_decode($request->getBody(), true);



       $trips=$response['trips']['tripOption'];

       

       

       //Iterate over the JSON data returned by the Google QPX API
        

        //Store selected data from API in an array

        $tripArray = array();


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

           $tripArray[]=['trip_id'=>$tripId,'tripNum'=>$tripNum,'sliceNum'=>$sliceNum,'carrier'=>$carrier,'flightNumber'=>$flightNumber,'originAirport'=>$originAirport,'destinationAirport'=>$destinationAirport,'departureTime'=>$departureTime,'arrivalTime'=>$arrivalTime,'flightDuration'=>$flightDuration,'saleTotal'=>$saleTotal];      

                            }

                    }

                
                }
        }

        
      

              $tripArray = collect($tripArray);
              $tripDepart = $tripArray->where('sliceNum',0)->where('originAirport','=',$departAirport);

              

              $tripConDepart = $tripArray->where('sliceNum',0)->where('originAirport','<>',$departAirport);

              $tripReturn = $tripArray->where('sliceNum',1)->where('originAirport','=',$arriveAirport);

              $tripConReturn = $tripArray->where('sliceNum',1)->where('originAirport','<>',$arriveAirport);



              //Check the database for records from previous searches and delete

              //See if there are any records in departflights under the active trip
            $departCheck = DB::table('departflights')->where('trip_id','=',$tripId)->count();

              //If there are records under the active trip delete them and grab new records
            if($departCheck>0){

                DB::table('departflights')->where('trip_id','=',$tripId)->delete();

            //Iterate through the collection and insert into flights table
            foreach($tripDepart as $flight){
         
                DB::table('departflights')->insert(array($flight));
              }

            }
            //If there were no records in the departflights table generate new records
            else{

              foreach($tripDepart as $flight){
 
              DB::table('departflights')->insert(array($flight));
              }
            }


            $departCheck = DB::table('departconnects')->where('trip_id','=',$tripId)->count();

            //Clean up depart connects table
            if($departCheck>0){

                DB::table('departconnects')->where('trip_id','=',$tripId)->delete();


            foreach($tripConDepart as $flight){
 
              DB::table('departconnects')->insert(array($flight));

            }
            }else{

              foreach($tripConDepart as $flight){
 
              DB::table('departconnects')->insert(array($flight));
            }
            }



            //Clean up returnflights table
            $returnCheck = DB::table('returnflights')->where('trip_id','=',$tripId)->count();


            if($returnCheck>0){

                DB::table('returnflights')->where('trip_id','=',$tripId)->delete();


            foreach($tripReturn as $flight){
 
              DB::table('returnflights')->insert(array($flight));

            }
            }else{

              foreach($tripReturn as $flight){
 
              DB::table('returnflights')->insert(array($flight));
            }
            }


            $returnCheck = DB::table('returnconnects')->where('trip_id','=',$tripId)->count();
            //Clean up return connects table
            if($returnCheck>0){

                DB::table('returnconnects')->where('trip_id','=',$tripId)->delete();


            foreach($tripConReturn as $flight){
 
              DB::table('returnconnects')->insert(array($flight));

            }
            }else{

              foreach($tripConReturn as $flight){
 
              DB::table('returnconnects')->insert(array($flight));
            }
            }

            /*
            $tripDepart=Departflight::leftjoin('departconnects', 'departflights.tripNum','=','departconnects.tripNum')
            ->select(DB::raw("departflights.*, departconnects.*"))
            ->get();
            */
            

            $connectCount = Departconnect::where([['trip_id','=',$tripId]])
            ->count();


            if($connectCount>0){

              $tripDepart=Departflight::flightConnect();

            }

            else{

              $tripDepart=Departflight::flightDirect();
              //dd($tripDepart);
            }

             //$airport = Airport::airportName($code);          
            //$tripReturn=Returnflight::flightDisplay();

          return view('flights.index', compact('tripDepart','connectCount')); 



      }
      catch(\Exception $e){

      	return view('errors.flights');
      }


               
    }

}
