<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Pertanyaan;
use Storage;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::orderBy('id')->get();
        return view('pertanyaan.index', compact('pertanyaan'));
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
            'user_id'           => 'required',
            'judul_pertanyaan'  => 'required',
            'pertanyaan'        => 'required',
            'budget'            => 'required',
            'penjelasan'        => 'required',
            'kategori_layanan'  => 'required',
        ],
        [
            'user_id'           => 'Nama Lengkap harus diisi',
            'judul_pertanyaan'  => 'judul_pertanyaan Sudah digunakan',
            'pertanyaan'        => 'pertanyaan Sudah digunakan',
            'budget'            => 'budget harus diisi',
            'penjelasan'        => 'penjelasan harus diisi',
            'kategori_layanan'  => 'kategori_layanan harus diisi',
        ]);
        Pertanyaan::create([
            'user_id'           => $request->user_id,
            'judul_pertanyaan'  => $request->judul_pertanyaan,
            'pertanyaan'        => $request->pertanyaan,
            'budget'            => $request->budget,
            'penjelasan'        => $request->penjelasan,
            'kategori_layanan'  => $request->kategori_layanan,
        ]);

        return redirect('pertanyaan')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    /**  public function show($id)
    *{
    *    $pertanyaan = Pertanyaan::find($id);
    *    return view('lawyer.show', compact('pertanyaan'));
    *} */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(pertanyaan $pertanyaan)
    {
        return $pertanyaan;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $pertanyaan->update(array_merge($request->all()));
        return redirect('pertanyaan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();
        Storage::delete($pertanyaan->avatar);
    }
    
    public function status($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        if($pertanyaan->status == true){
            $pertanyaan->update([
                'status' => false
            ]);
        }else{
            $pertanyaan->update([
                'status' => true
            ]);
        }
    }
}
