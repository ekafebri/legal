<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ClientWeb
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
            if(session()->get('user')->role == 'CLIENT'){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(440);
        }
    }
}
