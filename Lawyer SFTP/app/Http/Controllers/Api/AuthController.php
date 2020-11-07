<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Service;
use App\LawyerDetail;
use App\LoginHistorys;
use App\VerifikasiClient;
use DB;
use App\Libraries\Validate;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    public function login(Request $request){
        $required = Validate::required($request, ['telp', 'type']);
        if ($required) return $required;
        $device_name = $request->header('app');
        $device = $request->header('device');
        $version = $request->header('version');
        $telp = $request->telp;
        $user = User::select('id', 'email', 'telp', 'nama_lengkap', 'avatar', 'role', 'alamat', 'token', 'fcm_token', 'status', 'jenis_kelamin', 'type', 'status_app', 'versi_app')->where('telp', $telp)->first();
        if(!$user){
            return response()->json(['error' => true, 'code' => 5, 'message' => 'User tidak ditemukan']);
        }
        if($user->role == 'NOTARIS'){
            if($request->type == 'CLIENT'){
                return response()->json(['error' => true, 'code' => 4, 'message' => 'Akun Sudah digunakan']);
            }
        }else{
            if($request->type != $user->role){
                return response()->json(['error' => true, 'code' => 4, 'message' => 'Akun Sudah digunakan']);
            }
        }
        $verified = VerifikasiClient::where('user_id', $user->id)->first();
        if($verified){
            $status_verifikasi = $verified->status;
        }else{
            $status_verifikasi = 'BELUM_VERIFIED';
        }
        if($user){
            $LogHistory = LoginHistorys::create([
                'user_id' => $user->id,
                'device' => ($device_name)?$device_name:'',
                'device_name' => ($device)?$device:'',
                'version' => ($version)?$version:''
            ]);
            if($telp){
                $token = uniqid();
                $user->update([
                    'token' => $token
                    ]);
                return response()->json(['message' => 'Berhasil Login','code' => 1, 'error' => false, 'user' => $user, 'status_verifikasi' => $status_verifikasi]);
            }else{
                return response()->json(['error' => true, 'code' => 2, 'message' => 'parameter telp tidak ditemukan']);
            }
        }else{
            return response()->json(['error' => true, 'code' => 5, 'message' => 'User tidak ditemukan']);
        }
    }

    public function register(Request $request){
        $required = Validate::required($request, ['nama_lengkap', 'email', 'telp', 'role', 'alamat', 'password', 'jenis_kelamin', 'fcm_token', 'type']);
        if($request->role == 'LAWYER'){
            $required = Validate::required($request, ['gelar', 'provinsi', 'bahasa', 'kota']);
            if ($required) return $required;
        }
        if ($required) return $required;
        $uniqueEmail = Validate::unique($request, ['email:users,email'], [
            'email' => 'Email sudah ada',
            ]);
        $uniqueTelp = Validate::unique($request, ['telp:users,telp'], [
            'telp' => 'Telp sudah ada',
            ]);
        if ($uniqueEmail) return $uniqueEmail;
        if ($uniqueTelp) return $uniqueTelp;
        $token = uniqid();
        $user = User::create(array_merge($request->all(),[
            'token'     => $token,
            'password'  => Hash::make($request->password),
            'status'    => true,
            'verified'    => false,
            'avatar'    => '',
        ]));
        if($request->role == 'LAWYER'){
            LawyerDetail::create([
                'user_id'       => $user->id,
                'gelar'         => $request->gelar,
                'bahasa'        => json_encode($request->bahasan),
                'kota'          => $request->kota,
                'provinsi'      => $request->provinsi
            ]);
        }
        if($user){
            return response()->json(['message' => 'Berhasil Login','code' => 1, 'error' => false,  'user' => $user]);
        }else{
            return response()->json(['error' => true, 'code' => 0, 'message' => 'Ragistrasi gagal']);
        }
        
    }
    
    public function registerService(Request $request)
    {

        if(!is_array($request->service)){
            return response()->json(['error' => true, 'code' => 2, 'message' => 'Parameter service tidak array']);
        }
        $user = LawyerDetail::where('user_id', $request->userId)->update([
            'service'       => json_encode($request->service),
            'probono'       => $request->probono
            ]);
        if($user){
            return response()->json(['message' => 'Berhasil Pilih Layanan','code' => 1, 'error' => false,  'user' => $user]);
        }else{
            return response()->json(['error' => true, 'code' => 0, 'message' => 'Gagal pilih layanan']);
        }
    }

    public function registerUpload(Request $request)
    {
        $uniqueKTP = Validate::unique($request, ['no_ktp:users,no_ktp'], [
            'no_ktp' => 'KTP sudah ada',
        ]);
        if ($uniqueKTP) return $uniqueKTP;
        $ktp = $request->file('ktp')->store('ktp');
        $kartu_peradi = $request->file('kartu_peradi')->store('kartu_peradi');
        $berita_acara = $request->file('berita_acara')->store('berita_acara');
        User::where('id', $request->userId)->update([
            'no_ktp'=> $request->no_ktp,
            'ktp'   => $ktp
            ]);
        $user = User::findOrFail($request->userId);
        if($user->role == 'LAWYER'){
            LawyerDetail::where('user_id', $request->userId)->update([
                'berita_acara' => $berita_acara,
                'kartu_peradi' => $kartu_peradi
            ]);
        }
        if($user){
            return response()->json(['message' => 'Berhasil Upload File','code' => 1, 'error' => false,  'user' => $user]);
        }else{
            return response()->json(['error' => true, 'code' => 0, 'message' => 'Gagal Upload File']);
        }
    }
    
    public function service()
    {
        $service = Service::select('id', 'nama', 'gambar')->whereStatus(true)->orderBy('id')->get();
        if($service){
            return response()->json(['message' => 'Data Service','code' => 1, 'error' => false,  'service' => $service]);
        }else{
            return response()->json(['error' => true, 'code' => 0, 'message' => 'Gagal Ambil data']);
        }

    }

}
