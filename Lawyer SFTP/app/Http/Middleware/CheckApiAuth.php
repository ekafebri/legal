<?php

namespace App\Http\Middleware;

use App\User;
use Closure;


class CheckApiAuth
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
        $token = $request->header('token');
        if ($user_id == null || $token == null) {
            return response()->json(['error' => true, 'code' => 0, 'message' => 'Tidak ada data autentifikasi']);
        } else {
            $user = User::where('id', $user_id)->where('token', $token)->first();
            if ($user == null) {
                return response()->json(['error' => true, 'code' => 0, 'message' => 'anda sudah keluar']);
            }elseif($user->status == false){
                return response()->json(['error' => true, 'code' => 0, 'message' => 'akun tidak aktif']);
            }
        }
        $request->merge(array("user" => $user));
        return $next($request);
    }
}
