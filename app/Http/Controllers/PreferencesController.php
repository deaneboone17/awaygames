<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Preference;
use View;
use Validator;

class PreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user = User::find($id);
        $flightChoices = Preference::all()->where('prefName','=','flightNum');
        $hotelChoices = Preference::all()->where('prefName','=','hotelNum');
        $poiChoices = Preference::all()->where('prefName','=','poiNum');

        $flightPref = $user->preferences()->where('prefName','=','flightNum')->first();
        $hotelPref = $user->preferences()->where('prefName','=','hotelNum')->first();
        $poiPref = $user->preferences()->where('prefName','=','poiNum')->first();

       
        return View::make('preferences.show', compact('flightPref','hotelPref','poiPref', 'user','flightChoices','hotelChoices','poiChoices'));

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
        //Pull the user and the user preferences from the database

        $user = User::find($id);
        $flightPref = $user->preferences()->where('prefName','=','flightNum')->first();
        $hotelPref = $user->preferences()->where('prefName','=','hotelNum')->first();
        $poiPref = $user->preferences()->where('prefName','=','poiNum')->first();

        //Save the user preferences from the form into variables for use
        $flightChoice =$request->flightNum;
        $hotelChoice =$request->hotelNum;
        $poiChoice =$request->poiNum;

        //Grab the preference record that corresponds to the value entered in the form
        $flightPrefUpdate = Preference::where('prefName','=','flightNum')->where('prefNum','=',$flightChoice)->first();
        $flightPrefUpdate = $flightPrefUpdate->id;

        $hotelPrefUpdate = Preference::where('prefName','=','hotelNum')->where('prefNum','=',$hotelChoice)->first();
        $hotelPrefUpdate = $hotelPrefUpdate->id;

        $poiPrefUpdate = Preference::where('prefName','=','poiNum')->where('prefNum','=',$poiChoice)->first();
        $poiPrefUpdate = $poiPrefUpdate->id;

        //Detach the existing user preference and update with the new user preferences from the form
        $user->preferences()->detach($flightPref);
        $user->preferences()->attach($flightPrefUpdate);

        $user->preferences()->detach($hotelPref);
        $user->preferences()->attach($hotelPrefUpdate);

        $user->preferences()->detach($poiPref);
        $user->preferences()->attach($poiPrefUpdate);


        return \Redirect::to('/dashboard');

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
