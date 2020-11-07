<?php

namespace App\Http\Controllers\Api\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Artikel;

use DB;
use File;
use Storage;

class ArtikelController extends Controller{

    public function tambah(Request $request){
        $user_id = $request->header("user");
        $mode = $request->header("mode");
        $judul = $request->judul;
        $content = $request->content;
        $image = $request->image;

        // dd($request);


        $user =  User::where('id', $user_id)->first();
        $my_role = $user['role'];

        if($my_role != "LAWYER"){
            $response['error'] = false;
            $response['code'] = 7;
            $response['message'] = 'anda bukan lawyer, anda tidak memiliki akses';
            return json_encode($response);
        }
       

        // status check
        if($mode == "DRAF"){
            $mode = "DRAF";

        }elseif($mode == "POST"){
            $mode = "WAITING_ADMIN";

            if(empty($judul) || empty($content) || empty($image)){
                $response['error'] = false;
                $response['code'] = 2;
                $response['message'] = 'Data tidak lengkap';
                return json_encode($response);
            }
        }else{
            $response['error'] = false;
            $response['code'] = 6;
            $response['message'] = 'mode tidak di ketahui';
            return json_encode($response);
        }


        // CHECK ROLE USER
        $check = User::where('id', $user_id)
        ->where('role', 'LAWYER')
        ->where('status', true)
        ->first();
        
        if(!$check){
            $response['error'] = false;
            $response['code'] = 3;
            $response['message'] = 'Anda bukan lawyer atau akun anda sudah tidak aktif';
            return json_encode($response);
        }

        $pindah = true;
        $image_art = "";
        if(!empty($image)){
            // cukup pakai
            $image_art = $request->file('image')->store('artikel');
        }

        if(!$pindah){
            $response['error'] = false;
            $response['code'] = 4;
            $response['message'] = 'Gagal menambahkan artikel, file gambar gagal terkirim';
            return json_encode($response);
        }
        
        $tambah = Artikel::create([
            'user_id' => $user_id,
            'judul' => $judul,
            'content' => $content,
            'image' => $image_art, 
            'mode' => $mode
        ]);

        if($tambah){
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'Berhasil melakukan pengajuan artikel';
        }else{
            $response['error'] = false;
            $response['code'] = 5;
            $response['message'] = 'Gagal melakukan pengajuan artikel. coba lagi beberapa saat lagi';
        }

        return json_encode($response);
    }


    public function edit(Request $request){
        $user_id = $request->header("user");
        $mode = $request->header("mode");
        $judul = $request->judul;
        $content = $request->content;
        $image = $request->image;
        $id_artikel = $request->id;

        // status check
        if($mode == "DRAF"){ 
            $mode = "DRAF";
            if(empty($id_artikel)){
                $response['error'] = false;
                $response['code'] = 2;
                $response['message'] = 'Data tidak lengkap';
                return json_encode($response);
            }
        }elseif($mode == "POST"){
            $mode = "WAITING_ADMIN";

            if(empty($judul) || empty($content) || empty($image) || empty($id_artikel) ){
                $response['error'] = false;
                $response['code'] = 2;
                $response['message'] = 'Data tidak lengkap';
                return json_encode($response);
            }
        }else{
            $response['error'] = false;
            $response['code'] = 6;
            $response['message'] = 'mode tidak di ketahui';
            return json_encode($response);
        }


        // CHECK ROLE USER
        $check = User::where('id', $user_id)
        ->where('role', 'LAWYER')
        ->where('status', true)
        ->first();
        
        if(!$check){
            $response['error'] = false;
            $response['code'] = 3;
            $response['message'] = 'Anda bukan lawyer atau akun anda sudah tidak aktif';
            return json_encode($response);
        }

        $pindah = true;
        $image_artikel = "";
        if(!empty($image)){  
            $image_artikel = $request->file('image')->store('artikel');
        }

        if(!$pindah){
            $response['error'] = false;
            $response['code'] = 4;
            $response['message'] = 'Gagal memperbarui artikel, file gambar gagal terkirim';
            return json_encode($response);
        }

        $update = true;
        if(!empty($image)){
            $update = Artikel::where('id', $id_artikel)->update(['judul' => $judul
            , 'content' => $content
            , 'image' => $image_artikel
            , 'mode' => $mode]);
        }else{
            $update = Artikel::where('id', $id_artikel)->update(['judul' => $judul
            , 'content' => $content
            , 'mode' => $mode]);
        }

        if($update){
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'Berhasil memperbarui artikel';
        }else{
            $response['error'] = false;
            $response['code'] = 5;
            $response['message'] = 'Gagal memperbarui pengajuan artikel. coba lagi beberapa saat lagi';
        }

        return json_encode($response);
    }

    public function riwayat(Request $request){
        $id_user = $request->header('user');
        $artikel = Artikel::leftJoin('komentars', 'artikel.id',  '=','komentars.artikel_id')
            ->leftJoin('likes', 'artikel.id',  '=','likes.artikel_id')
            ->where('artikel.mode','!=', 'DELETE')
            ->where('artikel.user_id',$id_user)
            ->select( 'artikel.*', DB::raw('COUNT(komentars.id) as total_komentar'), DB::raw('COUNT(likes.id) as total_like'))
            ->groupBy('artikel.id')
            ->orderBy('artikel.id', 'DESC')
            ->take(5)
            ->get();

        // $riwayat = Artikel::where('mode','!=', 'DELETE')->where('user_id',$id_user)->orderBy('id', 'DESC')->get();

        if(count($artikel) > 0){
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'data riwayat artikel anda';
            $response['artikel'] = $artikel;
        }else{
            $response['artikel'] = array();
            $response['error'] = false;
            $response['code'] = 2;
            $response['message'] = 'tidak ada data riwayat artikel anda';
        }

        return json_encode($response);
    }

    public function delete(Request $request){
        $id_user = $request->header('user');
        $id_artikel = $request->id;
        $delete = Artikel::where('id', $id_artikel)->update(['mode' => 'DELETE']);

        if($delete){
            $response['error'] = false;
            $response['code'] = 1;
            $response['message'] = 'artikel berhasil di hapus';
        }else{
            $response['error'] = false;
            $response['code'] = 2;
            $response['message'] = 'artikel gagal di hapus';
        }

        return json_encode($response);
    }


}
