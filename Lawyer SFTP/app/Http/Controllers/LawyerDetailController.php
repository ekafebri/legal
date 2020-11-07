<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\LawyerDetail;
use Storage;

class LawyerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lawyerdetail = LawyerDetail::all();
        return view('lawyerdetail.index', compact('lawyerdetail'));
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
            'komentar'          => 'required',
            'artikel_id'        => 'required',
        ],
        [
            'user_id'           => 'USer ID harus diisi',
            'komentar'          => 'komentar Sudah digunakan',
            'artikel_id'        => 'artikel harus diisi',
        ]);
        Komentars::create([
            'user_id'           => $request->user_id,
            'komentar'          => $request->komentar,
            'artikel_id'        => $request->artikel_id,
        ]);

        return redirect('komentars')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$pertanyaan = Pertanyaan::find($id);
        //return view('lawyer.show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $komentars = Komentars::find($id);
        return $komentars;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $komentars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $komentars = Komentars::find($id);
        $komentars->update(array_merge($request->all()));
        return redirect('komentars')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $komentars = Komentars::find($id);
        $komentars->delete();
        Storage::delete($komentars->avatar);
    }
    
}
