<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Opinion;
use Storage;

class OpinionController extends Controller
{
    public function index(){
        $opinion = Opinion::orderBy('id')->paginate(10);
        return view('opinion.index', compact('opinion'));
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
        Opinion::create([
            'client_id'      => $request->client_id,
            'konsultasi_id'  => $request->konsultasi_id,
            'lawyer_id'      => $request->lawyer_id,
            'option'         => $request->option,
            'status'         => $request->status,
            'alasan_tolak'   => $request->alasan_tolak,
        ]);

        return redirect('opinion')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $opinion
     * @return \Illuminate\Http\Response
     */
    /**  public function show($id)
    *{
    *    $opinion = opinion::find($id);
    *    return view('lawyer.show', compact('opinion'));
    *} */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        return $opinion;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        $opinion->update(array_merge($request->all()));
        return redirect('opinion')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        $opinion->delete();
        Storage::delete($opinion->avatar);
    }

    public function status(Opinion $opinion)
    {
        if($opinion->status == true){
            $opinion->update([
                'status' => false
            ]);
        }else{
            $opinion->update([
                'status' => true
            ]);
        }
    }
    
}
