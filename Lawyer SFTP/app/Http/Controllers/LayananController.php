<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Layanan;
use Storage;

class LayananController extends Controller{

    public function index(){
        $layanan = Layanan::get();
        return view('layanan.index', compact('layanan'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'image'     => 'required|max:2024',
            'nama'      => 'required',
        ],
        [
            'image.max'  => 'Ukuran File Max 2mb',
            'nama'       => 'Username Sudah digunakan',
        ]);
        $image = $request->file('image')->store('image');
        Layanan::create([
            'nama'      => $request->nama,
            'image'    => $image,
            'status'    => true
        ]);

        return redirect('layanan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Layanan $layanan){
        return $layanan;
    }
    public function edit(Layanan $layanan)
    {
        return $layanan;
    }

    public function update(Request $request, Layanan $layanan)
    {
        if($request->image){
            $image = $request->file('image')->store('gambar');
            Storage::delete($layanan->gambar);
        }else{
            $image = $layanan->gambar;
        }
        $layanan->update(array_merge($request->all(), [
            'gambar'    => $image
        ]));
        return redirect('layanan')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        Storage::delete($layanan->gambar);
    }
}
