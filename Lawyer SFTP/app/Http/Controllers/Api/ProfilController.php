<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;
use App\User;
use App\LawyerDetail;
use App\LawyerPrice;
use App\Service;
use App\Legalitas;
use App\Faq;
use App\Privacy;
use App\Setting;
use App\Help;
use App\VerifikasiClient;
use App\PengajuanMember;
use App\HistoryPeraturan;
use App\LayananLawyer;
use App\LayananClient;
use App\Pembayaran;
use App\Konsultasi;
use App\Vicon;
use App\Tertulis;
use App\Pendampingan;
use App\HistoryLegalitas;
use App\Http\Resources\ApiResourcesHelp;
use Illuminate\Support\Facades\Hash;
use DB;
use File;
use Storage;

class ProfilController extends Controller{

    
    public function verifikasiClient(Request $request)
    {
        $required = Validate::required($request, ['no_ktp', 'ktp', 'selfie_ktp']);
        if ($required) return $required;
        $check = VerifikasiClient::where('user_id', $request->user->id)->first();
        if($check){
            return response()->json(['message' => 'Sudah melakukan verifikasi silahkan tunggu konfirmasi admin', 'code' => 2, 'error' => true]);
        }
        
        $ktp        = $request->file('ktp')->store('ktp');
        $selfie_ktp = $request->file('selfie_ktp')->store('selfie_ktp');
        VerifikasiClient::create([
            'user_id'   => $request->user->id,
            'no_ktp'    => $request->no_ktp,
            'ktp'       => $ktp,
            'selfie_ktp'=> $selfie_ktp,
            'status'    => 'WAITING'
        ]);
        return response()->json(['message' => 'Verifikasi berhasil dilakukan', 'code' => 1, 'error' => false]);
        
    }

