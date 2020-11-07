<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\Validate;
use App\User;
use App\Slider;
use App\Artikel;
use App\Service;
use App\Events;
use App\LayananLawyer;
use App\LayananClient;
use App\LawyerPrice;
use App\PengajuanMember;
use App\LawyerDetail;
use App\Konsultasi;
use App\Notify;

use DB;

class HomeController extends Controller{

    public function home(Request $request){
        $required = Validate::required($request, ['fcm_token', 'versi_app']);
            if ($required) return $required;
        $user = User::find($request->user->id);
        $user->update([
            'fcm_token' => $request->fcm_token,
            'versi_app' => $request->versi_app
        ]);
        $event = Events::where('status', true)->orderBy('id', 'DESC')->get();
        $sliderIklan = Slider::select('id', 'judul', 'deskripsi', 'image')->where('status', true)->where('role','IKLAN')->orderBy('id', 'DESC')->get();
        $artikel = Artikel::select('id', 'judul', 'image', 'release_date')->where('mode', 'RELEASE')->orderBy('id', 'desc')->get()->take(5);
        $service = Service::select('id', 'nama', 'gambar')->whereStatus(true)->orderBy('id')->get()->take(10);
        $notifikasi = Notify::where('user_id', $request->user->id)->orderBy('id', 'desc')->get();
        $lawyer = User::select('avatar')->whereNotNull('avatar')->where('role', 'LAWYER')->where('status_app', true)->get()->take(10);
        
        $slider = Slider::select('id', 'judul', 'deskripsi', 'image')->where('status', true)->where('role','CLIENT')->orderBy('id', 'DESC')->get();
        $layanan = LayananClient::where('status', true)->orderBy('id')->get();

        return response()->json(['message' => 'Data Home Client','code' => 1, 'error' => false,  'slider' => $slider, 'notification' => $notifikasi, 'layanan_favorite' => $layanan, 'lawyer_online' => $lawyer , 'layanan_hukum'=> $service, 'artikel' => $artikel, 'event' => $event, 'slider_iklan' => $sliderIklan]);
    }

    public function homelawyer(Request $request)
    {
        $required = Validate::required($request, ['fcm_token', 'versi_app']);
            if ($required) return $required;
        $user = User::find($request->user->id);
        $user->update([
            'fcm_token' => $request->fcm_token,
            'versi_app' => $request->versi_app
        ]);
        $event = Events::where('status', true)->orderBy('id', 'DESC')->get();
        $sliderIklan = Slider::select('id', 'judul', 'deskripsi', 'image')->where('status', true)->where('role','IKLAN')->orderBy('id', 'DESC')->get();
        $artikel = Artikel::select('id', 'judul', 'image', 'release_date')->where('mode', 'RELEASE')->orderBy('id', 'desc')->get()->take(5);
        $notifikasi = Notify::where('user_id', $request->user->id)->orderBy('id', 'desc')->get();
        $pengajuan = PengajuanMember::where('user_id', $request->user->id)->orderBy('id', 'desc')->first();
        if($pengajuan){
            $date1  = date_create(date('Y-m-d'));
            $date2  = date_create($pengajuan->member_expired);
            $diff   = date_diff($date1,$date2);
        }
        $layanan = LayananLawyer::where('status', true)->get();
        $slider   = Slider::select('id', 'judul', 'deskripsi', 'image')->where('status', true)->where('role','LAWYER')->orderBy('id', 'DESC')->get();
        
        // get data harga tidak lengkap
        $lawyer = LawyerDetail::where('user_id', $request->user->id)->first();
        $servicelawyer = json_decode($lawyer->service)??[];
        $lawyerPrice = LawyerPrice::where('user_id', $request->user->id)->whereIn('service_id', $servicelawyer)->count();
        if($lawyerPrice != count($servicelawyer)){
            $statusharga = [
                'status'            => false,
                'count_not_filled'  => count($servicelawyer) - $lawyerPrice
            ];
        }else{
            $statusharga = [
                'status'            => true,
                'count_not_filled'  => count($servicelawyer) - $lawyerPrice
            ];
        }
        $allkonsultasi = Konsultasi::where('lawyer_id', $request->user->id)->where('status', 'FINISH')->count();
        $cancelkonsultasi = Konsultasi::where('lawyer_id', $request->user->id)->whereIn('status', ['CANCEL_lAWYER', 'CANCEL_CLIENT'])->count();
        $ongoingkonsultasi = Konsultasi::where('lawyer_id', $request->user->id)->where('status', 'ON_GOING')->count();
        return response()->json(['message' => 'Data Home Lawyer','code' => 1, 'error' => false, 'status_online' => $request->user->status_app, 'total_konsultasi' => $allkonsultasi, 'total_dibatalkan' => $cancelkonsultasi, 'rating' => 5, 'chat_aktif' => $ongoingkonsultasi, 'status_pricing' => $statusharga,'notification' => $notifikasi, 'layanan_favorite' => $layanan,  'slider' => $slider, 'artikel' => $artikel,  'event' => $event, 'slider_iklan' => $sliderIklan, 'status_membership' => $pengajuan->status??'BELUM_MEMBERSHIP', 'sisa_member' => $diff->days??0]);
    }
    
