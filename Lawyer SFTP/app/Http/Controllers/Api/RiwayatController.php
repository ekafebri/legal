<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;
use App\Pertanyaan;
use App\Jawaban;
use App\User;
use App\Service;
use App\Legalitas;

use DB;
use File;
use Storage;

class RiwayatController extends Controller{

    public function mypertanyaan(Request $request)
    {
        $pertanyaan_list = [];
        $pertanyaan = DB::table('users')
        ->select('pertanyaan.id as id', 'users.id as user_id', 'nama_lengkap', 'avatar', 'pertanyaan.created_at as tanggal_pertanyaan', 'budget', 'pertanyaan', 'kategori_layanan', 'pertanyaan.kota_client')
        ->join('pertanyaan', 'users.id', '=', 'pertanyaan.user_id')
        ->where('users.id', $request->user->id)
        ->orderBy('id', 'desc')
        ->get();
        foreach($pertanyaan as $m){
            $count = Jawaban::where('pertanyaan_id', $m->id)->count();
            $pertanyaan_list[] = collect($m)->prepend($count, 'jawaban_count');
        }
        return response()->json(['message' => 'Data my pertanyaan', 'code' => 1, 'error' => false, 'pertanyaan' => $pertanyaan_list]);
    }
    
    public function jawabPertanyaan(Request $request)
    {
        $id = $request->pertanyaan_id;
        $required = Validate::required($request, ['judul_jawaban', 'deskripsi_jawaban']);
        if ($required) return $required;
        $sudah = Jawaban::where('user_id', $request->user->id)->where('pertanyaan_id', $id)->first();
        if($sudah){
            return response()->json(['message' => 'Pertanyaan sudah dijawab', 'code' => 3, 'error' => true]);
        }
        $count = Jawaban::where('pertanyaan_id', $id)->count();
        if($count >= 2){
            Pertanyaan::where('id', $id)->update([
                'status' => false
                ]);
        }
        if($count >= 3){
            Pertanyaan::where('id', $id)->update([
                'status' => false
                ]);
            return response()->json(['message' => 'Pertanyaan sudah dijawab 3 kali', 'code' => 2, 'error' => true]);
        }
        Jawaban::create(array_merge($request->all(), [
            'pertanyaan_id' => $id,
            'user_id' => $request->user->id,
            ]));
        return response()->json(['message' => 'Pertanyaan berhasil dijawab', 'code' => 1, 'error' => false]);
    }
    
    public function detailPertanyaanLawyer(Request $request)
    {
        $id = $request->pertanyaan_id;
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::select('id','user_id', 'judul_jawaban', 'deskripsi_jawaban', 'pertanyaan_id', 'created_at as tanggal_jawaban')->where('pertanyaan_id', $id)->where('user_id', $request->user->id)->get();
        foreach ($jawaban as $m) {
            $lawyer = User::select('nama_lengkap', 'avatar')->where('id', $m->user_id)->first();
            $jawaban_list[] = collect($m)->prepend($lawyer->nama_lengkap, 'nama')->prepend($lawyer->avatar, 'avatar');
        }
        if(!isset($jawaban_list)){
            $jawaban_list = [];
        }
        $pertanyaan_detail = collect($pertanyaan)->prepend($jawaban_list, 'jawaban');
        return response()->json(['message' => 'Detail Pertanyaan', 'code' => 1, 'error' => false, 'pertanyaan_detail' => $pertanyaan_detail]);
    }

    public function detailPertanyaan(Request $request)
    {
        $id = $request->pertanyaan_id;
        $pertanyaan = Pertanyaan::find($id);
        $jawaban = Jawaban::select('id','user_id', 'judul_jawaban', 'deskripsi_jawaban', 'pertanyaan_id', 'created_at as tanggal_jawaban')->where('pertanyaan_id', $id)->get();
        foreach ($jawaban as $m) {
            $lawyer = User::select('nama_lengkap', 'avatar')->where('id', $m->user_id)->first();
            $jawaban_list[] = collect($m)->prepend($lawyer->nama_lengkap, 'nama')->prepend($lawyer->avatar, 'avatar');
        }
        if(!isset($jawaban_list)){
            $jawaban_list = [];
        }
        $pertanyaan_detail = collect($pertanyaan)->prepend(count($jawaban), 'jawaban_count')->prepend($jawaban_list, 'jawaban');
        return response()->json(['message' => 'Detail Pertanyaan', 'code' => 1, 'error' => false, 'pertanyaan_detail' => $pertanyaan_detail]);
    }

