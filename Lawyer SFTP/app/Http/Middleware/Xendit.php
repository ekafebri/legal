<?php

namespace App\Http\Middleware;

use App\ApiKey;
use Closure;

class Xendit
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
        return $next($request);
    }
}