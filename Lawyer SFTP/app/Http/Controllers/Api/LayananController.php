<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\TransaksiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;
use App\Libraries\Firebase;
use App\Http\Resources\ApiResourcesLawyer;

use App\User;
use App\Legalitas;
use App\LayananClient;
use App\Pertanyaan;
use App\Peraturan;
use App\PeraturanDetail;
use App\Konsultasi;
use App\Chat;
use App\LawyerDetail;
use App\LawyerPrice;
use App\Vicon;
use App\Tertulis;
use App\Pendampingan;
use App\Pertemuan;
use App\Report;
use App\Service;
use App\Pembayaran;
use App\Notify;
use App\MahkamahAgung;
use App\Somasi;
use App\Rating;
use App\HistoryLegalitas;

use DB;

class LayananController extends Controller{

    public function lawyerProbono(Request $request)
    {
        $probono = LayananClient::select('id', 'nama', 'image', 'deskripsi')->where('id', 4)->first();
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id', 'nama_lengkap', 'avatar', 'gelar', 'status_app as status_online', 'lawyer.bio as deskripsi_layanan')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->where('users.role', 'LAWYER')
        ->where('lawyer.probono', true)
        ->get();
        $lawyercollection =  ApiResourcesLawyer::collection($lawyer);
        return response()->json(['message' => 'Data Lawyer Probono', 'code' => 1, 'error' => false, 'probono' => $probono, 'lawyer_probono' => $lawyercollection]);
    }

    public function lawyerOnline(Request $request)
    {
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id', 'nama_lengkap', 'avatar', 'gelar', 'status_app as status_online', 'lawyer.bio as deskripsi_layanan')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->where('users.role', 'LAWYER')
        ->where('users.status_app', true)
        ->get();
        return response()->json(['message' => 'Data Lawyer Online', 'code' => 1, 'error' => false,  'lawyer_online' => $lawyer]);
    }

    public function lawyerKh(Request $request)
    {
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id','nama_lengkap', 'avatar', 'gelar', 'status_app as status_online', 'lawyer.bio as deskripsi_layanan')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->where('users.role', 'LAWYER')
        ->where('users.type', 'KANTOR_HUKUM')
        ->where('users.status_app', true)
        ->get();
        return response()->json(['message' => 'Data Lawyer Online', 'code' => 1, 'error' => false,  'kantor_hukum' => $lawyer]);
    }
    
    public function getLegalitas(Request $request)
    {
        $legalitas = Legalitas::select('id', 'image', 'nama')->whereStatus(true)->get();
        return response()->json(['message' => 'Data Layanan Legalitas', 'code' => 1, 'error' => false, 'legalitas' => $legalitas]);
    }

    public function legalitas(Request $request)
    {
        
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }

