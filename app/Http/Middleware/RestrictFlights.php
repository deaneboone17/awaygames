<?php

namespace App\Http\Middleware;

use Closure;
use App\Trip;
use Request;
use Route;
use Auth;
use Session;

class RestrictFlights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Get the requested game ID from the route
        $flightID = $request->route('flight');
        
        $currentUser = Auth::user()->id;

        $flight = Trip::where([['user_id','=', $currentUser],['tripActive','=',1]])->first();

        //Check if the games_id field has been set yet
        if(is_null($flight)){

        $request->session()->flash('warning','You are not authorized to view this page');

        return redirect('/dashboard');

    }
    else{

        return $next($request);
        }

    
    }
}
