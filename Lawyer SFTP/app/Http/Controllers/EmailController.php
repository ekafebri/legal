<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Mail;
class EmailController extends Controller
{
    public function emailForgetPassword($email, $token, $user)
    {
        if($user->role == 'LAWYER'){
            $apk_name = 'Bursa Advokat';
        }else{
            $apk_name = 'Bursa Hukum';
        }
        $nama = $user->nama_lengkap;
        $data = [
            'nama'      => $nama,
            'email'     => $email,
            'token'     => $token,
            'apk_name'  => $apk_name
        ];
        Mail::send('emails.reset-password', $data, function($message) use ($nama, $email, $apk_name) {

        $message->to($email, $nama)
        ->subject("Reset Password");
        $message->from(env('MAIL_USERNAME', $apk_name));
        });

        if (Mail::failures()) {
            return false;
        }else{
            return true;
        }
    }
}
