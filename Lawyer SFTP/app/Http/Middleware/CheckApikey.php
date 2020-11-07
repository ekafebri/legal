<?php

namespace App\Http\Middleware;

use App\ApiKey;
use Closure;

class CheckApikey
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
        $header = $request->header('apikey');
        $key = Apikey::find(1);
        if ($key->apikey != $header) {
            return response()->json(['success' => 0, 'message' => 'Sorry, you are not allowed to access this page']);
        }

        return $next($request);
    }
}
