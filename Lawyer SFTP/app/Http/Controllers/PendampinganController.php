<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Pendampingan;
use Storage;

class PendampinganController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $pendampingan = Pendampingan::where('option', 'ilike', '%'.$request->search.'%')->orderBy('updated_at')->paginate(10);
        return view('pendampingan.index', compact('pendampingan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id'     => 'required',
            'konsultasi_id' => 'required',
            'lawyer_id'     => 'required',
            'option'        => 'required',
            'status'        => 'required',
            'alasan_tolak'  => 'required',
        ],
        [
            'client_id'     => 'Nama Lengkap harus diisi',
            'konsultasi_id' => 'konsultasi id Sudah digunakan',
            'lawyer_id'     => 'lawyer id Sudah digunakan',
            'option'        => 'option harus diisi',
            'status'        => 'status harus diisi',
            'alasan_tolak'  => 'alasan tolak harus diisi',
        ]);
        Pendampingan::create([
            'client_id'      => $request->client_id,
            'konsultasi_id'  => $request->konsultasi_id,
            'lawyer_id'      => $request->lawyer_id,
            'option'         => $request->option,
            'status'         => $request->status,
            'alasan_tolak'   => $request->alasan_tolak,
        ]);

        return redirect('pendampingan')->with('success', 'Data berhasil ditambahkan');
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pendampingan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendampingan = pendampingan::find($id);
        return view('pendampingan.detail', compact('pendampingan'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pendampingan
     * @return \Illuminate\Http\Response
     */
    public function edit(pendampingan $pendampingan)
    {
        return $pendampingan;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $pendampingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendampingan $pendampingan)
    {
        $pendampingan->update(array_merge($request->all()));
        return redirect('pendampingan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pendampingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendampingan $pendampingan)
    {
        $pendampingan->delete();
        Storage::delete($pendampingan->avatar);
    }

    public function status(pendampingan $pendampingan)
    {
        if($pendampingan->status == true){
            $pendampingan->update([
                'status' => false
            ]);
        }else{
            $pendampingan->update([
                'status' => true
            ]);
        }
    }
    
}