    public function allPertanyaan(Request $request)
    {
        if($request->user->type == 'KANTOR_HUKUM'){
            $pertanyaan = DB::table('users')
            ->select('pertanyaan.id as id', 'users.id as user_id', 'nama_lengkap', 'avatar', 'pertanyaan.created_at as tanggal_pertanyaan', 'budget', 'pertanyaan', 'kategori_layanan')
            ->join('pertanyaan', 'users.id', '=', 'pertanyaan.user_id')
            ->where('pertanyaan.status', true)
            ->where('pertanyaan.kategori', 'KANTOR_HUKUM')
            ->orderBy('id', 'desc')
            ->get();
        }else{
            $pertanyaan = DB::table('users')
            ->select('pertanyaan.id as id', 'users.id as user_id', 'nama_lengkap', 'avatar', 'pertanyaan.created_at as tanggal_pertanyaan', 'budget', 'pertanyaan', 'kategori_layanan')
            ->join('pertanyaan', 'users.id', '=', 'pertanyaan.user_id')
            ->where('pertanyaan.status', true)
            ->where('pertanyaan.kategori', 'LAWYER')
            ->orderBy('id', 'desc')
            ->get();
        }
        foreach($pertanyaan as $m){
            $count = Jawaban::where('pertanyaan_id', $m->id)->count();
            $pertanyaan_list[] = collect($m)->prepend($count, 'jawaban_count');
        }
        return response()->json(['message' => 'Data all pertanyaan', 'code' => 1, 'error' => false, 'pertanyaan' => $pertanyaan_list??[]]);
    }
    
