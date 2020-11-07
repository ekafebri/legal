<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Jawaban;
use Storage;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawaban = Jawaban::with('user')->get();
        return view('jawaban.index', compact('jawaban'));
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
            'user_id'              => 'required',
            'pertanyaan_id'        => 'required',
            'judul_jawaban'        => 'required',
            'deskripsi_jawaban'    => 'required',
        ],
        [
            'user_id'              => 'Nama Lengkap harus diisi',
            'pertanyaan_id'        => 'jawaban Sudah digunakan',
            'judul_jawaban'        => 'judul_jawaban Sudah digunakan',
            'deskripsi_jawaban'    => 'deskripsi jawaban harus diisi',
        ]);
        jawaban::create([
            'user_id'               => $request->user_id,
            'pertanyaan_id'         => $request->pertanyaan_id,
            'judul_jawaban'         => $request->judul_jawaban,
            'deskripsi_jawaban'     => $request->deskripsi_jawaban,
        ]);

        return redirect('jawaban')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $jawaban
     * @return \Illuminate\Http\Response
     */
    /** public function show($id)
     *{
     *   $jawaban = Jawaban::find($id);
     *   return view('lawyer.show', compact('jawaban'));
    *} */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function edit(Jawaban $jawaban)
    {
        return $jawaban;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jawaban $jawaban)
    {
        if($request->image){
            $image = $request->file('image')->store('avatar');
            Storage::delete($jawaban->avatar);
        }else{
            $image = $jawaban->avatar;
        }
        $jawaban->update(array_merge($request->all(), [
            'avatar' => $image
        ]));
        return redirect('jawaban')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $jawaban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jawaban $jawaban)
    {
        $jawaban->delete();
        Storage::delete($jawaban->avatar);
    }
}
