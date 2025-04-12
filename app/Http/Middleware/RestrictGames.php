<?php

namespace App\Http\Middleware;

use Closure;
use App\Trip;
use Request;
use Route;
use Auth;
use Session;

class RestrictGames
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
        $gameID = $request->route('game');
        
        $currentUser = Auth::user()->id;

        $game = Trip::where([['user_id','=', $currentUser],['tripActive','=',1]])->first();

        //Check if the games_id field has been set yet
        if(is_null($game)){

        $request->session()->flash('warning','You are not authorized to view this page');

        return redirect('/dashboard');

    }
    else{

        return $next($request);
        }

    
    }


}
