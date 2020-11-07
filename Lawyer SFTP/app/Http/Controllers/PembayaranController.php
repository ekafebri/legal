<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\PengajuanMember;
use App\Vicon;
use Storage;

class PembayaranController extends Controller{

    public function index(){
        if(request()->is('pembayaran-berhasil*')){
            $pembayaran = Pembayaran::whereIn('status', ['PAID','SETTLED'])->get();
        }elseif(request()->is('pembayaran-pending*')){
            $pembayaran = Pembayaran::where('status', 'PENDING')->get();
        }elseif(request()->is('pembayaran-expired*')){
            $pembayaran = Pembayaran::where('status', 'EXPIRED')->get();
        }
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function store(Request $request){
        Setting::create($request->all());
        return redirect('settings')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Setting $setting)
    {
        return $setting;
    }

    public function show($id){
        if(request()->is('pembayaran-berhasil*')){
            $pembayaran = Pembayaran::find($id);
            return view('pembayaran.detail', compact('pembayaran'));
        }elseif(request()->is('pembayaran-pending*')){
            $pembayaran = Pembayaran::find($id);
            return view('pembayaran.detail', compact('pembayaran'));
        }elseif(request()->is('pembayaran-expired*')){
            $pembayaran = Pembayaran::find($id);
            return view('pembayaran.detail', compact('pembayaran'));
        }
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect('settings')->with('success', 'Data berhasil diubah');
    }
}