    public function update(Request $request){
        $required = Validate::required($request, ['nama_lengkap', 'alamat']);
        if ($required) return $required;
        if($request->user->role != 'CLIENT'){
            $required = Validate::required($request, ['bio', 'bahasa', 'kota', 'provinsi', 'gelar']);
            if ($required) return $required;
            $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
            $lawyer->update([
                'bio'   => $request->bio,
                'kota'   => $request->kota,
                'provinsi'   => $request->provinsi,
                'gelar'   => $request->gelar,
                'bahasa' => json_encode($request->bahasa)
            ]);
        }
        User::where('id', $request->user->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ]);
        $user = User::find($request->user->id);
        if($request->user->role != 'CLIENT'){
            $user = collect($user)->prepend($request->bio, 'bio');
        }
        return response()->json(['message' => 'Berhasil update profil', 'code' => 1, 'error' => false, 'user' => $user]);

    }

    public function updateAvatar(Request $request){
        
        if($request->avatar){
            $image = $request->file('avatar')->store('avatar');
            if($image){
                if (Storage::exists($request->user->avatar)) {
                    Storage::delete($request->user->avatar);
                }
                $update = User::where('id', $request->user->id)->update(['avatar' => $image]);
                if($update){
                    return response()->json(['message' => 'Berhasil upload gambar', 'code' => 1, 'error' => false, 'avatar_update' => $image]);
                }else{
                    return response()->json(['message' => 'Gagal update gambar', 'code' => 3, 'error' => true]);
                }
            }else{
                return response()->json(['message' => 'Terjadi Kesalahan saat upload gambar', 'code' => 2, 'error' => true]);
            }
        }else{
            return response()->json(['message' => 'Terjadi Kesalahan saat mengirim gambar', 'code' => 4, 'error' => true]);
        }
    }
    
    function myprofil(Request $request){
        if($request->user->role != 'CLIENT'){
            $user1 = User::select('id','nama_lengkap', 'avatar', 'email', 'verified', 'telp', 'jenis_kelamin', 'role', 'type')->where('id', $request->user->id)->first();
            $detail = LawyerDetail::where('user_id', $request->user->id)->first();
            $user = collect($user1)->prepend(json_decode($detail->bahasa)??[], 'bahasa')->prepend($detail->kota??'', 'kota')->prepend($detail->provinsi??'', 'provinsi')->prepend($detail->gelar??'', 'gelar')->prepend($detail->pendapatan??0, 'pendapatan');
        }else{
            $user = User::select('id','nama_lengkap', 'avatar', 'email', 'verified', 'telp', 'jenis_kelamin', 'role', 'type')->where('id', $request->user->id)->first();
        }
        $privacy = Privacy::find(1);
        $faq = Faq::get();
        $bantuan = ApiResourcesHelp::collection(Help::get());
        $pengajuan = PengajuanMember::where('user_id', $request->user->id)->orderBy('id', 'desc')->first();
        if($pengajuan){
            $date1  = date_create(date('Y-m-d'));
            $date2 = date_create($pengajuan->member_expired);
            $diff=date_diff($date1,$date2);
        }

        if($request->user->role != 'CLIENT'){
            $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
            $lawyerservice = json_decode($lawyer->service);
            if($request->user->role == 'NOTARIS'){
                $service = Legalitas::select('nama', 'image as gambar')->whereIn('id', $lawyerservice)->get();
            }else{
                $service = Service::select('nama', 'gambar')->whereIn('id', $lawyerservice)->get();
            }
            return response()->json(['message' => 'My Profile', 'code' => 1, 'error' => false, 'user' => $user,'layanan_hukum' => $service, 'privacy' => $privacy, 'faq' => $faq, 'bantuan' => $bantuan, 'status_membership' => $pengajuan->status??'BELUM_MEMBERSHIP', 'sisa_member' => $diff->days??0]);
        }else{
            $verified = VerifikasiClient::where('user_id', $user->id)->first();
            return response()->json(['message' => 'My Profile', 'code' => 1, 'error' => false, 'user' => $user, 'privacy' => $privacy, 'faq' => $faq, 'bantuan' => $bantuan, 'status_verifikasi' => $verified->status??'BELUM_VERIFIED']);
        }
    }

    public function changeProbono(Request $request)
    {
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
        $lawyer->update([
            'probono' => $request->status
        ]);
        return response()->json(['message' => 'Status Probono berhasil diubah ke '.$request->status, 'code' => 1, 'error' => false, 'status_probono' => $lawyer->probono]);
    }
    public function editLayanan(Request $request)
    {
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
        $layanan = json_decode($lawyer->service);
        foreach($layanan as $m){
            if($request->user->role == 'NOTARIS'){
                $service = Legalitas::find($m);
                $gambar = $service->image;
                $informasi = LayananLawyer::find(9);
            }else{
                $informasi = LayananClient::find(4);
                $service = Service::find($m);
                $gambar = $service->gambar;
            }
            $harga = LawyerPrice::where('user_id', $request->user->id)->where('service_id', $m)->first();
            if($harga){
                $data[] = [
                    'id' => $service->id,
                    'service' => $service->nama,
                    'gambar' => $gambar,
                    'harga' => $harga->harga,
                    'deskripsi' => $harga->deskripsi,
                ];
            }else{
                $data[] = [
                    'id' => $service->id,
                    'service' => $service->nama,
                    'gambar' => $gambar,
                    'harga' => 0,
                    'deskripsi' => '',
                ];
            }
        }
        return response()->json(['message' => 'Data Layanan','code' => 1, 'error' => false, 'informasi' => $informasi, 'status_probono' => $lawyer->probono , 'layanan' => $data ]);
    }
    
    public function updateLayanan(Request $request)
    {
        $id = $request->service_id;
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();

        if(!in_array($id, json_decode($lawyer->service))){
            return response()->json(['message' => 'Layanan tidak ada', 'code' => 0, 'error' => true ]);
        }
        $layanan = LawyerPrice::where('service_id', $id)->where('user_id', $request->user->id)->first();
        if($layanan){
            $layanan->update(array_merge($request->all()));
        }else{
            $layanan = LawyerPrice::create(array_merge($request->all(),[
                'user_id' => $request->user->id
            ]));
        }
        return response()->json(['message' => 'Data Layanan berhasil di ubah','code' => 1, 'error' => false, 'layanan' => $layanan ]);
        
        
    }
    
    public function pengajuanMember(Request $request)
    {
        $check = PengajuanMember::whereIn('status', ['WAITING', 'WAITING_PAYMENT', 'PAID'])->where('user_id', $request->user->id)->first();
        if($check){
            return response()->json(['message' => 'Sudah mengajukan','code' => 0, 'error' => true, 'pengajuan' => $check ]);
        }else{
            $pengajuan = PengajuanMember::create([
                'status'    => 'WAITING',
                'user_id'   => $request->user->id,
                'member_expired' => ''
            ]);
            return response()->json(['message' => 'Berhasil mengajukan','code' => 1, 'error' => false, 'pengajuan' => $pengajuan ]);
        }
        
    }
    
    public function getStatusMember(Request $request)
    {
        $harga = Setting::find(2)->value;
        $waktu = Setting::find(3)->value;
        $pengajuan = PengajuanMember::where('user_id', $request->user->id)->orderBy('id', 'desc')->first();
        if($pengajuan){
            return response()->json(['message' => 'Status Membership','code' => 1, 'error' => false, 'verified' => $request->user->verified, 'harga_pengajuan' => $harga , 'member_expired' => $pengajuan->member_expired??'', 'status_membership' => $pengajuan->status??'BELUM_MEMBERSHIP', 'waktu' => $waktu, 'pengajuan' => $pengajuan??'' ]);
        }else{
            return response()->json(['message' => 'Status Membership','code' => 1, 'error' => false, 'verified' => $request->user->verified, 'harga_pengajuan' => $harga , 'member_expired' => $pengajuan->member_expired??'', 'status_membership' => $pengajuan->status??'BELUM_MEMBERSHIP', 'waktu' => $waktu]);
        }
    }

    public function langganan(Request $request)
    {
        $check = HistoryPeraturan::whereIn('status', ['WAITING', 'WAITING_PAYMENT', 'PAID'])->where('user_id', $request->user->id)->first();
        if($check){
            return response()->json(['message' => 'Sudah mengajukan','code' => 0, 'error' => true, 'langganan' => $check ]);
        }else{
            $langganan = HistoryPeraturan::create([
                'status'    => 'WAITING',
                'user_id'   => $request->user->id,
                'tanggal_langganan' => ''
            ]);
            return response()->json(['message' => 'Berhasil mengajukan','code' => 1, 'error' => false, 'langganan' => $langganan ]);
        }
    }
    
    public function getLangganan(Request $request)
    {
        $langganan1 = HistoryPeraturan::where('user_id', $request->user->id)->latest('id')->first();
        $langganan = [
            'id'            => $langganan1->id??'',
            'user_id'       => $langganan1->user_id??$request->user->id,
            'tanggal_langganan'    => $langganan1->tanggal_langganan??'',
            'status'        => $langganan1->status??'BELUM_LANGGANAN'
        ];
        return response()->json(['message' => 'Get Status Langganan','code' => 1, 'error' => false, 'langganan' => $langganan ]);
        
    }
    
    public function getRekening(Request $request)
    {
        $data = LawyerDetail::where('user_id', $request->user->id)->first();
        if($data){
            return response()->json(['message' => 'Get Rekening','code' => 1, 'error' => false, 'no_rek' => $data->no_rek??'', 'bank' => $data->bank??'','an_rek' => $data->an_rek??'']);
        }else{
            return response()->json(['message' => 'Data tidak ditemukan','code' => 0, 'error' => true ]);
        }
        
    }
    public function rekening(Request $request)
    {
        $required = Validate::required($request, ['an_rek', 'no_rek', 'bank', 'upload_rek']);
        if ($required) return $required;
        if($request->password){
            $checkPass = \Auth::guard('users')->attempt(['email' => $request->user->email, 'password' => $request->password]);
        }else{
            $checkPass = true;
        }
        
        $upload_rek = $request->file('upload_rek')->store('upload_rek');
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
        if(Storage::exists($lawyer->upload_rek)){
            Storage::delete($lawyer->upload_rek);
        }
        if($checkPass == true){
            LawyerDetail::where('user_id', $request->user->id)->update([
                'an_rek'    => $request->an_rek,
                'no_rek'    => $request->no_rek,
                'bank'      => $request->bank,
                'upload_rek'=> $upload_rek
            ]);
            return response()->json(['message' => 'Berhasil Update Rekening','code' => 1, 'error' => false ]);
        }
        return response()->json(['message' => 'Password Yang anda masukan salah','code' => 0, 'error' => true ]);
    }

    public function changePassword(Request $request)
    {
        $required = Validate::required($request, ['password_lama', 'password_baru', 'confirmation_password']);
        if ($required) return $required;

        $checkPass = \Auth::guard('users')->attempt(['email' => $request->user->email, 'password' => $request->password_lama]);
        if($checkPass == true){
            if(strlen($request->password_baru) < 8){
                return response()->json(['message' => 'Password Min 8 karakter','code' => 0, 'error' => true ]);
            }
            if($request->password_baru == $request->password_lama){
                return response()->json(['message' => 'Password lama dan baru tidak boleh sama','code' => 0, 'error' => true ]);
            }
            if($request->password_baru == $request->confirmation_password){
                User::where('id', $request->user->id)->update([
                    'password' => Hash::make($request->password_baru)
                    ]);
                return response()->json(['message' => 'Berhasil Ganti Password','code' => 1, 'error' => false ]);
            }
            return response()->json(['message' => 'Password Tidak sama','code' => 0, 'error' => true ]);
        }
        return response()->json(['message' => 'Password Lama salah','code' => 0, 'error' => true ]);
    }

    public function listPendapatan(Request $request)
    {
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
        $pendapatan1 = Pembayaran::where('lawyer_id', $request->user->id)->where('status', 'PAID')->whereNotIn('type', ['MEMBERSHIP', 'PERATURAN'])->get();
        foreach($pendapatan1 as $v){
            if($v->type == 'LIVE_CHAT'){
                $layanan = Konsultasi::find($v->detail_id)->service->nama;
            }elseif($v->type == 'PENDAMPINGAN'){
                $data = Pendampingan::find($v->detail_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'VICON'){
                $data = Vicon::find($v->detail_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'TERTULIS'){
                $data = Tertulis::find($v->detail_id);
                $layanan = Konsultasi::find($data->konsultasi_id)->service->nama;
            }elseif($v->type == 'LEGALITAS'){
                $data = HistoryLegalitas::find($v->detail_id);
                $layanan = Legalitas::find($data->id)->nama;
            }
            $list_pendapatan[] = [
                'amount'    => $v->amount,
                'type'      => $v->type,
                'layanan'   => $layanan??'',
                'created_at'=> $v->created_at
            ];
        }
        return response()->json(['message' => 'List Pendapatan','code' => 1, 'error' => false, 'pendapatan' => $lawyer->pendapatan??0, 'list_pendapatan' => $list_pendapatan ]);
    }
}
