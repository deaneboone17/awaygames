<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
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
        
        if($request->user()===null){

            $request->session()->flash('warning','You are not authorized to view this page');
            
            return redirect('/dashboard');
        }

        
        //dd($req);
        $actions = $request->route()->getAction();

        //dd($actions['roles']);

        $roles= isset($actions['roles']) ? $actions['roles']:null;
        

        if($request->user()->hasAnyRole($roles) || !$roles){
            
            return $next($request);
        }

        $request->session()->flash('warning','You are not authorized to view this page');
            
            return redirect('/dashboard'); 
    }

}
