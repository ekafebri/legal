<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\LawyerDetail;
use App\LawyerPrice;
use App\Service;
use App\Pembayaran;
use App\VerifikasiClient;
use App\PengajuanMember;
use App\Legalitas;
use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->is('user-lawyer*')){
            $user = User::where('role', 'LAWYER')->where( function ($query) use ($request)
            {
                $query->where('email', 'ilike', '%'.$request->search.'%');
                $query->orWhere('nama_lengkap', 'ilike', '%'.$request->search.'%');
                $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
                $query->orWhere('alamat', 'ilike', '%'.$request->search.'%');
                $query->orWhere('type', 'ilike', '%'.$request->search.'%');
            })->orderBy('id', 'desc')->paginate(10);
        }elseif(request()->is('user-kantor-hukum*')){
            $user = User::where('role', 'LAWYER')->where('type', 'KANTOR_HUKUM')->where( function ($query) use ($request)
            {
                $query->where('email', 'ilike', '%'.$request->search.'%');
                $query->orWhere('nama_lengkap', 'ilike', '%'.$request->search.'%');
                $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
                $query->orWhere('alamat', 'ilike', '%'.$request->search.'%');
                $query->orWhere('type', 'ilike', '%'.$request->search.'%');
            })->orderBy('id', 'desc')->paginate(10);
        }elseif(request()->is('user-client*')){
            $user = User::where('role', 'CLIENT')->where('type', 'PERORANGAN')->where( function ($query) use ($request)
            {
                $query->where('email', 'ilike', '%'.$request->search.'%');
                $query->orWhere('nama_lengkap', 'ilike', '%'.$request->search.'%');
                $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
                $query->orWhere('alamat', 'ilike', '%'.$request->search.'%');
                $query->orWhere('type', 'ilike', '%'.$request->search.'%');
            })->orderBy('id', 'desc')->paginate(10);
        }elseif(request()->is('user-perusahaan*')){
            $user = User::where('role', 'CLIENT')->where('type', 'PERUSAHAAN')->where( function ($query) use ($request)
            {
                $query->where('email', 'ilike', '%'.$request->search.'%');
                $query->orWhere('nama_lengkap', 'ilike', '%'.$request->search.'%');
                $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
                $query->orWhere('alamat', 'ilike', '%'.$request->search.'%');
                $query->orWhere('type', 'ilike', '%'.$request->search.'%');
            })->orderBy('id', 'desc')->paginate(10);
        }else{
            $user = User::where('role', 'NOTARIS')->where( function ($query) use ($request)
            {
                $query->where('email', 'ilike', '%'.$request->search.'%');
                $query->orWhere('nama_lengkap', 'ilike', '%'.$request->search.'%');
                $query->orWhere('telp', 'ilike', '%'.$request->search.'%');
                $query->orWhere('alamat', 'ilike', '%'.$request->search.'%');
                $query->orWhere('type', 'ilike', '%'.$request->search.'%');
            })->orderBy('id', 'desc')->paginate(10);
        }
        $legalitas = Legalitas::whereStatus(true)->get();
        return view('user.index', compact('user', 'legalitas'));
    }

    public function confirm()
    {
        $verified = VerifikasiClient::whereStatus('WAITING')->get();
        return view('user.client-confirm', compact('verified'));
    }

    public function confirmDetail(VerifikasiClient $id)
    {
        $user = User::find($id->user_id);
        return view('user.detail', compact('user', 'id'));
    }

    public function membership()
    {
        $pengajuan = PengajuanMember::whereStatus('WAITING')->paginate(10);
        return view('user.membership', compact('pengajuan'));
    }

    public function showmember(PengajuanMember $id){
        $user = User::find($id->user_id);
        return view('user.detailmember', compact('user', 'id'));
    }

    public function terima(VerifikasiClient $id)
    {
        $id->update([
            'status' => 'CONFIRM'
        ]);
        User::where('id', $id->user_id)->update([
            'verified'  => true,
            'ktp'       => $id->ktp,
            'selfie_ktp'=> $id->selfie_ktp,
            'no_ktp'    => $id->no_ktp
        ]);
    }

    public function tolak(Request $request, VerifikasiClient $id)
    {
        $id->update([
            'status'        => 'TOLAK',
            'alasan_tolak'  => $request->alasan_tolak
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'          => 'required|max:2024',
            'nama_lengkap'   => 'required|unique:users',
            'email'          => 'required|unique:users',
            'telp'           => 'required|unique:users',
        ],
        [
            'image.max'             => 'Ukuran File Max 2mb',
            'nama_lengkap.unique'   => 'Nama Lengkap harus diisi',
            'email.unique'          => 'Email Sudah digunakan',
            'telp.unique'           => 'Telpon Sudah digunakan',
        ]);
        $image      = $request->file('image')->store('avatar');
        if($request->telp[0] == 0){
            $telp = substr($request->telp, 1);
        }elseif($request->telp[0] == '+'){
            $telp = $request->telp;
        }
        $user = User::create(array_merge($request->all(),[
            'role'          => 'NOTARIS',
            'type'          => 'PERORANGAN',
            'avatar'        => $image,
            'status'        => true,
            'status_app'    => false,
            'verified'      => false,
            'telp'          => "+62".$telp,
        ]));
        LawyerDetail::create([
            'user_id'       => $user->id,
            'service'       => json_encode($request->service)
        ]);

        return redirect('user-notaris')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->is('user-lawyer*') || request()->is('user-kantor-hukum*')){
            $user = User::find($id);
            $service_id = LawyerDetail::where('user_id', $id)->first()->service;
            $service1 = Service::whereIn('id', json_decode($service_id))->get();
            foreach ($service1 as $m) {
                $price = LawyerPrice::where('user_id', $id)->where('service_id', $m->id)->first();
                if($price){
                    $service[] = collect($m)->prepend($price->harga, 'harga')->prepend($price->harga_vicon, 'harga_vicon')->prepend($price->deskripsi, 'deskripsi');
                }else{
                    $service[] = collect($m)->prepend(0, 'harga')->prepend(0, 'harga_vicon')->prepend('', 'deskripsi');
                }
            }
            return view('user.detail', compact('user', 'service'));
        }elseif(request()->is('user-client*')){
            $user = User::find($id);
            return view('user.detail', compact('user'));
        }elseif(request()->is('user-notaris*')){
            $user = User::find($id);
            return view('user.detail', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('lawyer_detail')->where('id', $id)->first();
        return $user;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user   = User::find($id);
        $lawyer = LawyerDetail::where('user_id', $id)->first();
        if($request->image){
            $image = $request->file('image')->store('avatar');
            if(Storage::exists($user->avatar)){
                Storage::delete($user->avatar);
            }
        }else{
            $image = $user->avatar;
        }
        $user->update(array_merge($request->all(), [
            'avatar' => $image
        ]));
        if($lawyer){
            $lawyer->update(array_merge($request->all(), [
                'service'   => json_encode($request->service)
            ]));
        }
        if(request()->is('user-lawyer*')){
            return redirect('user-lawyer')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('user-client*')){
            return redirect('user-client')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('user-notaris*')){
            return redirect('user-notaris')->with('success', 'Data berhasil diubah');
        }
    }

    public function viewFilled(User $user)
    {
        return view('user.view-filled', compact('user'));
    }

    public function filled(Request $request, User $user)
    {
        $lawyer = LawyerDetail::where('user_id', $user->id)->first();

        if($request->ktp){
            if (Storage::exists($user->ktp)) {
                Storage::delete($user->ktp);
            }
            $ktp = $request->file('ktp')->store('ktp');
        }else{
            $ktp = $user->ktp;
        }
        if($request->selfie_ktp){
            if (Storage::exists($user->selfie_ktp)) {
                Storage::delete($user->selfie_ktp);
            }
            $selfie_ktp = $request->file('selfie_ktp')->store('selfie_ktp');
        }else{
            $selfie_ktp = $user->selfie_ktp;
        }
        if($request->npwp){
            if (Storage::exists($user->npwp)) {
                Storage::delete($user->npwp);
            }
            $npwp = $request->file('npwp')->store('npwp');
        }else{
            $npwp = $user->npwp;
        }
        if($request->nib){
            if (Storage::exists($user->nib)) {
                Storage::delete($user->nib);
            }
            $nib = $request->file('nib')->store('nib');
        }else{
            $nib = $user->nib;
        }
        if($request->kartu_peradi){
            if (Storage::exists($lawyer->kartu_peradi)) {
                Storage::delete($lawyer->kartu_peradi);
            }
            $kartu_peradi = $request->file('kartu_peradi')->store('kartu_peradi');
        }else{
            $kartu_peradi = $lawyer->kartu_peradi;
        }
        if($request->berita_acara){
            if (Storage::exists($lawyer->berita_acara)) {
                Storage::delete($lawyer->berita_acara);
            }
            $berita_acara = $request->file('berita_acara')->store('berita_acara');
        }else{
            $berita_acara = $lawyer->berita_acara;
        }
        $user->update([
            'no_ktp' => $request->no_ktp,
            'ktp' => $ktp,
            'selfie_ktp' => $selfie_ktp,
            'npwp' => $npwp,
            'nib' => $nib,
        ]);
        $lawyer->update([
            'kartu_peradi' => $kartu_peradi,
            'berita_acara' => $berita_acara,
        ]);
        
        return redirect('user-notaris')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Storage::delete($user->avatar);
    }
    
    public function status(User $user)
    {
        if($user->status == true){
            $user->update([
                'status' => false
            ]);
        }else{
            $user->update([
                'status' => true
            ]);
        }
    }

    public function service(User $user)
    {
        $lawyer = LawyerDetail::where('user_id', $user->id)->first();
        $service_id = $lawyer->service;
        if(request()->is('user-lawyer*')){
            $service1 = Service::select('id', 'nama', 'gambar')->whereIn('id', json_decode($service_id))->get();
            $allservice = Service::select('id', 'nama', 'gambar')->whereNotIn('id', json_decode($service_id))->get();
        }elseif(request()->is('user-kantor-hukum*')){
            $service1 = Service::select('id', 'nama', 'gambar')->whereIn('id', json_decode($service_id))->get();
            $allservice = Service::select('id', 'nama', 'gambar')->whereNotIn('id', json_decode($service_id))->get();
        }elseif(request()->is('user-notaris*')){
            $service1 = Legalitas::select('id', 'nama', 'image as gambar')->whereIn('id', json_decode($service_id))->get();
            $allservice = Legalitas::select('id', 'nama', 'image as gambar')->whereNotIn('id', json_decode($service_id))->get();
        }
        foreach ($service1 as $m) {
            $price = LawyerPrice::where('user_id', $user->id)->where('service_id', $m->id)->first();
            if($price){
                $service[] = collect($m)->prepend($price->harga, 'harga')->prepend($price->harga_vicon, 'harga_vicon')->prepend($price->deskripsi, 'deskripsi');
            }else{
                $service[] = collect($m)->prepend(0, 'harga')->prepend(0, 'harga_vicon')->prepend('', 'deskripsi');
            }
        }
        return view('user.edit-service', compact('user', 'service', 'allservice'));
    }

    public function serviceUpdate(Request $request, User $user)
    {
        $lawyerPrice = LawyerPrice::where('user_id', $user->id)->first();
        if($lawyerPrice){
            foreach($request->service_id as $k => $m){
                $lawyerPrice->where('user_id', $user->id)->where('service_id', $m)->update([
                    'harga'         => $request->harga[$k],
                    'harga_vicon'   => $request->harga_vicon[$k],
                    'deskripsi'     => $request->deskripsi[$k],
                ]);
            }
        }else{
            foreach($request->service_id as $k => $m){
                LawyerPrice::create([
                    'user_id'       => $user->id,
                    'service_id'    => $m,
                    'harga'         => $request->harga[$k]??'',
                    'harga_vicon'   => $request->harga_vicon[$k]??'',
                    'deskripsi'     => $request->deskripsi[$k]??'',
                ]);
            }
        }
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function verified(User $user)
    {
        if($user->verified == true){
            $user->update([
                'verified' => false
            ]);
        }else{
            $user->update([
                'verified' => true
            ]);
        }
    }

    public function statuse(PengajuanMember $pengajuanmember)
    {
        if($pengajuanmember->status == true){
            $pengajuanmember->update([
                'status' => false
            ]);
        }else{
            $pengajuanmember->update([
                'status' => true
            ]);
        }
    }

    public function deleteService(Request $request, LawyerDetail $lawyer)
    {

        $service = json_decode($lawyer->service);
        $new_service = array_diff($service, $request->service_id);
        return ('oke');
        $lawyer->update([
            'service'   => json_decode($new_service)
        ]);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function addService(Request $request, User $user)
    {
        $lawyer = LawyerDetail::where('user_id', $user->id)->first();
        $service = json_decode($lawyer->service);
        array_push($service, $request->service_id);

        $lawyer->update([
            'service' => json_encode($service)
        ]);
    }
    
}
