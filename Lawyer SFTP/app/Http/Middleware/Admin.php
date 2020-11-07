<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(session()->get('user')){
            if(session()->get('user')->role == 'SUPERADMIN' || session()->get('user')->role == 'ADMIN'){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(440);
        }
    }
}
