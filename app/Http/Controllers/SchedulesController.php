<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use View;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules = Schedule::where('team_id', $id)->first();

        return view('schedules.index', compact('schedules'));

      
    }

     public function getFlights()
    {
        //
                
        return view('flights.index');

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
public function getSchedules()

    {

        $client = new \GuzzleHttp\Client(['base_uri' =>'https://profootballapi.com/']);
        $response = $client->post('schedule', 
            
            ['query'=>['api_key'=>'r5VlK2SeRpoPZ3vcDq9Oj1BJyfuY8tUA'],['year'=>'2016']]);

        //echo $response->getBody();
        $data = json_decode($response->getBody(), false);
        dd($data);
        //echo $data->title;



        //DB::table('tests')->insert(['title'=>$test]);

    }


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
        $schedule = Schedule::find($id);
        
        return view('schedules.show', compact('schedule'));
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
