<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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

        if(!Auth()){
            return redirect('/');
        }
        //  The OR do not work
        if(Auth()->user()['cheikh'] != 2){
            if(Auth()->user()['cheikh'] != 3){        
                return redirect('/dashboard');
            }elseif(Auth()->user()['cheikh'] == 3){
                return $next($request);
            }
        }


        return $next($request);
    }
}
