<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\ApiResourcesSomasi;

use App\User;
use App\Konsultasi;
use App\LawyerPrice;
use App\Pembayaran;
use App\Pendampingan;
use App\PengajuanMember;
use App\Setting;
use App\Vicon;
use App\Tertulis;
use App\Pertemuan;
use App\Service;
use App\Notify;
use App\Somasi;
use App\HistoryPeraturan;
use App\HistoryLegalitas;

use DB;
use File;
use Storage;

class TransaksiController extends Controller{
    
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = 'Authorization: Basic '.base64_encode('xnd_development_nOFmAUz0H6Hy6smCBclyymhkxZNe5tvazFzLIJG5MkbFAa7fT3GWK8Y6Ar5N5D:');
    }

    public function allTagihan(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $pembayaran = Pembayaran::select('id', 'type', 'status', 'amount', 'created_at as created', 'detail_id')->where('lawyer_id', $request->user->id)->whereIn('type', ['MEMBERSHIP', 'PERATURAN'])->orderBy('id', 'desc')->get();
        }else{
            $pembayaran = Pembayaran::select('id', 'type', 'status', 'amount', 'created_at as created', 'detail_id')->where('client_id', $request->user->id)->orderBy('id', 'desc')->get();
        }
        foreach ($pembayaran as $k => $m) {
            if($m->type == 'LIVE_CHAT'){
                $data = Konsultasi::where('id', $m->detail_id)->first();
                $nama = $data->service->nama;
                $id = ($request->user->role != 'CLIENT')?$data->client_id:$data->lawyer_id;
                $user = User::find($id);
            }elseif($m->type == 'PENDAMPINGAN'){
                $pendampingan = Pendampingan::where('id', $m->detail_id)->first();
                $data = Konsultasi::where('id', $pendampingan->konsultasi_id)->first();
                $nama = $data->service->nama;
                $id = ($request->user->role != 'CLIENT')?$data->client_id:$data->lawyer_id;
                $user = User::find($id);
            }elseif($m->type == 'TERTULIS'){
                $tertulis = Tertulis::where('id', $m->detail_id)->first();
                $data = Konsultasi::where('id', $tertulis->konsultasi_id)->first();
                $nama = $data->service->nama;
                $id = ($request->user->role != 'CLIENT')?$data->client_id:$data->lawyer_id;
                $user = User::find($id);
            }elseif($m->type == 'VICON'){
                $vicon = Vicon::where('id', $m->detail_id)->first();
                $data = Konsultasi::where('id', $vicon->konsultasi_id)->first();
                $nama = $data->service->nama;
                $id = ($request->user->role != 'CLIENT')?$data->client_id:$data->lawyer_id;
                $user = User::find($id);
            }elseif($m->type == 'MEMBERSHIP'){
                $data = PengajuanMember::find($m->detail_id);
                $nama = 'Pengajuan Member';
                $user = User::find($data->user_id);
            }elseif($m->type == 'PERATURAN'){
                $data = HistoryPeraturan::find($m->detail_id);
                $nama = 'Pengajuan Langganan';
                $user = User::find($data->user_id);
            }elseif($m->type == 'LEGALITAS'){
                $data = HistoryLegalitas::find($m->detail_id);
                $nama = 'Pengajuan Legalitas';
                $id = ($request->user->role != 'CLIENT')?$data->client_id:$data->notaris_id;
                $user = User::find($id);
            }elseif($m->type == 'PENGAJUAN'){
                $nama = 'Pengajuan Layanan';
            }
            $list_pembayaran[] = collect($m)->prepend($nama , 'layanan')->prepend($user->nama_lengkap , 'nama_lengkap')->prepend($user->avatar , 'avatar');
        }
        return response()->json(['message' => 'All Tagihan', 'code' => 1, 'error' => false, 'list_pembayaran' => $list_pembayaran??[]]);
    }
    public function allInvoice(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $pembayaran = Pembayaran::select('id', 'type', 'status', 'amount', 'created_at as created', 'detail_id')->where('lawyer_id', $request->user->id)->where('type', 'MEMBERSHIP')->orderBy('id', 'desc')->get();
        }else{
            $pembayaran = Pembayaran::select('id', 'type', 'status', 'amount', 'created_at as created', 'detail_id')->where('client_id', $request->user->id)->orderBy('id', 'desc')->get();
        }
        foreach ($pembayaran as $k => $m) {
            if($m->type == 'LIVE_CHAT'){
                $konsultasi = Konsultasi::where('id', $m->detail_id)->first();
                $nama = $konsultasi->service->nama;
            }elseif($m->type == 'PENDAMPINGAN'){
                $pendampingan = Pendampingan::where('id', $m->detail_id)->first();
                $konsultasi = Konsultasi::where('id', $pendampingan->konsultasi_id)->first();
                $nama = $konsultasi->service->nama;
            }elseif($m->type == 'TERTULIS'){
                $tertulis = Tertulis::where('id', $m->detail_id)->first();
                $konsultasi = Konsultasi::where('id', $tertulis->konsultasi_id)->first();
                $nama = $konsultasi->service->nama;
            }elseif($m->type == 'VICON'){
                $vicon = Vicon::where('id', $m->detail_id)->first();
                $konsultasi = Konsultasi::where('id', $vicon->konsultasi_id)->first();
                $nama = $konsultasi->service->nama;
            }elseif($m->type == 'MEMBERSHIP'){
                $nama = 'Pengajuan Member';
            }elseif($m->type == 'PERATURAN'){
                $nama = 'Pengajuan Langganan';
            }elseif($m->type == 'LEGALITAS'){
                $nama = 'Pengajuan Legalitas';
            }elseif($m->type == 'PENGAJUAN'){
                $nama = 'Pengajuan Layanan';
            }
            $list_pembayaran[] = collect($m)->prepend($nama , 'layanan');
        }
        return response()->json(['message' => 'All Pembayaran', 'code' => 1, 'error' => false, 'list_pembayaran' => $list_pembayaran??[]]);
    }

    public function getInvoice(Request $request)
    {

        $id = $request->id;
        $pembayaran = Pembayaran::find($id);
        if(!$pembayaran){
            return response()->json(['message' => 'Pembayaran tidak ditemukan', 'code' => 0, 'error' => true]);
        }
        $url = 'https://api.xendit.co/v2/invoices/'.$pembayaran->payment_id;
        $curl = curl_init();
        $headers[] = $this->apiKey;
        $headers[] = 'Content-Type: application/json';
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        $data = json_decode($result, true); 
        if($pembayaran->type == 'LIVE_CHAT'){
            $lawyer = User::select('nama_lengkap', 'avatar')->where('id', $pembayaran->lawyer_id)->first();
        }
        return response()->json(['message' => 'Redirect URL', 'code' => 1, 'error' => false, 'nama' => $lawyer->nama_lengkap??'', 'avatar' => $lawyer->avatar??'', 'pembayaran' => $pembayaran, 'detail_pembayaran' => $data]);
    }

    public function callback(Request $request)
    {
        $pembayaran = Pembayaran::where('payment_id', $request->id)->first();
        if($request->status == 'PAID' || $request->status == 'SETTLED'){
            $pembayaran->update([
                'status'    => 'PAID'
            ]);
            // feed back konsultasi
            if($pembayaran->type == 'LIVE_CHAT'){
                Konsultasi::where('id', $pembayaran->detail_id)->update([
                    'status' => 'PAID'
                ]);
            }elseif($pembayaran->type == 'PENDAMPINGAN'){
                Pendampingan::where('id', $pembayaran->detail_id)->update([
                    'status' => 'PAID'
                ]);
            }elseif($pembayaran->type == 'TERTULIS'){
                Tertulis::where('id', $pembayaran->detail_id)->update([
                    'status' => 'PAID'
                ]);
            }elseif($pembayaran->type == 'VICON'){
                Vicon::where('id', $pembayaran->detail_id)->update([
                    'status' => 'PAID'
                ]);
            }elseif($pembayaran->type == 'PERTEMUAN'){
                Pertemuan::where('id', $pembayaran->detail_id)->update([
                    'status' => 'PAID'
                ]);
            }elseif($pembayaran->type == 'MEMBERSHIP'){
                $pengajuan = PengajuanMember::where('id', $pembayaran->detail_id)->first();
                $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + ".Setting::find(3)->value." day"));
                $pengajuan->update([
                    'status' => 'PAID',
                    'member_expired' => $oneYearOn
                ]);
                User::where('id', $pengajuan->user_id)->update([
                    'verified' => true
                ]);
            }elseif($pembayaran->type == 'PERATURAN'){
                $langganan = HistoryPeraturan::where('id', $pembayaran->detail_id)->first();
                $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + ".Setting::find(5)->value." day"));
                $langganan->update([
                    'status' => 'PAID',
                    'tanggal_langganan' => $oneYearOn
                    ]);
            }elseif($pembayaran->type == 'LEGALITAS'){
                $legalitas = HistoryLegalitas::where('id', $pembayaran->detail_id)->first();
                $legalitas->update([
                    'status' => 'PAID',
                ]);
            }
        }else{
            $pembayaran->update([
                'status'    => $request->status
            ]);
            // feed back konsultasi
            if($pembayaran->type == 'LIVE_CHAT'){
                Konsultasi::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'PENDAMPINGAN'){
                Pendampingan::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'TERTULIS'){
                Tertulis::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'VICON'){
                Vicon::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'PERTEMUAN'){
                Pertemuan::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'MEMBERSHIP'){
                PengajuanMember::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'PERATURAN'){
                HistoryPeraturan::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }elseif($pembayaran->type == 'LEGALITAS'){
                HistoryLegalitas::where('id', $pembayaran->detail_id)->update([
                    'status' => $request->status
                ]);
            }
        }
    }

    public function create(Request $request)
    {
        $required = Validate::required($request, ['id', 'type']);
        if ($required) return $required;
        $id = $request->id;
        if($request->type == 'LIVE_CHAT'){
            $konsultasi =  Konsultasi::where('id', $id)->where('client_id', $request->user->id)->first();
            if(!$konsultasi){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'LIVE_CHAT')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $konsultasi->lawyer_id;
            $client_id = $konsultasi->client_id;
            $harga = LawyerPrice::where('user_id', $konsultasi->lawyer_id)->where('service_id', $konsultasi->service_id)->first()->harga;
        }elseif($request->type == 'PENDAMPINGAN'){
            $required = Validate::required($request, ['amount']);
            if ($required) return $required;
            $pendampingan = Pendampingan::where('id', $id)->first();
            if(!$pendampingan){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            if($pendampingan->status != 'CONFIRM'){
                return response()->json(['message' => 'Pengajuan Sudah di tanggapi', 'code' => 0, 'error' => true]);
            }
            $konsultasi =  Konsultasi::where('id', $pendampingan->konsultasi_id)->where('lawyer_id', $request->user->id)->first();
            if(!$konsultasi){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'PENDAMPINGAN')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $konsultasi->lawyer_id;
            $client_id = $konsultasi->client_id;
            $harga = $request->amount;
            $pendampingan->update([
                'status' => 'WAITING_PAYMENT'
            ]);
        }elseif($request->type == 'TERTULIS'){
            $required = Validate::required($request, ['amount']);
            if ($required) return $required;
            $tertulis = Tertulis::where('id', $id)->first();
            if(!$tertulis){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            if($tertulis->status != 'CONFIRM'){
                return response()->json(['message' => 'Pengajuan Sudah di tanggapi', 'code' => 0, 'error' => true]);
            }
            $konsultasi =  Konsultasi::where('id', $tertulis->konsultasi_id)->where('lawyer_id', $request->user->id)->first();
            if(!$konsultasi){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'TERTULIS')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $konsultasi->lawyer_id;
            $client_id = $konsultasi->client_id;
            $harga = $request->amount;
            $tertulis->update([
                'status' => 'WAITING_PAYMENT'
            ]);
        }elseif($request->type == 'VICON'){
            $required = Validate::required($request, ['amount']);
            if ($required) return $required;
            $vicon = Vicon::where('id', $id)->first();
            if(!$vicon){
                return response()->json(['message' => 'Tagihan tidak ditemukan', 'code' => 0, 'error' => true]);
            }
            if($vicon->status != 'CONFIRM'){
                return response()->json(['message' => 'Pengajuan Sudah di tanggapi', 'code' => 0, 'error' => true]);
            }
            $konsultasi =  Konsultasi::where('id', $vicon->konsultasi_id)->where('lawyer_id', $request->user->id)->first();
            if(!$konsultasi){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'VICON')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $konsultasi->lawyer_id;
            $client_id = $konsultasi->client_id;
            $harga = $request->amount;
            $vicon->update([
                'status' => 'WAITING_PAYMENT'
            ]);
        }elseif($request->type == 'MEMBERSHIP'){
            $pengajuan = PengajuanMember::where('id', $id)->where('user_id', $request->user->id)->first();
            if(!$pengajuan){
                return response()->json(['message' => 'Tagihan tidak di temukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'MEMBERSHIP')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $request->user->id;
            $client_id = $request->user->id;
            $harga = Setting::find(2)->value;
            $pengajuan->update([
                'status' => 'WAITING_PAYMENT'
                ]);
        }elseif($request->type == 'PERATURAN'){
            $langganan = HistoryPeraturan::find($id);
            if($langganan->user_id != $request->user->id){
                return response()->json(['message' => 'Tagihan Tidak ditemukan', 'code' => 0, 'error' => true]);
            }
            $check = Pembayaran::where('type', 'PERATURAN')->where('detail_id', $id)->first();
            if($check){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $request->user->id;
            $client_id = $request->user->id;
            $harga = Setting::find(4)->value;
            $langganan->update([
                'status' => 'WAITING_PAYMENT'
            ]);
        }elseif($request->type == 'LEGALITAS'){
            $check = HistoryLegalitas::where('id', $id)->where('client_id', $request->user->id)->where('status', 'WAITING')->first();
            if(!$check){
                return response()->json(['message' => 'Tagihan tidak ditemukan', 'code' => 0, 'error' => true]);
            }
            if($check->client_id != $request->user->id){
                return response()->json(['message' => 'Tagihan Tidak ditemukan', 'code' => 0, 'error' => true]);
            }
            $checkP = Pembayaran::where('type', 'LEGALITAS')->where('detail_id', $id)->first();
            if($checkP){
                return response()->json(['message' => 'Tagihan sudah dibuat', 'code' => 2, 'error' => true]);
            }
            $lawyer_id = $check->notaris_id;
            $client_id = $request->user->id;
            $harga = LawyerPrice::where('user_id', $check->notaris_id)->where('service_id', $check->service_id)->first()->harga;
            $check->update([
                'status' => 'WAITING_PAYMENT'
            ]);
        }else{
            return response()->json(['message' => 'Type Pembayaran Salah', 'code' => 0, 'error' => true]);
        }
        $random = rand(3,999);
        $fix_harga = $harga + $random;
        // kode unik
        $kode_unik = substr($fix_harga, -3);
        // kode pembayaran
        $kode_pembayaran = 'MPL-'.time();
        $type = $request->type;
        
        $url = 'https://api.xendit.co/v2/invoices';
        $curl = curl_init();
        $headers[] = $this->apiKey;
        $headers[] = 'Content-Type: application/json';
        $data = [
            'external_id' => $kode_pembayaran,
            'amount' => $fix_harga??'',
            'payer_email' => $request->user->email??'',
            'description' => 'Pembayaran Tagihan '.ucwords(str_replace("_", " ", $type)).', Silahkan Transfer hingga 3 digit terakhir '.$kode_unik
        ];
        $payload = json_encode($data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($curl);
        $data = json_decode($result, true);
        $pembayaran = Pembayaran::create([
            'type'              => $type,
            'amount'            => $fix_harga,
            'detail_id'         => $id,
            'status'            => $data['status'],
            'kode_unik'         => $kode_unik, 
            'lawyer_id'         => $lawyer_id,
            'client_id'         => $client_id,
            'kode_pembayaran'   => $kode_pembayaran,
            'payment_id'        => $data['id'],
            'catatan'           => $request->catatan??'',
        ]);
        $lawyer = User::select('nama_lengkap', 'avatar')->where('id', $lawyer_id)->first();
        Notify::create(['type' => 'PEMBAYARAN', 'message' => 'Tagihan sudah di buat', 'reference_id' => $pembayaran->id, 'status' => true, 'user_id' => $client_id]);
        return response()->json(['message' => 'Buat Pembayaran Berhasil', 'code' => 1, 'error' => false, 'nama' => $lawyer->nama_lengkap, 'avatar' => $lawyer->avatar, 'pembayaran' => $pembayaran, 'detail_pembayaran' => $data]);
    }

    public function detailVicon(Request $request)
    {
        $id = $request->id;
        if($request->user->role != 'CLIENT'){
            $vicon = DB::table('video_conference')
            ->select('video_conference.id', 'users.nama_lengkap', 'users.avatar', 'video_conference.status', 'bidang_hukum.nama as layanan', 'video_conference.created_at as created', 'video_conference.tgl_pengajuan', 'video_conference.durasi', 'video_conference.alasan_tolak', 'video_conference.link')
            ->join('users', 'video_conference.client_id', '=', 'users.id')
            ->join('konsultasi', 'video_conference.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('video_conference.id', $id)
            ->first();
        }else{
            $vicon = DB::table('video_conference')
            ->select('video_conference.id', 'users.nama_lengkap', 'users.avatar', 'video_conference.status', 'bidang_hukum.nama as layanan', 'video_conference.created_at as created', 'video_conference.tgl_pengajuan', 'video_conference.durasi', 'video_conference.alasan_tolak', 'video_conference.link')
            ->join('users', 'video_conference.lawyer_id', '=', 'users.id')
            ->join('konsultasi', 'video_conference.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('video_conference.id', $id)
            ->first();
        }
        $pembayaran = Pembayaran::select('payment_id')->where('detail_id', $id)->where('type', 'VICON')->first();
        if($pembayaran){
            $url = 'https://api.xendit.co/v2/invoices/'.$pembayaran->payment_id;
            $curl = curl_init();
            $headers[] = $this->apiKey;
            $headers[] = 'Content-Type: application/json';
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $result = curl_exec($curl);
            $data = json_decode($result, true); 
        }
        if($vicon){
            return response()->json(['message' => 'Detail Vicon', 'code' => 1, 'error' => false, 'detail_vicon' => $vicon, 'detail_pembayaran' => $data??'']);
        }else{
            return response()->json(['message' => 'Vicon tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function detailPendampingan(Request $request)
    {
        $id = $request->id;
        if($request->user->role != 'CLIENT'){
            $pendampingan = DB::table('pendampingan')
            ->select('pendampingan.id', 'users.nama_lengkap', 'users.avatar', 'pendampingan.status', 'bidang_hukum.nama as layanan', 'pendampingan.created_at as created', 'pendampingan.option')
            ->join('users', 'pendampingan.client_id', '=', 'users.id')
            ->join('konsultasi', 'pendampingan.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('pendampingan.id', $id)
            ->first();
        }else{
            $pendampingan = DB::table('pendampingan')
            ->select('pendampingan.id', 'users.nama_lengkap', 'users.avatar', 'pendampingan.status', 'bidang_hukum.nama as layanan', 'pendampingan.created_at as created', 'pendampingan.option')
            ->join('users', 'pendampingan.lawyer_id', '=', 'users.id')
            ->join('konsultasi', 'pendampingan.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('pendampingan.id', $id)
            ->first();
        }
        $pembayaran = Pembayaran::select('payment_id')->where('detail_id', $id)->where('type', 'PENDAMPINGAN')->first();
        if($pembayaran){
            $url = 'https://api.xendit.co/v2/invoices/'.$pembayaran->payment_id;
            $curl = curl_init();
            $headers[] = $this->apiKey;
            $headers[] = 'Content-Type: application/json';
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $result = curl_exec($curl);
            $data = json_decode($result, true); 
        }

        if($pendampingan){
            if($pembayaran){
                return response()->json(['message' => 'Detail Pendampingan', 'code' => 1, 'error' => false, 'detail_pendampingan' => $pendampingan, 'detail_pembayaran' => $data??'']);
            }else{
                return response()->json(['message' => 'Detail Pendampingan', 'code' => 1, 'error' => false, 'detail_pendampingan' => $pendampingan]);
            }
        }else{
            return response()->json(['message' => 'Pendampingan tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function detailTertulis(Request $request)
    {
        $id = $request->id;
        $tertulis = DB::table('layanan_tertulis')
        ->select('layanan_tertulis.id', 'users.nama_lengkap', 'users.avatar', 'layanan_tertulis.status', 'bidang_hukum.nama as layanan', 'layanan_tertulis.created_at as created', 'layanan_tertulis.option', 'layanan_tertulis.alasan_tolak')
        ->join('users', 'layanan_tertulis.lawyer_id', '=', 'users.id')
        ->join('konsultasi', 'layanan_tertulis.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('layanan_tertulis.id', $id)
        ->first();
        $pembayaran = Pembayaran::select('payment_id')->where('detail_id', $id)->where('type', 'TERTULIS')->first();
        if($pembayaran){
            $url = 'https://api.xendit.co/v2/invoices/'.$pembayaran->payment_id;
            $curl = curl_init();
            $headers[] = $this->apiKey;
            $headers[] = 'Content-Type: application/json';
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $result = curl_exec($curl);
            $data = json_decode($result, true); 
        }
        $laporan_tertulis = ApiResourcesSomasi::collection(Somasi::where('tertulis_id', $id)->get());
        if($tertulis){
            return response()->json(['message' => 'Detail Tertulis', 'code' => 1, 'error' => false, 'detail_tertulis' => $tertulis, 'detail_pembayaran' => $data??'', 'laporan' => $laporan_tertulis??'']);
        }else{
            return response()->json(['message' => 'Layanan Tertulis tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function detailPertemuan(Request $request)
    {
        $id = $request->id;
        $pertemuan1 = Pertemuan::find($id);
        if($request->user->id == $pertemuan1->lawyer_id){
            $user = User::find($pertemuan1->client_id);
        }else{
            $user = User::find($pertemuan1->lawyer_id);
        }
        $pertemuan = collect($pertemuan1)->prepend($user->avatar??'', 'avatar')->prepend($user->nama_lengkap??'', 'nama_lengkap');
        if($pertemuan){
            return response()->json(['message' => 'Detail Pertemuan', 'code' => 1, 'error' => false, 'detail_pertemuan' => $pertemuan]);
        }else{
            return response()->json(['message' => 'Pertemuan tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

}
