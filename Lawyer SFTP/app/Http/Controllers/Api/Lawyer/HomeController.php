<?php

namespace App\Http\Controllers\Api\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Slider;
use App\Artikel;

use DB;

class HomeController extends Controller{

    public function beranda(Request $request){
            // UPDATE FCM TOKEN
            $id_user = $request->header('user');
            $fcm = $request->header('fcm');
            if(!empty($fcm)){
            $update = User::where('id', $id_user)->update(['fcm_token' => $fcm]);
            }

            // GET USER ROLE
            $user =  User::where('id', $id_user)->first();
            $my_role = $user['role'];

            // GET SLIDER
            $slider = Slider::where('status', true)->where('role','LAWYER')->orderBy('id', 'DESC')->get();

            // GET ARTIKEL
            $artikel = Artikel::leftJoin('komentars', 'artikel.id',  '=','komentars.artikel_id')
            ->leftJoin('likes', 'artikel.id',  '=','likes.artikel_id')
            ->where('artikel.mode','RELEASE')
            ->select( 'artikel.*', DB::raw('COUNT(komentars.id) as total_komentar'), DB::raw('COUNT(likes.id) as total_like'))
            ->groupBy('artikel.id')
            ->orderBy('artikel.id', 'DESC')
            ->take(5)
            ->get();
            
            $response['slider'] = $slider;
            $response['artikel'] = $artikel;
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'Data menu beranda lawyer';


        return json_encode($response);
    }


}
