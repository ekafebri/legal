<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\ApiKey;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        return view('welcome'); 
    }
    public function login(Request $request)
    {
        $admin = Admin::where('username', $request->username)->first();
        $checkPass = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->pass]);
        if($checkPass == true){
            \Session::put('user', $admin);
            return redirect()->route('home')->with('login', $admin->username);
        }else{
            return redirect()->back()->with('cancel', 'Username dan password salah');
        }
    }

    public function logout()
    {
        \Auth::logout();
        \Session::forget('user');
        return redirect()->route('log');
    }
    
}   
