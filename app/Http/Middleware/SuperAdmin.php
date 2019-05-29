<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
        elseif(Auth()->user()['cheikh'] != '3'){
            return redirect('/dashboard');
        }


        return $next($request);
    }
}