    public function getKonsultasi(Request $request)
    {
        $konsultasi_list = [];
        $id = $request->user->id;
        if($request->user->role != 'CLIENT'){
            $konsultasi = DB::table('users')
            ->select('konsultasi.id as id','users.id as client_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'service_id', 'konsultasi.update_konsultasi as update')
            ->join('konsultasi', 'users.id', '=', 'konsultasi.client_id')
            ->where('konsultasi.lawyer_id', $id)
            ->whereIn('konsultasi.status', ['CANCEL_LAWYER', 'CANCEL_CLIENT', 'FINISH'])
            ->orderBy('update')
            ->get();
            foreach($konsultasi as $m){
                if($m->service_id == 0){
                    $nama = 'Probono';
                }else{
                    $service = Service::find($m->service_id);
                    $nama = $service->nama;
                }
                if(!empty($m->alasan)){
                    $alasan = $m->alasan;
                }else{
                    $alasan = '';
                }
                $konsultasi_list[] = collect($m)->except(['service_id', 'alasan'])->prepend($alasan, 'alasan_tolak')->prepend($nama, 'layanan');
            }
            return response()->json(['message' => 'Data konsultasi', 'code' => 1, 'error' => false, 'my_konsultasi' => $konsultasi_list]);
            
        }else{
            $konsultasi = DB::table('users')
            ->select('konsultasi.id as id','users.id as lawyer_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'service_id', 'konsultasi.update_konsultasi as update')
            ->join('konsultasi', 'users.id', '=', 'konsultasi.lawyer_id')
            ->where('konsultasi.client_id', $id)
            ->whereIn('konsultasi.status', ['CANCEL_LAWYER', 'CANCEL_CLIENT', 'FINISH'])
            ->orderBy('update')
            ->get();

            foreach($konsultasi as $m){
                if($m->service_id == 0){
                    $nama = 'Probono';
                }else{
                    $service = Service::find($m->service_id);
                    $nama = $service->nama;
                }
                if(!empty($m->alasan)){
                    $alasan = $m->alasan;
                }else{
                    $alasan = '';
                }
                $konsultasi_list[] = collect($m)->except(['service_id', 'alasan'])->prepend($alasan, 'alasan_tolak')->prepend($nama, 'layanan');
            }
            
            return response()->json(['message' => 'Data konsultasi', 'code' => 1, 'error' => false, 'my_konsultasi' => $konsultasi_list]);
        }
    }

    public function liveChat(Request $request)
    {
        $konsultasi_list = [];
        $id = $request->user->id;
        if($request->user->role != 'CLIENT'){
            $konsultasi = DB::table('users')
            ->select('konsultasi.id as id','users.id as client_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'service_id', 'konsultasi.unread_message_lawyer as unread_message1', 'konsultasi.lawyer_id')
            ->join('konsultasi', 'users.id', '=', 'konsultasi.client_id')
            ->where('konsultasi.lawyer_id', $id)
            ->whereNotIn('konsultasi.status', ['FINISH', 'CANCEL_LAWYER', 'CANCEL_CLIENT'])
            ->orderBy('update_konsultasi', 'desc')
            ->get();
            foreach($konsultasi as $m){
                if($m->service_id == 0){
                    $nama = 'Probono';
                }else{
                    $service = Service::find($m->service_id);
                    $nama = $service->nama??'';
                }
                if(User::find($m->lawyer_id)->role == 'NOTARIS'){
                    $type = 'NOTARIS';
                    $service = Legalitas::find($m->service_id);
                    $nama = $service->nama;
                }elseif(User::find($m->lawyer_id)->role == 'LAWYER' && User::find($m->lawyer_id)->type == 'ADVOKAT'){
                    $type = 'ADVOKAT';
                }elseif(User::find($m->lawyer_id)->role == 'LAWYER' && User::find($m->lawyer_id)->type == 'KANTOR_HUKUM'){
                    $type = 'KANTOR_HUKUM';
                }
                if(!empty($m->alasan)){
                    $alasan = $m->alasan;
                }else{
                    $alasan = '';
                }
                $unread_message = $m->unread_message1??"0";
                $konsultasi_list[] = collect($m)->except(['service_id', 'alasan', 'unread_message1'])->prepend($unread_message, 'unread_message')->prepend($alasan, 'alasan_tolak')->prepend($type, 'type')->prepend($nama, 'layanan');
            }
            return response()->json(['message' => 'Data konsultasi', 'code' => 1, 'error' => false, 'my_konsultasi' => $konsultasi_list]);
            
        }else{
            $konsultasi = DB::table('users')
            ->select('konsultasi.id as id','users.id as lawyer_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'service_id', 'konsultasi.unread_message_client as unread_message1')
            ->join('konsultasi', 'users.id', '=', 'konsultasi.lawyer_id')
            ->where('konsultasi.client_id', $id)
            ->whereNotIn('konsultasi.status', ['FINISH', 'CANCEL_LAWYER', 'CANCEL_CLIENT'])
            ->orderBy('update_konsultasi', 'desc')
            ->get();
            
            foreach($konsultasi as $m){
                if($m->service_id == 0){
                    $nama = 'Probono';
                }else{
                    $service = Service::find($m->service_id);
                    $nama = $service->nama??'';
                }
                if(User::find($m->lawyer_id)->role == 'NOTARIS'){
                    $type = 'NOTARIS';
                    $service = Legalitas::find($m->service_id);
                    $nama = $service->nama;
                }elseif(User::find($m->lawyer_id)->role == 'LAWYER' && User::find($m->lawyer_id)->type == 'ADVOKAT'){
                    $type = 'ADVOKAT';
                }elseif(User::find($m->lawyer_id)->role == 'LAWYER' && User::find($m->lawyer_id)->type == 'KANTOR_HUKUM'){
                    $type = 'KANTOR_HUKUM';
                }
                if(!empty($m->alasan)){
                    $alasan = $m->alasan;
                }else{
                    $alasan = '';
                }
                $unread_message = $m->unread_message1??"0";
                $konsultasi_list[] = collect($m)->except(['service_id', 'alasan', 'unread_message1'])->prepend($unread_message, 'unread_message')->prepend($alasan, 'alasan_tolak')->prepend($type, 'type')->prepend($nama, 'layanan');
            }
            
            return response()->json(['message' => 'Data Live Chat', 'code' => 1, 'error' => false, 'live_chat' => $konsultasi_list]);
        }
    }
}
