<?php

namespace App\Http\Middleware;

use App\User;
use Closure;


class AuthenticateLawyer
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
        $user = User::where('email', $request->email)->first();
        if($user->role != 'LAWYER'){
            return redirect()->back()->with('cancel', 'Akun anda sudah digunakan sebagai client');
        }
        return $next($request);
    }
}
