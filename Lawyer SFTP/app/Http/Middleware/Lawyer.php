<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class Lawyer
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
        $user_id = $request->header('userId');
        $user = User::find($user_id);
        if ($user->role == 'CLIENT') {
            return response()->json(['success' => 0, 'message' => 'Sorry, you are not allowed to access this page lawyer']);
        }
        return $next($request);
    }
}
