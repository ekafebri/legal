<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Legalitas;
use Storage;

class LegalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalitas = Legalitas::orderBy('id')->get();
        return view('legalitas.index', compact('legalitas'));
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
    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'image' => 'required|max:2024',
        ],
        [
            'nama' => 'Nama sudah digunakakan',
            'image.max' => 'Ukuran File Max 2 mb',
        ]);
        $image = $request->file('image')->store('image');
        Legalitas::create([
            'nama' => $request->nama,
            'image' => $image,
            'status'    => true,
        ]);

        return redirect('legalitas')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Legalitas $legalitas){
        return $legalitas;
    }
    
    public function edit($id)
    {
        $legalitas = Legalitas::find($id);
        return $legalitas;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $legalitas = Legalitas::find($id);
        if($request->image){
            $image = $request->file('image')->store('image');
            Storage::delete($legalitas->image);
        }else{
            $image = $legalitas->image;
        }
        $legalitas->update(array_merge($request->all(), [
            'image' => $image
        ]));
        return redirect('legalitas')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $legalitas = Legalitas::find($id);
        $legalitas->delete();
        Storage::delete($legalitas->image);
    }

    public function status($id)
    {
        $legalitas = Legalitas::find($id);
        if($legalitas->status == true){
            $legalitas->update([
                'status' => false
            ]);
        }else{
            $legalitas->update([
                'status' => true
            ]);
        }
    }
}
