<?php

namespace App\Http\Middleware;

use App\User;
use Closure;


class AuthenticateClient
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
        if($user->role != 'CLIENT'){
            return redirect()->back()->with('cancel', 'Akun anda sudah digunakan sebagai lawyer');
        }
        return $next($request);
    }
}
