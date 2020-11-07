<?php

namespace App\Http\Controllers\Advokat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Events;
use App\Slider;
use App\LayananClient;
use App\LayananLawyer;
use App\Artikel;
use App\Legalitas;
use App\Faq;
use App\Vicon;
use App\Peraturan;
use App\PeraturanDetail;
use App\Konsultasi;
use App\Tertulis;
use App\Pendampingan;
use App\Pembayaran;
use App\Transaksi;
use App\Pertanyaan;
use App\Jawaban;
use App\Pertemuan;
use App\Likes;
use App\User;
use App\Chat;
use App\Report;
use App\Privacy;
use App\Help;
use App\LawyerDetail;
use App\MahkamahAgung;
use App\LawyerPrice;
use App\Service;
use App\Notify;

use Storage;

class HomeController extends Controller
{

    protected $notifikasi;

    // $this-k=$detail_peraturan;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('lawyerweb');
    }

    public function notif(){
        // global $notifikasi;
        $this->notifikasi = Notify::where('user_id', session()->get('user')->id)->orderBy('id', 'desc')->get();
        // dd($notifikasi);
        return $this->notifikasi;
   
    }

    // halaman index
    public function index(){   
        $notif= $this->notif();
        $allkonsultasi = Konsultasi::where('lawyer_id', session()->get('user')->id)->where('status', 'FINISH')->get()->count();
        $cancelkonsultasi = Konsultasi::where('lawyer_id', session()->get('user')->id)->whereIn('status', ['CANCEL_lAWYER', 'CANCEL_CLIENT'])->get()->count();
        $ongoingkonsultasi = Konsultasi::where('lawyer_id', session()->get('user')->id)->where('status', 'ON_GOING')->get()->count();
        $artikel = Artikel::where('mode', 'RELEASE')->get();
        $event = Events::where('status', true)->orderBy('id', 'desc')->get();
        $kategori = LayananLawyer::get();
        // $notifikasi = Notify::where('user_id', session()->get('user')->id)->orderBy('id', 'desc')->get();
        $slider_iklan = Slider::where('role', 'IKLAN')->where('status', true)->orderBy('id')->get();
        $slider_lawyer = Slider::where('role', 'LAWYER')->where('status', true)->orderBy('id')->get();
        // get data harga tidak lengkap
        $lawyer = LawyerDetail::where('user_id', session()->get('user')->id)->first();
        $servicelawyer = json_decode($lawyer->service)??[];
        $lawyerPrice = LawyerPrice::where('user_id', session()->get('user')->id)->whereIn('service_id', $servicelawyer)->count();
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
     
        return view('frontend-advokat.home',compact('event','slider_iklan','slider_lawyer','kategori','artikel','allkonsultasi', 'cancelkonsultasi', 'ongoingkonsultasi', 'statusharga','notif'));
    }

    //detail index
    public function sliderIklan($id)
    {
        $notif= $this->notif();
        $slider_iklan = Slider::where('role', 'IKLAN')->findOrFail($id);
        return view('frontend-advokat.slider.iklan',compact('slider_iklan','notif'));
    }
    public function sliderLawyer($id)
    {
        $notif= $this->notif();
        $slider_lawyer = Slider::where('role', 'LAWYER')->findorfail($id);
     return view('frontend-advokat.slider.lawyer',compact('slider_lawyer','notif'));
    }
    public function detailArtikel($id)
    {       
        $notif= $this->notif();
        $artikels = Artikel::where('mode', 'RELEASE')->get();
        $artikel = Artikel::with('like')->with('comment')->findOrFail($id);
        return view('frontend-advokat.artikel.index',compact('artikel','artikels','notif'));
    }
    public function detailEvent($id)
    { 
        // dd($id);
        $notif= $this->notif();
        $events = Events::get();
        $event = Events::findOrFail($id);
        return view('frontend-advokat.event.index',compact('event','events','notif'));
    }
 

    //kategori
    public function legalitas()
    {
        $notif= $this->notif();
        $legalitas = LayananLawyer::where('id', 9)->get();
       return view('frontend-advokat.kategori.legalitas.index', compact('legalitas','notif'));
    }
    public function mahkamahAgung()
    {
        $notif= $this->notif();
        $mahkamah_agung = MahkamahAgung::get();
        return view('frontend-advokat.kategori.mahkamah-agung.index',compact('mahkamah_agung','notif'));
    }
    public function peraturan()
    {
        $notif= $this->notif();
        $peraturan = Peraturan::withCount('detail')->orderBy('id')->get();
        return view('frontend-advokat.kategori.update-peraturan.index', compact('peraturan','notif'));
    }
    
    public function updatePeraturan($id)
    {
        $notif= $this->notif();
        $detail_peraturan = PeraturanDetail::with('peraturan')->where('peraturan_id', $id)->orderBy('id')->get();
        return view('frontend-advokat.kategori.update-peraturan.detail',compact('detail_peraturan','notif'));
    }

    // halaman di navbar
    public function pertanyaan()
    {
        $notif= $this->notif();
        $pertanyaan = Pertanyaan::with('user')->with('jawaban')->get();

        return view('frontend-advokat.pertanyaan.index',compact('pertanyaan','notif'));
    }
    public function detailPertanyaan($id)
    {
        $notif= $this->notif();
        $pertanyaan_detail = Pertanyaan::with('jawaban')->find($id);
        // $jawaban = Jawaban::where('pertanyaan_id', $pertanyaan_detail->id)->first();
        $jawab= json_decode($pertanyaan_detail->jawaban);
       
    //    dd($jawab);
      
     
        foreach ($jawab as $j) {
         $akun = User::where('id',$j->user_id)->get();
        //  foreach ($akun as $k) {
        //      # code...
        //      dd($k->nama_lengkap);
        //  }
              
        }   
         
      
        return view('frontend-advokat.pertanyaan.detail',compact('pertanyaan_detail','akun','notif'));
    }
    public function riwayat()
    {
        $notif= $this->notif();
        $konsultasi=Konsultasi::with('client')->with('service')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        $pembayaran=Pembayaran::where('lawyer_id', session()->get('user')->id)->where('type','MEMBERSHIP')->get();
        
     return view('frontend-advokat.riwayat.index',compact('konsultasi','pembayaran','notif'));
    }
    public function profil()
    {
        $notif= $this->notif();
        $profil = User::with('lawyer_detail')->where('role', 'LAWYER')->where('id', session()->get('user')->id)->first();
        $bidang = Service::whereIn('id', json_decode($profil->lawyer_detail->service))->get();
        $bayar =Pembayaran::with('client')->where('lawyer_id', $profil->id)->whereIn('type',['VICON','PENDAMPINGAN','PERTEMUAN','LIVE_CHAT','TERTULIS'])->where('status','PAID')->orderBy('id','DESC')->get();
        // foreach($bayar as $b){
        //     $hasil = $b->amount->->count();
        // }
        $harga_total = 0;
        foreach($bayar as $item=>$value)
        {
        $harga_total +=$value['amount'];
        }

        // dd($harga_total);
        return view('frontend-advokat.profil.index',compact('profil', 'bidang','bayar','harga_total','notif'));
    }
    public function bidangHukum()
    {
        $notif= $this->notif();
        $profil = User::with('lawyer_detail')->with('lawyer_price')->where('role', 'LAWYER')->where('id', session()->get('user')->id)->first();
        $bidang = Service::whereIn('id', json_decode($profil->lawyer_detail->service))->get();
        // dd($profil->lawyer_detail);
        //  $lawyerPrice = LawyerPrice::where('user_id', session()->get('user')->id)->whereIn('service_id', json_decode($profil->lawyer_detail->service))->get();
        foreach ($bidang as $m) {
            $lawyerPrice = LawyerPrice::where('user_id', session()->get('user')->id)->where('service_id', $m->id)->get();
            $data[] = collect($m)->prepend($lawyerPrice, 'lawyerPrice');;
// dd($data);
        }
        return view('frontend-advokat.profil.bidang-hukum',compact('bidang','data','profil','notif'));
    }
    public function FAQ()
    {      
        $notif= $this->notif();
        $faq = Faq::get();
        return view('frontend-advokat.faq.index',compact('faq'));
    }
    public function kebijakanPrivasi()
    {
        $notif= $this->notif();
        $privacy =Privacy::first();
        return view('frontend-advokat.kebijakan.index',compact('privacy','notif'));
    }
    public function bantuan()
    {
        $notif= $this->notif();
        $help = Help::get();
        $youtube = Help::find(4);
        $link = json_decode($youtube->contact);
      
        return view('frontend-advokat.bantuan.index',compact('help','notif','link'));
    }

    //halaman di aktivitas
    public function liveChat()
    {
        $notif= $this->notif();
        $konsultasi=Konsultasi::with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        foreach($konsultasi as $k)
        $chat=Chat::with('konsultasi')->where('konsultasi_id',$k->id)->get();
      dd($konsultasi);
        return view('frontend-advokat.aktivitas.livechat.index',compact('konsultasi','chat','notif'));
    }
    public function videoConference()
    {
        $notif= $this->notif();
        $vicon =Vicon::with('konsultasi')->with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        return view('frontend-advokat.aktivitas.video-conference.index',compact('vicon','notif'));
    }
    public function detailVideoConference($id)
    {
        $notif= $this->notif();
        $vicon_detail =Vicon::find($id);
        return view('frontend-advokat.aktivitas.video-conference.detail',compact('vicon_detail','notif'));
    }
    public function artikel()
    {
        $notif= $this->notif();
        $artikelsaya = Artikel::where('user_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        return view('frontend-advokat.aktivitas.artikel.index',compact('artikelsaya','notif'));
    }
    public function detailArtikelSaya($id)
    {
        $notif= $this->notif();
        $artikelsaya = Artikel::where('user_id', session()->get('user')->id)->get();
        $detail_artikel_saya = Artikel::with('like')->with('comment')->findOrFail($id);
        return view('frontend-advokat.aktivitas.artikel.detail',compact('detail_artikel_saya','artikelsaya','notif'));
    }
    public function report()
    {
        $notif= $this->notif();
        $report =Report::with('konsultasi')->with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();

    //    dd($report);
        return view('frontend-advokat.aktivitas.report.index',compact('report','notif'));
    }
    public function pertemuan()
    {
        $notif= $this->notif();
        $pertemuan=Pertemuan::with('konsultasi')->with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
    //    dd($pertemuan);
        return view('frontend-advokat.aktivitas.pertemuan.index',compact('pertemuan','notif'));
    }
    public function detailPertemuan($id)
    {
        $notif= $this->notif();
        $pertemuan_detail = Pertemuan::find($id);
        // dd($pertemuan_detail);
        return view('frontend-advokat.aktivitas.pertemuan.detail',compact('pertemuan_detail','notif'));
    }
    public function pendampingan()
    {
        $notif= $this->notif();
        $pendampingan=Pendampingan::with('konsultasi')->with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        return view('frontend-advokat.aktivitas.pendampingan.index',compact('pendampingan','notif'));
    }
    public function detailPendampingan($id)
    {
        $notif= $this->notif();
        $pendampingan_detail =Pendampingan::find($id);
        return view('frontend-advokat.aktivitas.pendampingan.detail',compact('pendampingan_detail','notif'));
    }
    public function tertulis()
    {
        $notif= $this->notif();
        $tertulis =Tertulis::with('konsultasi')->with('client')->where('lawyer_id', session()->get('user')->id)->orderBy('id','DESC')->get();
        return view('frontend-advokat.aktivitas.tertulis.index',compact('tertulis','notif'));
    }
    public function detailTertulis($id)
    {
        $notif= $this->notif();
        $tertulis_detail =Tertulis::find($id);
        return view('frontend-advokat.aktivitas.tertulis.detail',compact('tertulis_detail','notif'));
    }
    public function tagihan()
    {
        $notif= $this->notif();
        $tagihan =Pembayaran::with('client')->where('lawyer_id', session()->get('user')->id)->whereIn('type',['VICON','PENDAMPINGAN','PERTEMUAN','LIVE_CHAT','TERTULIS'])->orderBy('id','DESC')->get();
        // dd($tagihan);
        return view('frontend-advokat.aktivitas.tagihan.index',compact('tagihan','notif'));
    }
    public function buatTagihan()
    {
        $notif= $this->notif();
        return view('frontend-advokat.aktivitas.tagihan.buat-tagihan',compact('notif'));
    }

    public function update_profil(Request $request)
    {
        $data = $request->all();
        $id = session()->get('user')->id;

        User::with('lawyer_detail')->where('id', $id)->update($data);
        return response($data);
    }

    public function update(Request $request,  $id)
    {
        $artikel = LawyerPrice::find($id);
        return $lawyerprice;
    }
    public function edit(LawyerPrice $lawyerprice)
    {
        return $lawyerprice;
    }
    // public function edit(Request $request)
    // {
    //     $data = $request->all();
    //     $id = session()->get('user')->id;

    //     LawyerPrice::where('user_id', $id)->update($data);

    //     return response($data);
    // }
    public function status(Request $request)
    {
        $id = session()->get('user')->id;
        $profil= User::with('lawyer_detail')->where('id',$id);
        $status =$profil->lawyer_detail;
        if($status->probono == true){
            $status->update([
                'probono' => false
            ]);
        }else{
            $status->update([
                'probono' => true
            ]);
        }
        dd($status);
    }
}