    public function search(Request $request)
    {
        $search_nama = $request->search_nama;
        $user = User::select('id', 'nama_lengkap', 'avatar')->with('lawyer_detail:user_id,gelar,bio')->where('nama_lengkap', 'ilike', '%'.$search_nama.'%')->where('role', 'LAWYER')->whereStatus(true)->get();
        if($user->isEmpty()){
            return response()->json(['message' => 'Pencarian berdasarkan '.$search_nama.' tidak ada','code' => 2, 'error' => true]);
        }else{
            return response()->json(['message' => 'Pencarian berdasarkan '.$search_nama,'code' => 1, 'error' => false, 'lawyer' => $user]);
        }
    }

    public function changeStatus(Request $request)
    {
        User::where('id', $request->user->id)->update([
            'status_app' => $request->status
        ]);
        $user = User::find($request->user->id);
        return response()->json(['message' => 'Status berhasil diubah ke '.$request->status,'code' => 1, 'error' => false, 'status_app' => $user->status_app]);
    }
    
    public function getLawyer(Request $request)
    {
        $id = $request->bidang_id;
        $service = Service::select('id','nama', 'gambar', 'deskripsi')->find($id);
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id', 'nama_lengkap', 'avatar', 'lawyer_price.deskripsi as deskripsi_layanan', 'gelar', 'status_app', 'lawyer_price.harga as harga_layanan', 'lawyer_price.harga_vicon')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
        ->where('users.role', 'LAWYER')
        ->where('users.type', 'ADVOKAT')
        ->where('lawyer_price.service_id', $id)
        ->where('lawyer.service', 'like', '%"'.$id.'"%')
        ->get();
        if($service){
            return response()->json(['message' => 'Data lawyer','code' => 1, 'error' => false, 'service' => $service, 'list_lawyer' => $lawyer]);
        }else{
            return response()->json(['message' => 'Tidak ada layanan','code' => 1, 'error' => false]);
        }
    }

    public function getNotaris(Request $request)
    {
        $id = $request->id;
        $notaris = DB::table('users')
        ->select('users.id as id', 'nama_lengkap', 'avatar')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
        ->where('users.role', 'NOTARIS')
        ->where('lawyer_price.service_id', $id)
        ->where('lawyer.service', 'like', '%"'.$id.'"%')
        ->get();
        if($notaris){
            return response()->json(['message' => 'Data notaris','code' => 1, 'error' => false, 'list_notaris' => $notaris]);
        }else{
            return response()->json(['message' => 'Tidak ada layanan','code' => 1, 'error' => false]);
        }
    }
    
    public function detailNotaris(Request $request)
    {
        $id = $request->id;
        $service_id =  $request->service_id;
        $notaris = DB::table('users')
        ->select('users.id as id', 'nama_lengkap', 'avatar', 'lawyer_price.harga', 'lawyer.gelar', 'lawyer_price.deskripsi', 'lawyer.bio', 'lawyer.bahasa', 'lawyer.kota', 'lawyer.provinsi')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
        ->where('users.id', $id)
        ->where('lawyer_price.service_id', $service_id)
        ->where('lawyer.service', 'like', '%"'.$service_id.'"%')
        ->first();
        $review = DB::table('rating')
        ->select('users.id as client_id', 'nama_lengkap', 'avatar', 'rating', 'review')
        ->join('users', 'rating.client_id', '=', 'users.id')
        ->where('rating.lawyer_id', $id)
        ->get();
        $rating = $review->sum('rating')??5/$review->count()??1;
        if($notaris){
            return response()->json(['message' => 'Data notaris','code' => 1, 'error' => false, 'detail_notaris' => $notaris, 'review' => $review, 'rating' => $rating, 'count_review' => count($review)]);
        }else{
            return response()->json(['message' => 'Tidak ada notaris','code' => 1, 'error' => false]);
        }
    }

