<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Komentars;

use DB;
use File;
use Storage;

class KomentarController extends Controller{


    public function komentar(Request $request){
        $user_id = $request->header('user');
        $artikel_id = $request->artikel_id;
        $komentar = $request->komentar;
        // 'user_id', 'komentar', 'artikel_id'

        $komen = Komentars::create([
            'user_id' => $user_id,
            'artikel_id' => $artikel_id,
            'komentar' => $komentar
        ]);

        if($komen){
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'berhasil mengomentari artikel';
        }else{
            $response['error'] = false;
            $response['code'] = 2;
            $response['message'] = 'gagal mengomentari artikel';
        }

        return json_encode($response);
    }

    public function hapus(Request $request){
        $user_id = $request->header('user');
        $komentar = $request->header('komentar');

        // check like at artikel
        $check = Komentars::where('user_id',$user_id)
        ->where('id', $komentar)
        ->get();

        if(count($check) == 0 ){
            $response['error'] = false;
            $response['code'] = 3;
            $response['message'] = 'komentar tidak ada';
        }else{
            $hapus = Komentars::where('id', $komentar)
            ->delete();

            if($hapus){
                $response['error'] = false;
                $response['code'] = 1;
                $response['message'] = 'hapus komentar artikel';
            }else{
                $response['error'] = false;
                $response['code'] = 2;
                $response['message'] = 'gagal hapus komentar artikel';
            }
        }
        return json_encode($response);
    }
}
