<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LawyerWeb
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
        if(session()->get('user')){
            if(session()->get('user')->role == 'LAWYER'){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(440);
        }
    }
}
