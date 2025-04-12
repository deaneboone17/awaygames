<?php

namespace App\Http\Middleware;

use Closure;
use App\Trip;
use Request;
use Route;
use Auth;
use Session;

class RestrictTrips
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
        $userID = $request->route('trip');

        $tripUser = Trip::find($userID)->user_id;

        if(Auth::user()->id === $tripUser){

            return $next($request);
        }

        $request->session()->flash('warning','You are not authorized to view this page');

        return redirect('/dashboard');
    }
}
