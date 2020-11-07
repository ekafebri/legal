<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Konsultasi;
use Storage;

class KonsultasiController extends Controller
{
    public function index(){
        if(request()->is('konsultasi-ongoing*')){
            $konsultasi = Konsultasi::where('status', 'ON_GOING')->orderBy('id', 'desc')->paginate(10);
        }elseif(request()->is('konsultasi-finish*')){
            $konsultasi = Konsultasi::where('status', 'FINISH')->orderBy('id', 'desc')->paginate(10);
        }else{
            $konsultasi = Konsultasi::orderBy('created_at', 'desc')->paginate(10);
            return view('konsultasi.index', compact('konsultasi'));
        }
        return view('konsultasi.index', compact('konsultasi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id'     => 'required',
            'service_id' => 'required',
            'lawyer_id'     => 'required',
            'review'        => 'required',
            'status'        => 'required',
            'alasan_tolak'  => 'required',
            'rating'  => 'required',
        ],
        [
            'client_id'     => 'Nama Lengkap harus diisi',
            'service_id' => 'konsultasi id Sudah digunakan',
            'lawyer_id'     => 'lawyer id Sudah digunakan',
            'review'        => 'review harus diisi',
            'status'        => 'status harus diisi',
            'alasan_tolak'  => 'alasan tolak harus diisi',
            'rating'  => 'alasan tolak harus diisi',
        ]);
        Konsultasi::create([
            'client_id'      => $request->client_id,
            'service_id'  => $request->service_id,
            'lawyer_id'      => $request->lawyer_id,
            'review'         => $request->review,
            'status'         => $request->status,
            'alasan_tolak'   => $request->alasan_tolak,
            'alasan_tolak'   => $request->alasan_tolak,
        ]);

        return redirect('konsultasi')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->is('konsultasi-ongoing*')){
            $konsultasi = Konsultasi::find($id);
        }elseif(request()->is('konsultasi-finish*')){
            $konsultasi = Konsultasi::find($id);
        }elseif(request()->is('konsultasi-history*')){
            $konsultasi = Konsultasi::find($id);
        }
        return view('konsultasi.show', compact('konsultasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konsultasi = Konsultasi::find($id);
        return $konsultasi;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $konsultasi = Konsultasi::find($id);
        $konsultasi->update(array_merge($request->all()));
        if(request()->is('konsultasi-ongoing*')){
            return redirect('konsultasi-ongoing')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('konsultasi-finish*')){
            return redirect('konsultasi-finish')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('konsultasi-history*')){
            return redirect('konsultasi-history')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $konsultasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(konsultasi $konsultasi)
    {
        $konsultasi->delete();
        Storage::delete($konsultasi->avatar);
    }

    public function status($id)
    {
        $konsultasi = Konsultasi::find($id);
        if($konsultasi->status == true){
            $konsultasi->update([
                'status' => false
            ]);
        }else{
            $konsultasi->update([
                'status' => true
            ]);
        }
    }
    
}