    public function detailLawyer(Request $request)
    {
        $required = Validate::required($request, ['lawyer_id', 'service_id']);
        if ($required) return $required;
        $lawyer_id = $request->lawyer_id;
        $service_id = $request->service_id;
        $check = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->whereNotIn('status', ['CANCEL_LAWYER', 'CANCEL_CLIENT', 'FINISH'])->first();
        if($check){
            $id = $check->id;
            $status = true;
            if($check->status == 'EXPIRED'){
                $expired = true;
            }else{
                $expired = false;
            }
        }else{
            $expired = false;
            $id = 0;
            $status = false;
        }
        $review = DB::table('rating')
        ->select('users.id as client_id', 'nama_lengkap', 'avatar', 'rating', 'review')
        ->join('users', 'rating.client_id', '=', 'users.id')
        ->where('rating.lawyer_id', $lawyer_id)
        ->get();
        if($review->count() != 0){
            $rating = $review->sum('rating')/$review->count();
        }
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id', 'nama_lengkap', 'avatar', 'lawyer_price.deskripsi as deskripsi_layanan', 'gelar', 'status_app', 'lawyer_price.harga as harga_layanan', 'lawyer_price.harga_vicon', 'lawyer.bahasa', 'lawyer.kota', 'lawyer.provinsi')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->join('lawyer_price', 'users.id', '=', 'lawyer_price.user_id')
        ->where('users.id', $lawyer_id)
        ->first();
        return response()->json(['message' => 'Data lawyer detail','code' => 1, 'error' => false, 'status_konsultasi' => $status, 'konsultasi_id' => $id , 'status_expired' => $expired, 'rating' => $rating??5, 'lawyer_detail' => $lawyer, 'review' => $review]);
    }

    public function detailLawyerProbono(Request $request)
    {
        $required = Validate::required($request, ['lawyer_id']);
        if ($required) return $required;
        $lawyer_id = $request->lawyer_id;
        $service_id = 0;
        $check = Konsultasi::where('lawyer_id', $lawyer_id)->where('client_id', $request->user->id)->where('service_id', $service_id)->whereNotIn('status', ['CANCEL_LAWYER', 'CANCEL_CLIENT', 'FINISH'])->first();
        $review = DB::table('rating')
        ->select('users.id as client_id', 'nama_lengkap', 'avatar', 'rating', 'review')
        ->join('users', 'rating.client_id', '=', 'users.id')
        ->where('rating.lawyer_id', $lawyer_id)
        ->get();
        if($review->count() != 0){
            $rating = $review->sum('rating')/$review->count();
        }
        if($check){
            $id = $check->id;
            $status = true;
            if($check->status == 'EXPIRED'){
                $expired = true;
            }else{
                $expired = false;
            }
        }else{
            $expired = false;
            $id = 0;
            $status = false;
        }
        $lawyer = DB::table('users')
        ->select('users.id as lawyer_id', 'nama_lengkap', 'avatar', 'lawyer.bio as deskripsi_layanan', 'gelar', 'status_app', 'lawyer.bahasa', 'lawyer.kota', 'lawyer.provinsi', 'lawyer.bio')
        ->join('lawyer', 'users.id', '=', 'lawyer.user_id')
        ->where('users.id', $lawyer_id)
        ->first();
        return response()->json(['message' => 'Data lawyer detail','code' => 1, 'error' => false, 'status_konsultasi' => $status, 'konsultasi_id' => $id , 'status_expired' => $expired, 'count_review' => count($review), 'rating' => $rating??5, 'lawyer_detail' => $lawyer, 'review' => $review]);
    }
    
    public function getEvent(Request $request)
    {
        $events = Events::whereStatus(true)->get();
        return response()->json(['message' => 'Data Events','code' => 1, 'error' => false, 'events' => $events]);

    }

    public function province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: d9cc3e0463ce8ea9546ea9b012d7aba6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['message' => 'Something Error Try Again','code' => 0, 'error' => true]);
        } else {
            $province = json_decode($response, true);
            return response()->json(['message' => 'Data Province','code' => 1, 'error' => false, 'province' => $province['rajaongkir']['results']]);
        }
    }

    public function city(Request $request)
    {
        $id = $request->id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=&province=".$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: d9cc3e0463ce8ea9546ea9b012d7aba6"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['message' => 'Something Error Try Again','code' => 0, 'error' => true]);
        } else {
            $city = json_decode($response, true);
            return response()->json(['message' => 'Data Province','code' => 1, 'error' => false, 'city' => $city['rajaongkir']['results']]);
        }
    }

    public function notifikasi(Request $request)
    {
        $required = Validate::required($request, ['id']);
        if ($required) return $required;
        $id = $request->id;
        $notifikasi = Notify::find($id);
        if($notifikasi->status == false){
            return response()->json(['message' => 'Notifikasi Sudah di ubah','code' => 0, 'error' => false]);
        }
        $notifikasi->update([
            'status' => false
        ]);

        if($notifikasi){
            return response()->json(['message' => 'Notifikasi Berhasil di ubah','code' => 1, 'error' => false]);
        }else{
            return response()->json(['message' => 'Notifikasi Gagal di ubah','code' => 0, 'error' => true]);
        }
    }

}