        $legalitas = HistoryLegalitas::create([
            'notaris_id' => $lawyer_id,
            'service_id' => $service_id,
            'client_id' => $request->user->id,
            'status' => 'WAITING'
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $vicon->id,
            'type'          => 'LEGALITAS',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan legalitas', $chat, 'CHAT');
        Notify::create(['type' => 'LEGALITAS', 'message' => 'Anda mendapatkan pengajuan legalitas dari '.$request->user->nama_lengkap, 'reference_id' => $vicon->id, 'status' => true, 'user_id' => $penerima]);
        return response()->json(['message' => 'Berhasil Ajukan Legalitas', 'code' => 1, 'error' => false, 'legalitas' => $legalitas]);
    }
    
    public function createPertanyaan(Request $request)
    {
        $required = Validate::required($request, ['judul_pertanyaan', 'kategori_layanan', 'budget', 'pertanyaan', 'penjelasan', 'kota_client', 'provinsi_client']);
        if ($required) return $required;
        Pertanyaan::create(array_merge($request->all(),[
            'status' => true,
            'user_id'=> $request->user->id,
            'kategori'=> 'LAWYER'
            ]));
        return response()->json(['message' => 'Berhasil membuat pertanyaan', 'code' => 1, 'error' => false]); 
    }

    public function createPertanyaanKH(Request $request)
    {
        $required = Validate::required($request, ['judul_pertanyaan', 'kategori_layanan', 'pertanyaan', 'penjelasan', 'kota_client', 'provinsi_client']);
        if ($required) return $required;
        Pertanyaan::create(array_merge($request->all(),[
            'status' => true,
            'user_id'=> $request->user->id,
            'kategori'=> 'KANTOR_HUKUM'
        ]));
        return response()->json(['message' => 'Berhasil membuat pertanyaan', 'code' => 1, 'error' => false]); 
    }
    
    public function peraturanAll(Request $request)
    {
        $peraturan = Peraturan::withCount('detail as count')->orderBy('id')->get();
        return response()->json(['message' => 'Data Peraturan', 'code' => 1, 'error' => false, 'peraturan' => $peraturan??[]]);
    }

    public function peraturanList(Request $request)
    {
        $id = $request->id;
        $peraturan = PeraturanDetail::select('id as detail_id', 'peraturan_id', 'judul', 'nomer')->where('peraturan_id', $id)->orderBy('id')->get();
        return response()->json(['message' => 'Data Detail Peraturan', 'code' => 1, 'error' => false, 'peraturan' => $peraturan]);
    }
    
    public function detailPeraturan(Request $request)
    {
        $id = $request->detail_id;
        $peraturan_detail = PeraturanDetail::select('id','nomer', 'judul', 'jenis', 'instansi', 'tgl_ditetapkan', 'no_bn', 'no_tbn', 'tgl_diundingkan', 'file')->where('id', $id)->orderBy('id', 'desc')->first();
        if($peraturan_detail){
            $peraturan = [
                'id'    => $peraturan_detail->id,
                'nomer'    => $peraturan_detail->nomer,
                'judul'    => $peraturan_detail->judul,
                'jenis'    => $peraturan_detail->jenis,
                'instansi'    => $peraturan_detail->instansi,
                'tgl_ditetapkan'    => $peraturan_detail->tgl_ditetapkan,
                'no_bn'    => $peraturan_detail->no_bn,
                'no_tbn'    => $peraturan_detail->no_tbn,
                'tgl_diundingkan'    => $peraturan_detail->tgl_diundingkan,
            ];
        }else{
            return response()->json(['message' => 'Tidak ada peraturan', 'code' => 0, 'error' => true]);
        }
        $file = json_decode($peraturan_detail->file);
        return response()->json(['message' => 'Data Detail Peraturan', 'code' => 1, 'error' => false, 'peraturan_detail' => $peraturan, 'file' => $file??[]]);
    }
    
    public function probono(Request $request)
    {
        $required = Validate::required($request, ['lawyer_id']);
        if ($required) return $required;
        $lawyer_id  = $request->lawyer_id;
        $service_id = 0;
        $check = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->where('status', 'ON_GOING')->first();
        if($check){
            return response()->json(['message' => 'Konsultasi Sedang Berlangsung', 'code' => 0, 'error' => true, 'konsultasi' => $check]);
        }
        $checkExp = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->where('status', 'EXPIRED')->first();
        if($checkExp){
            return response()->json(['message' => 'Konsultasi Expired', 'code' => 3, 'error' => true, 'konsultasi' => $checkExp]);
        }
        $konsultasi = Konsultasi::create([
            'lawyer_id' => $lawyer_id,
            'client_id' => $request->user->id,
            'service_id'=> $service_id,
            'status'    => 'ON_GOING'
        ]);
        return response()->json(['message' => 'Berhasil Konsultasi', 'code' => 1, 'error' => false, 'konsultasi' => $konsultasi]);
    }

    public function konsultasi(Request $request)
    {
        $required = Validate::required($request, ['lawyer_id', 'service_id']);
        if ($required) return $required;
        $lawyer_id  = $request->lawyer_id;
        $service_id = $request->service_id;
        // cek if lawyer not have konsultasi
        $checkService = LawyerDetail::where('user_id', $lawyer_id)->where('service', 'like', '%"'.$service_id.'"%')->first();
        if(!$checkService){
            return response()->json(['message' => 'Lawyer tidak memiliki layanan tersebut', 'code' => 2, 'error' => true]);
        }
        // cek if konsultasi berlangsung
        $check = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->whereIn('status', ['ON_GOING', 'PAID'])->first();
        if($check){
            return response()->json(['message' => 'Konsultasi Sedang Berlangsung', 'code' => 0, 'error' => true, 'konsultasi' => $check]);
        }
        // cek if expired
        $checkExp = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->where('status', 'EXPIRED')->first();
        if($checkExp){
            // cek if 1 day create new konsultasi
            if(date("Y-m-d H:i:s") > $checkExp->updated_at->modify('+1 day')){
                $konsultasi = Konsultasi::create([
                    'lawyer_id' => $lawyer_id,
                    'client_id' => $request->user->id,
                    'service_id'=> $service_id,
                    'status'    => 'ON_GOING'
                ]);
                return response()->json(['message' => 'Berhasil Konsultasi', 'code' => 1, 'error' => false, 'konsultasi' => $konsultasi]);
            }else{
                return response()->json(['message' => 'Konsultasi Expired', 'code' => 3, 'error' => true, 'konsultasi' => $checkExp]);
            }
        }
        // create new konsultasi
        $konsultasi = Konsultasi::create([
            'lawyer_id' => $lawyer_id,
            'client_id' => $request->user->id,
            'service_id'=> $service_id,
            'status'    => 'ON_GOING'
        ]);
        return response()->json(['message' => 'Berhasil Konsultasi', 'code' => 1, 'error' => false, 'konsultasi' => $konsultasi]);
    }
    
    public function chat(Request $request)
    {
        $required = Validate::required($request, ['id', 'message', 'type']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::find($id);
        
        if($konsultasi->status == 'FINISH'){
            return response()->json(['message' => 'Konsultasi Sudah selesai', 'code' => 0, 'error' => true, 'konsultasi' => $konsultasi]);
        }
        if($request->user->role != 'CLIENT'){
            if($request->user->id != $konsultasi->lawyer_id){
                return response()->json(['message' => 'Anda tidak bisa mengirim pesan', 'code' => 2,  'error' => false]);
            }
        }else{
            if($request->user->id != $konsultasi->client_id){
                return response()->json(['message' => 'Anda tidak bisa mengirim pesan', 'code' => 2,  'error' => false]);
            }
        }
        if($request->type == 'TEXT'){
            $pesan = $request->message;
        }else{
            $pesan = $request->file('message')->store('message');
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
            $unread_message_lawyer = $konsultasi->unread_message_lawyer + 1;
            $unread_message_client = $konsultasi->unread_message_client;
        }else{
            $penerima = $konsultasi->client_id;
            $unread_message_lawyer = $konsultasi->unread_message_lawyer;
            $unread_message_client = $konsultasi->unread_message_client + 1;
        }
        $konsultasi->update([
            'update_konsultasi'        => date('Y-m-d H:i:s'),
            'unread_message_lawyer'    => $unread_message_lawyer,
            'unread_message_client'    => $unread_message_client
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $pesan,
            'type'          => $request->type,
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pesan', $chat, 'CHAT');
        return response()->json(['message' => 'Berhasil Mengirim Pesan', 'code' => 1, 'error' => false,'chat' => $chat]);
    }

    public function vicon(Request $request)
    {
        $required = Validate::required($request, ['id', 'nama', 'email', 'tgl_pengajuan', 'durasi']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }
        $vicon = Vicon::create([
            'nama'  => $request->nama,
            'email'  => $request->email,
            'konsultasi_id'  => $id,
            'lawyer_id'  => $konsultasi->lawyer_id,
            'client_id'  => $konsultasi->client_id,
            'tgl_pengajuan'  => $request->tgl_pengajuan,
            'durasi'  => $request->durasi,
            'status'  => 'WAITING',
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $vicon->id,
            'type'          => 'VICON',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan vicon', $chat, 'CHAT');
        Notify::create(['type' => 'VICON', 'message' => 'Anda mendapatkan pengajuan vicon dari '.$request->nama, 'reference_id' => $vicon->id, 'status' => true, 'user_id' => $penerima]);
        return response()->json(['message' => 'Berhasil Melakukan Pengajuan', 'code' => 1, 'error' => false,'chat' => $chat]);
    }

    public function pertemuan(Request $request)
    {
        $required = Validate::required($request, ['id', 'nama', 'email', 'tgl_pengajuan']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }
        $pertemuan = Pertemuan::create([
            'nama'  => $request->nama,
            'email'  => $request->email,
            'konsultasi_id'  => $id,
            'lawyer_id'  => $konsultasi->lawyer_id,
            'client_id'  => $konsultasi->client_id,
            'tgl_pengajuan'  => $request->tgl_pengajuan,
            'status'  => 'WAITING',
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $pertemuan->id,
            'type'          => 'PERTEMUAN',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan pertemuan', $chat, 'CHAT');
        Notify::create(['type' => 'PERTEMUAN', 'message' => 'Anda mendapatkan pengajuan pertemuan dari '.$request->nama, 'reference_id' => $pertemuan->id, 'status' => true, 'user_id' => $penerima]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan pertemuan', $chat, 'CHAT');
        return response()->json(['message' => 'Berhasil Melakukan Pengajuan', 'code' => 1, 'error' => false,'chat' => $chat]);
    }

    public function tertulis(Request $request)
    {
        $required = Validate::required($request, ['id', 'option']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }
        $tertulis = Tertulis::create([
            'option'        => $request->option,
            'konsultasi_id' => $id,
            'lawyer_id'     => $konsultasi->lawyer_id,
            'client_id'     => $konsultasi->client_id,
            'status'        => 'WAITING',
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $tertulis->id,
            'type'          => 'TERTULIS',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan tertulis', $chat, 'CHAT');
        return response()->json(['message' => 'Berhasil Melakukan Pengajuan', 'code' => 1, 'error' => false,'chat' => $chat]);
    }

    public function pendampingan(Request $request)
    {
        $required = Validate::required($request, ['id', 'option']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }
        $pendampingan = Pendampingan::create([
            'option'        => $request->option,
            'konsultasi_id' => $id,
            'lawyer_id'     => $konsultasi->lawyer_id,
            'client_id'     => $konsultasi->client_id,
            'status'        => 'WAITING',
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $pendampingan->id,
            'type'          => 'PENDAMPINGAN',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan pengajuan pendampingan', $chat, 'CHAT');
        Notify::create(['type' => 'PENDAMPINGAN', 'message' => 'Anda mendapatkan pengajuan pendampingan dari '.User::find($konsultasi->client_id)->nama_lengkap, 'reference_id' => $pendampingan->id, 'status' => true, 'user_id' => $penerima]);
        return response()->json(['message' => 'Berhasil Melakukan Pengajuan', 'code' => 1, 'error' => false,'chat' => $chat]);
    }

    public function report(Request $request)
    {
        $required = Validate::required($request, ['id', 'judul_report', 'penjelasan', 'file']);
        if ($required) return $required;
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        $checkkonsultasi = Konsultasi::where('id', $id)->whereNotIn('status', ['ON_GOING', 'PAID', 'ONGOING'])->first();
        if($checkkonsultasi){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->client_id == $request->user->id){
            $penerima = $konsultasi->lawyer_id;
        }else{
            $penerima = $konsultasi->client_id;
        }
        foreach($request->file('file') as $v) {
            $filename[] = $v->store('file');
        }
        $report = Report::create([
            'judul_report'  => $request->judul_report,
            'konsultasi_id' => $id,
            'lawyer_id'     => $konsultasi->lawyer_id,
            'client_id'     => $konsultasi->client_id,
            'penjelasan'    => $request->penjelasan,
            'file'          => json_encode($filename)
        ]);
        $chat = Chat::create([
            'konsultasi_id' => $id,
            'message'       => $report->id,
            'type'          => 'REPORT',
            'penerima_id'   => $penerima,
            'pengirim_id'   => $request->user->id,
        ]);
        Firebase::send(User::find($penerima)->fcm_token, 'Anda mendapatkan report', $chat, 'CHAT');
        return response()->json(['message' => 'Berhasil Melakukan Report', 'code' => 1, 'error' => false,'chat' => $chat]);
    }
    
    public function getChat(Request $request)
    {
        $chat = Chat::select('id', 'pengirim_id', 'penerima_id', 'message', 'type', 'konsultasi_id', 'created_at as created')->where('konsultasi_id', $request->id)->get();
        $konsultasi = Konsultasi::where('id', $request->id)->first();
        $service = LawyerPrice::where('user_id', $konsultasi->lawyer_id)->where('service_id', $konsultasi->service_id)->first();
        if($request->user->role != 'CLIENT'){
            $user_lawan = User::find($konsultasi->client_id);
            $konsultasi->update([
                'unread_message_lawyer' => 0
            ]);
        }else{
            $user_lawan = User::find($konsultasi->lawyer_id);
            $konsultasi->update([
                'unread_message_client' => 0
            ]);
        }
        if($konsultasi->status == 'EXPIRED'){
            return response()->json(['message' => 'Konsultasi Expired', 'code' => 3, 'error' => true]);
        }
        
        if($konsultasi->status == 'CANCEL_LAWYER' || $konsultasi->status == 'CANCEL_CLIENT' ){
            return response()->json(['message' => 'Konsultasi telah dibatalkan', 'code' => 2, 'error' => true, 'alasan' => $konsultasi->alasan_tolak]);
        }
        $chat1= [];
        foreach ($chat as $m) {
            if($m->type == 'PERTEMUAN'){
                $data = Pertemuan::where('id', $m->message)->first();
                $tgl_pengajuan = $data->tgl_pengajuan;
            }elseif($m->type == 'VICON'){
                $data = Vicon::where('id', $m->message)->first();
                $tgl_pengajuan = $data->tgl_pengajuan;
            }elseif($m->type == 'PENDAMPINGAN'){
                $data = Pendampingan::where('id', $m->message)->first();
                $option = $data->option;
            }elseif($m->type == 'TERTULIS'){
                $data = Tertulis::where('id', $m->message)->first();
                $option = $data->option;
            }
            $chat1[] = collect($m)->prepend($tgl_pengajuan??'', 'tgl_pengajuan')->prepend($option??'', 'option');
        }
        if(User::find($konsultasi->lawyer_id)->role == 'LAWYER'){
            $layanan = $konsultasi->service->nama??'Probono';
        }else{
            $layanan = Legalitas::find($konsultasi->service_id)->nama;
        }
        if($konsultasi->status == 'FINISH'){
            return response()->json(['message' => 'Sesi Konsultasi telah berakhir', 'code' => 4, 'error' => false, 'chat' => $chat1,'id_lawan' => $user_lawan->id, 'avatar_lawan' => $user_lawan->avatar, 'nama_lawan' => $user_lawan->nama_lengkap, 'harga_vicon' => $service->harga_vicon??'', 'harga_live_chat' => $service->harga??'']);
        }
        return response()->json(['message' => 'Data Chat', 'code' => 1, 'error' => false, 'id' =>  $request->id,  'chat' => $chat1,'id_lawan' => $user_lawan->id, 'avatar_lawan' => $user_lawan->avatar, 'nama_lawan' => $user_lawan->nama_lengkap, 'harga_vicon' => $service->harga_vicon??'', 'harga_live_chat' => $service->harga??'', 'layanan' => $layanan]);
    }
    
    public function getLayananLawyer(Request $request)
    {
        $id = $request->id;
        $lawyer = LawyerDetail::where('user_id', $id)->first();
        if($lawyer){
            $serviceLawyer = json_decode($lawyer->service);
            $service = Service::select('id', 'nama')->whereIn('id', $serviceLawyer)->get();
            
            return response()->json(['message' => 'Data Service', 'code' => 1, 'error' => false, 'service' => $service]);
        }else{
            return response()->json(['message' => 'Laywer Tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }
    
    public function expired(Request $request)
    {
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        $alasan = $request->alasan;
        $konsultasi = Konsultasi::where('id', $id)->where('client_id', $request->user->id)->first();
        if($konsultasi){
            if($konsultasi->status == 'ON_GOING'){
                $konsultasi->update([
                    'status' => 'EXPIRED',
                    'alasan_tolak' => $alasan
                ]);
                return response()->json(['message' => 'Konsultasi expired', 'code' => 1, 'error' => false]);
            }elseif($konsultasi->status != 'ON_GOING'){
                return response()->json(['message' => 'Konsultasi sudah diselesaikan', 'code' => 2, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function cancelKonsultasi(Request $request)
    {
        $required = Validate::required($request, ['id', 'alasan']);
        if ($required) return $required;
        $id = $request->id;
        $alasan = $request->alasan;
        $konsultasi = Konsultasi::find($id);
        if($konsultasi){
            if($konsultasi->status == 'ON_GOING'){
                if($request->user->role != 'CLIENT'){
                    if($konsultasi->lawyer_id != $request->user->id){
                        return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    $konsultasi->update([
                        'status' => 'CANCEL_LAWYER',
                        'alasan_tolak' => $alasan
                    ]);
                }else{
                    if($konsultasi->client_id != $request->user->id){
                        return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    $konsultasi->update([
                        'status' => 'CANCEL_CLIENT',
                        'alasan_tolak' => $alasan
                    ]);
                }
                return response()->json(['message' => 'Konsultasi berhasil dibatalkan', 'code' => 1, 'error' => false]);
            }elseif($konsultasi->status != 'ON_GOING'){
                return response()->json(['message' => 'Konsultasi sudah diselesaikan', 'code' => 2, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function finish(Request $request)
    {
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        if($request->type == 'PENDAMPINGAN'){
            $data = Pendampingan::find($id);
        }elseif($request->type == 'TERTULIS'){
            $data = Tertulis::find($id);
        }elseif($request->type == 'VICON'){
            $data = Vicon::find($id);
        }elseif($request->type == 'LEGALITAS'){
            $data = HistoryLegalitas::find($id);
        }else{
            return response()->json(['message' => 'Pengajuan tidak ditemukan', 'code' => 0, 'error' => true]);
        }
        if($data){
            if($data->status == 'PAID'){
                if($request->user->role != 'CLIENT'){
                    if($data->lawyer_id != $request->user->id){
                        return response()->json(['message' => 'Pengajuan tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    $data->update([
                        'status' => 'FINISH_LAWYER'
                    ]);
                    return response()->json(['message' => 'Pengajuan berhasil di selesaikan', 'code' => 1, 'error' => false]);
                }else{
                    $required = Validate::required($request, ['review', 'rating', 'type']);
                    if ($required) return $required;
                    if($data->client_id != $request->user->id){
                        return response()->json(['message' => 'Pengajuan tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    if($data->status == 'FINISH'){
                        return response()->json(['message' => 'Pengajuan Sudah ditanggapi', 'code' => 0, 'error' => true]);
                    }
                    Rating::create([
                        'rating' => $request->rating,
                        'review' => $request->review,
                        'type' => $request->type,
                        'reference_id' => $request->id,
                        'client_id' => $data->client_id,
                        'lawyer_id' => $data->lawyer_id
                    ]);
                    $data->update([
                        'status' => 'FINISH'
                    ]);
                }
                return response()->json(['message' => 'Pengajuan berhasil diselesaikan', 'code' => 1, 'error' => false, 'rating' => $rating]);
            }else{
                return response()->json(['message' => 'Pengajuan sudah ditanggapi', 'code' => 0, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Pengajuan tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function finishKonsultasi(Request $request)
    {
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        $data = Konsultasi::find($id);
        if($data){
            if($data->status == 'ON_GOING' || $data->status == 'PAID' || $data->status == 'ONGOING' ){
                if($request->user->role != 'CLIENT'){
                    if($data->lawyer_id != $request->user->id){
                        return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    $data->update([
                        'status' => 'FINISH_LAWYER'
                    ]);
                }else{
                    if($data->client_id != $request->user->id){
                        return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
                    }
                    $data->update([
                        'status' => 'FINISH_CLIENT'
                    ]);
                }
                return response()->json(['message' => 'Konsultasi berhasil diselesaikan', 'code' => 1, 'error' => false]);
            }else{
                return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function konfirmasi(Request $request)
    {   
        $required = Validate::required($request, ['id', 'review', 'rating']);
        if ($required) return $required;
        $id = $request->id;
        if($request->type == 'PENDAMPINGAN'){
            $data = Pendampingan::find($id);
        }elseif($request->type == 'TERTULIS'){
            $data = Tertulis::find($id);
        }elseif($request->type == 'VICON'){
            $data = Vicon::find($id);
        }elseif($request->type == 'LEGALITAS'){
            $data = HistoryLegalitas::find($id);
        }else{
            $data = Konsultasi::find($id);
        }
        if($data){
            if($data->status == 'FINISH_LAWYER' || $data->status == 'FINISH_CLIENT'){
                $data->update([
                    'status' => 'FINISH'
                ]);

                Rating::create([
                    'rating' => $request->rating,
                    'review' => $request->review,
                    'type' => $request->type??'LIVE_CHAT',
                    'reference_id' => $request->id,
                    'client_id' => $data->client_id,
                    'lawyer_id' => $data->lawyer_id
                ]);
                return response()->json(['message' => 'Konsultasi berhasil diselesaikan', 'code' => 1, 'error' => false]);
            }else{
                return response()->json(['message' => 'Konsultasi sudah diselesaikan', 'code' => 0, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Konsultasi tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function batalKonfirmasi(Request $request)
    {   
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        if($request->type == 'PENDAMPINGAN'){
            $data = Pendampingan::find($id);
        }elseif($request->type == 'TERTULIS'){
            $data = Tertulis::find($id);
        }elseif($request->type == 'VICON'){
            $data = Vicon::find($id);
        }elseif($request->type == 'LEGALITAS'){
            $data = HistoryLegalitas::find($id);
        }else{
            $data = Konsultasi::find($id);
        }
        if($data){
            if($data->status == 'FINISH_LAWYER'){
                $data->update([
                    'status' => 'PAID'
                ]);
                return response()->json(['message' => 'konsultasi berhasil dibatalkan', 'code' => 1, 'error' => false]);
            }else{
                return response()->json(['message' => 'Konfirmasi tidak ditemukan', 'code' => 0, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Konfirmasi tidak ditemukan', 'code' => 0, 'error' => true]);
        }
    }

    public function getListRating(Request $request)
    {
        $rating1 = Rating::where('lawyer_id', $request->user->id)->get();
        foreach ($rating1 as $v) {
            if($v->type == 'LIVE_CHAT'){
                $layanan = Konsultasi::find($v->reference_id)->service->nama;
            }elseif($v->type == 'PENDAMPINGAN'){
                $data = Pendampingan::find($v->reference_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'VICON'){
                $data = Vicon::find($v->reference_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'TERTULIS'){
                $data = Tertulis::find($v->reference_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'LEGALITAS'){
                $data = HistoryLegalitas::find($v->reference_id);
                $layanan = Legalitas::find($data->konsultasi_id)->nama;
            }
            $rating[] = [
                'id' => $v->id,
                'rating' => $v->rating,
                'review' => $v->review,
                'nama_lengkap' => $v->client->nama_lengkap,
                'avatar' => $v->client->avatar??'',
                'layanan' => $layanan??'',
                'created_at' => $v->created_at
            ];
        }
        return response()->json(['message' => 'List Rating', 'code' => 1, 'error' => false, 'rating' => $rating]);
    }
    public function getListVicon(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $list = DB::table('video_conference')
            ->select('video_conference.id', 'users.nama_lengkap', 'users.avatar', 'video_conference.status', 'bidang_hukum.nama as layanan', 'video_conference.created_at as created', 'video_conference.tgl_pengajuan')
            ->join('users', 'video_conference.client_id', '=', 'users.id')
            ->join('konsultasi', 'video_conference.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('video_conference.lawyer_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }else{
            $list = DB::table('video_conference')
            ->select('video_conference.id', 'users.nama_lengkap', 'users.avatar', 'video_conference.status', 'bidang_hukum.nama as layanan', 'video_conference.created_at as created', 'video_conference.tgl_pengajuan')
            ->join('users', 'video_conference.lawyer_id', '=', 'users.id')
            ->join('konsultasi', 'video_conference.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('video_conference.client_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }
        return response()->json(['message' => 'List Pengajuan Vicon', 'code' => 1, 'error' => false, 'vicon_list' => $list]);
    }

    public function getListViconByIdKonsult(Request $request)
    {
        $id = $request->id;
        $list = DB::table('video_conference')
        ->select('video_conference.id', 'users.nama_lengkap', 'users.avatar', 'video_conference.status', 'bidang_hukum.nama as layanan', 'video_conference.created_at as created', 'video_conference.tgl_pengajuan')
        ->join('users', 'video_conference.client_id', '=', 'users.id')
        ->join('konsultasi', 'video_conference.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('video_conference.lawyer_id', $request->user->id)
        ->where('konsultasi.id', $id)
        ->get();
        return response()->json(['message' => 'List Pengajuan Vicon By Id Chat', 'code' => 1, 'error' => false, 'vicon_list' => $list]);
    }

    public function getListPertemuan(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $list = DB::table('pertemuan')
            ->select('pertemuan.id', 'users.nama_lengkap', 'users.avatar', 'pertemuan.status', 'pertemuan.created_at as created', 'pertemuan.tgl_pengajuan', 'pertemuan.konsultasi_id')
            ->join('users', 'pertemuan.client_id', '=', 'users.id')
            ->where('pertemuan.lawyer_id', $request->user->id)
            ->get();
        }else{
            $list = DB::table('pertemuan')
            ->select('pertemuan.id', 'users.nama_lengkap', 'users.avatar', 'pertemuan.status', 'pertemuan.created_at as created', 'pertemuan.tgl_pengajuan', 'pertemuan.konsultasi_id')
            ->join('users', 'pertemuan.lawyer_id', '=', 'users.id')
            ->where('pertemuan.client_id', $request->user->id)
            ->get();
        }

        foreach($list as $m){
            $konsultasi = Konsultasi::find($m->konsultasi_id)??0;
            $layanan[] = Service::find($konsultasi->service_id);

            $list1[] = [
                'id' => $m->id,
                'nama_lengkap' => $m->nama_lengkap,
                'avatar' => $m->avatar,
                'status' => $m->status,
                'created' => $m->created,
                'tgl_pengajuan' => $m->tgl_pengajuan,
                'layanan' => $layanan->nama??'Probono',
            ];
        }
        // return $layanan;
        return response()->json(['message' => 'List Pengajuan Pertemuan', 'code' => 1, 'error' => false, 'pertemuan_list' => $list1??[]]);
    }

    public function getListPertemuanByIdKonsult(Request $request)
    {
        $id = $request->id;
        $list = DB::table('pertemuan')
        ->select('pertemuan.id', 'users.nama_lengkap', 'users.avatar', 'pertemuan.status', 'bidang_hukum.nama as layanan', 'pertemuan.created_at as created', 'pertemuan.tgl_pengajuan')
        ->join('users', 'pertemuan.client_id', '=', 'users.id')
        ->join('konsultasi', 'pertemuan.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('pertemuan.lawyer_id', $request->user->id)
        ->where('konsultasi.id', $id)
        ->get();
        return response()->json(['message' => 'List Pengajuan Pertemuan By Id Chat', 'code' => 1, 'error' => false, 'pertemuan_list' => $list]);
    }

    public function getListPendampingan(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $list = DB::table('pendampingan')
            ->select('pendampingan.id', 'users.nama_lengkap', 'users.avatar', 'pendampingan.status', 'bidang_hukum.nama as layanan', 'pendampingan.created_at as created', 'pendampingan.option', 'pendampingan.alasan_tolak')
            ->join('users', 'pendampingan.client_id', '=', 'users.id')
            ->join('konsultasi', 'pendampingan.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('pendampingan.lawyer_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }else{
            $list = DB::table('pendampingan')
            ->select('pendampingan.id', 'users.nama_lengkap', 'users.avatar', 'pendampingan.status', 'bidang_hukum.nama as layanan', 'pendampingan.created_at as created', 'pendampingan.option', 'pendampingan.alasan_tolak')
            ->join('users', 'pendampingan.lawyer_id', '=', 'users.id')
            ->join('konsultasi', 'pendampingan.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('pendampingan.client_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }
        return response()->json(['message' => 'List Pengajuan Pendampingan', 'code' => 1, 'error' => false, 'pendampingan_list' => $list]);
    }

    
    public function getListPendampinganByIdKonsult(Request $request)
    {
        $id = $request->id;
        $list = DB::table('pendampingan')
        ->select('pendampingan.id', 'users.nama_lengkap', 'users.avatar', 'pendampingan.status', 'bidang_hukum.nama as layanan', 'pendampingan.created_at as created', 'pendampingan.option')
        ->join('users', 'pendampingan.client_id', '=', 'users.id')
        ->join('konsultasi', 'pendampingan.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('pendampingan.lawyer_id', $request->user->id)
        ->where('konsultasi.id', $id)
        ->get();
        return response()->json(['message' => 'List Pengajuan Pendampingan By Id Chat', 'code' => 1, 'error' => false, 'pendampingan_list' => $list]);
    }

    public function getListReport(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $list = DB::table('report')
            ->select('report.id', 'report.judul_report', 'report.created_at', 'report.penjelasan', 'users.nama_lengkap', 'users.avatar')
            ->join('users', 'report.lawyer_id', '=', 'users.id')
            ->where('report.lawyer_id', $request->user->id)
            ->get();
        }else{
            $list = DB::table('report')
            ->select('report.id', 'report.judul_report', 'report.created_at', 'report.penjelasan', 'users.nama_lengkap', 'users.avatar')
            ->join('users', 'report.client_id', '=', 'users.id')
            ->where('report.client_id', $request->user->id)
            ->get();
        }
        return response()->json(['message' => 'List Pengajuan Report', 'code' => 1, 'error' => false, 'report_list' => $list]);
    }
    
    public function getListReportByIdKonsult(Request $request)
    {
        $id = $request->id;
        $list = DB::table('report')
        ->select('report.id', 'users.nama_lengkap', 'users.avatar', 'report.judul_report', 'report.penjelasan', 'bidang_hukum.nama as layanan', 'report.created_at as created')
        ->join('users', 'report.client_id', '=', 'users.id')
        ->join('konsultasi', 'report.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('report.lawyer_id', $request->user->id)
        ->where('konsultasi.id', $id)
        ->get();
        return response()->json(['message' => 'List Pengajuan Report By Id Chat', 'code' => 1, 'error' => false, 'report_list' => $list]);
    }
    
    public function getListTertulis(Request $request)
    {
        if($request->user->role != 'CLIENT'){
            $list = DB::table('layanan_tertulis')
            ->select('layanan_tertulis.id', 'users.nama_lengkap', 'users.avatar', 'layanan_tertulis.status', 'bidang_hukum.nama as layanan', 'layanan_tertulis.created_at as created', 'layanan_tertulis.option')
            ->join('users', 'layanan_tertulis.client_id', '=', 'users.id')
            ->join('konsultasi', 'layanan_tertulis.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('layanan_tertulis.lawyer_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }else{
            $list = DB::table('layanan_tertulis')
            ->select('layanan_tertulis.id', 'users.nama_lengkap', 'users.avatar', 'layanan_tertulis.status', 'bidang_hukum.nama as layanan', 'layanan_tertulis.created_at as created', 'layanan_tertulis.option')
            ->join('users', 'layanan_tertulis.lawyer_id', '=', 'users.id')
            ->join('konsultasi', 'layanan_tertulis.konsultasi_id', '=', 'konsultasi.id')
            ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
            ->where('layanan_tertulis.client_id', $request->user->id)
            ->orderBy('id', 'desc')
            ->get();
        }
        return response()->json(['message' => 'List Pengajuan Tertulis', 'code' => 1, 'error' => false, 'tertulis_list' => $list]);
    }

    public function getListTertulisByIdKonsult(Request $request)
    {
        $id = $request->id;
        $list = DB::table('layanan_tertulis')
        ->select('layanan_tertulis.id', 'users.nama_lengkap', 'users.avatar', 'layanan_tertulis.status', 'bidang_hukum.nama as layanan', 'layanan_tertulis.created_at as created', 'layanan_tertulis.option')
        ->join('users', 'layanan_tertulis.client_id', '=', 'users.id')
        ->join('konsultasi', 'layanan_tertulis.konsultasi_id', '=', 'konsultasi.id')
        ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
        ->where('layanan_tertulis.lawyer_id', $request->user->id)
        ->where('konsultasi.id', $id)
        ->get();
        return response()->json(['message' => 'List Pengajuan Tertulis by Id Chat', 'code' => 1, 'error' => false, 'tertulis_list' => $list]);
    }

    public function detailKonsultasi(Request $request)
    {
        $id = $request->id;
        $konsultasi = Konsultasi::where('id', $id)->first();
        if(!$konsultasi){
            return response()->json(['message' => 'Konsultasi tidak ada', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->service_id == 0){
            $konsultasi_detail = DB::table('konsultasi')
                ->select('konsultasi.id as id','users.id as lawyer_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'lawyer.bio as deskripsi')
                ->join('users', 'konsultasi.lawyer_id', '=', 'users.id')
                ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
                ->where('konsultasi.id', $id)
                ->first();
        }else{
            if($konsultasi->lawyer->role == 'NOTARIS'){
                $konsultasi_detail = DB::table('konsultasi')
                    ->select('konsultasi.id as id','users.id as lawyer_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'legalitas.nama as layanan', 'lawyer_price.harga', 'lawyer_price.deskripsi')
                    ->join('users', 'konsultasi.lawyer_id', '=', 'users.id')
                    ->join('legalitas', 'konsultasi.service_id', '=', 'legalitas.id')
                    ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
                    ->where('konsultasi.id', $id)
                    ->where('lawyer_price.service_id', $konsultasi->service_id)
                    ->first();
            }else{
                $konsultasi_detail = DB::table('konsultasi')
                    ->select('konsultasi.id as id','users.id as lawyer_id', 'users.nama_lengkap', 'avatar', 'konsultasi.created_at as tanggal_konsultasi', 'konsultasi.status as status_konsultasi', 'alasan_tolak as alasan', 'bidang_hukum.nama as layanan', 'lawyer_price.harga', 'lawyer_price.deskripsi')
                    ->join('users', 'konsultasi.lawyer_id', '=', 'users.id')
                    ->join('bidang_hukum', 'konsultasi.service_id', '=', 'bidang_hukum.id')
                    ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
                    ->where('konsultasi.id', $id)
                    ->where('lawyer_price.service_id', $konsultasi->service_id)
                    ->first();
            }
        }
        
        return response()->json(['message' => 'Detail Konsultasi', 'code' => 1, 'error' => false, 'detail_konsultasi' => $konsultasi_detail]);
    }

    public function detailReport(Request $request)
    {
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        $report = Report::select('id', 'judul_report', 'penjelasan', 'file', 'created_at', 'lawyer_id', 'client_id')->where('id', $id)->first();
        if($report->lawyer_id == $request->user->id){
            $user = User::find($report->client_id);
        }else{
            $user = User::find($report->lawyer_id);
        }
        
        return response()->json(['message' => 'Detail Report', 'code' => 1, 'error' => false, 'avatar' => $user->avatar , 'nama_lengkap' => $user->nama_lengkap, 'id' => $report->id, 'judul_report' => $report->judul_report, 'penjelasan' => $report->penjelasan, 'file' => json_decode($report->file), 'created_at' => date('d-m-Y H:i:s', strtotime($report->created_at))]);
    }
    
    public function tolakPengajuan(Request $request)
    {
        $required = Validate::required($request, ['id', 'alasan_tolak', 'type']);
        if ($required) return $required;
        $id = $request->id;
        $alasan = $request->alasan_tolak;
        if($request->type == 'PENDAMPINGAN'){
            $data = Pendampingan::find($id);
        }elseif($request->type == 'TERTULIS'){
            $data = Tertulis::find($id);
        }elseif($request->type == 'VICON'){
            $data = Vicon::find($id);
        }elseif($request->type == 'PERTEMUAN'){
            $data = Pertemuan::find($id);
        }else{
            return response()->json(['message' => 'Type Salah', 'code' => 0, 'error' => true]);
        }
        if($data->lawyer_id != $request->user->id){
            return response()->json(['message' => 'Data Tidak ditemukan', 'code' => 0, 'error' => true]);
        }
        if($data->status == 'TOLAK'){
            return response()->json(['message' => 'Pengajuan Sudah ditolak', 'code' => 0, 'error' => true]);
        }
        if($data->status == 'WAITING_PAYMENT'){
            return response()->json(['message' => 'Pengajuan Sudah disetujui', 'code' => 0, 'error' => true]);
        }
        $data->update([
            'alasan_tolak'  => $alasan,
            'status'        => 'TOLAK'
        ]);
        Firebase::send(User::find($data->client_id)->fcm_token, 'Pengajuan Anda telah ditolak oleh '.User::find($data->lawyer_id)->nama_lengkap, $data, 'TOLAK');
        Notify::create(['type' => 'VICON', 'message' => 'Pengajuan Anda telah ditolak oleh '.User::find($data->lawyer_id)->nama_lengkap, 'reference_id' => $data->id, 'status' => true, 'user_id' => $data->client_id]);
        return response()->json(['message' => 'Pengajuan Berhasil ditolak', 'code' => 1, 'error' => false]);
    }

    public function setujuiPengajuan(Request $request)
    {
        $required = Validate::required($request, ['id', 'type']);
        if ($required) return $required;
        $id = $request->id;
        $alasan = $request->alasan_tolak;
        if($request->type == 'PENDAMPINGAN'){
            $data = Pendampingan::find($id);
        }elseif($request->type == 'TERTULIS'){
            $data = Tertulis::find($id);
        }elseif($request->type == 'VICON'){
            $data = Vicon::find($id);
        }elseif($request->type == 'PERTEMUAN'){
            $data = Pertemuan::find($id);
        }else{
            return response()->json(['message' => 'Type Salah', 'code' => 0, 'error' => true]);
        }
        if($data->lawyer_id != $request->user->id){
            return response()->json(['message' => 'Data Tidak ditemukan', 'code' => 0, 'error' => true]);
        }
        if($data->status == 'TOLAK'){
            return response()->json(['message' => 'Pengajuan Sudah ditolak', 'code' => 0, 'error' => true]);
        }
        if($data->status == 'CONFIRM'){
            return response()->json(['message' => 'Pengajuan Sudah disetujui', 'code' => 0, 'error' => true]);
        }
        $data->update([
            'status'        => 'CONFIRM'
        ]);
        Firebase::send(User::find($data->client_id)->fcm_token, 'Pengajuan Anda telah disetujui oleh '.User::find($data->lawyer_id)->nama_lengkap, $data, 'CONFIRM');
        Notify::create(['type' => 'VICON', 'message' => 'Pengajuan Anda telah disetujui oleh '.User::find($data->lawyer_id)->nama_lengkap, 'reference_id' => $data->id, 'status' => true, 'user_id' => $data->client_id]);
        return response()->json(['message' => 'Pengajuan Berhasil disetujui', 'code' => 1, 'error' => false]);
    }
    
    public function mahkamahagung(Request $request)
    {
        $mahkamah = MahkamahAgung::orderBy('id', 'desc')->get();
        return response()->json(['message' => 'Data Mahkamah', 'code' => 1, 'error' => false, 'mahkamah_agung' => $mahkamah??[]]);
    }

    public function somasi(Request $request)
    {
        $required = Validate::required($request, ['id', 'judul', 'penjelasan', 'file']);
        if ($required) return $required;
        $id = $request->id;
        $judul = $request->judul;
        $penjelasan = $request->penjelasan;
        $tertulis = Tertulis::find($id);
        $konsultasi = Konsultasi::where('id', $tertulis->konsultasi_id)->first();
        if($tertulis->status != 'PAID'){
            return response()->json(['message' => 'Konsultasi tidak bisa diakses', 'code' => 0, 'error' => true]);
        }
        // check verifikasi user
        if($request->user->verified == false){
            return response()->json(['message' => 'Silahkan verifikasi akun anda', 'code' => 0, 'error' => true]);
        }
        if($konsultasi->lawyer_id != $tertulis->lawyer_id){
            return response()->json(['message' => 'Layanan Tertulis tidak ditemukan', 'code' => 0, 'error' => true]);
        }
        foreach($request->file('file') as $v) {
            $file[] = $v->store('file');
            $filename[] = $v->getClientOriginalName();
        }
        $somasi = Somasi::create([
            'judul' => $judul,
            'penjelasan' => $penjelasan,
            'tertulis_id' => $id,
            'file'      => json_encode($file),
            'filename'  => json_encode($filename),
            'client_id' => $konsultasi->client_id,
            'lawyer_id' => $konsultasi->lawyer_id,
        ]);
        
        Firebase::send(User::find($konsultasi->client_id)->fcm_token, 'Anda mendapatkan laporan dari '.User::find($konsultasi->client_id)->nama_lengkap, $somasi, 'SOMASI');
        Notify::create(['type' => 'TERTULIS', 'message' => 'Anda mendapatkan laporan dari '.User::find($konsultasi->client_id)->nama_lengkap, 'reference_id' => $id, 'status' => true, 'user_id' => $konsultasi->client_id]);
        return response()->json(['message' => 'Berhasil Mengirim Somasi', 'code' => 1, 'error' => false,'somasi' => $somasi]);

    }
}
