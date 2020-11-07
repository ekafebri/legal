<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\LayananClient;
use App\LayananLawyer;
use Storage;

class KategoriController extends Controller{

    public function index(){
        if(request()->is('kategori-client*')){
            $kategori = LayananClient::orderBy('id')->get();
        }elseif(request()->is('kategori-lawyer*')){
            $kategori = LayananLawyer::orderBy('id')->get();
        }
        return view('kategori.index', compact('kategori'));
    }

    public function create(){
        //1
    }

    public function store(Request $request){
        $this->validate($request, [
            'image'     => 'required|max:2024',
        ],
        [
            'image.max'  => 'Ukuran File Max 2mb',
        ]);
        $image = $request->file('image')->store('gambar');
        if(request()->is('kategori-client*')){
            LayananClient::create([
                'nama'      => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar'    => $image,
                'status'    => true
            ]);
        }elseif(request()->is('kategori-lawyer*')){
            LayananClient::create([
                'nama'      => $request->nama,
                'deskripsi' => $request->deskripsi,
                'gambar'    => $image,
                'status'    => true
            ]);
        }

        if(request()->is('kategori-client*')){
            return redirect('kategori-client')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('kategori-lawyer')->with('success', 'Data berhasil diubah');
        }
    }

    public function show(kategori $kategori){
        return $kategori;
    }
    public function edit($id)
    {
        if(request()->is('kategori-client*')){
            $kategori = LayananClient::find($id);
        }else{
            $kategori = LayananLawyer::find($id);
        }
        return $kategori;
    }

    public function update(Request $request, $id)
    {
        
        if(request()->is('kategori-client*')){
            $kategori = LayananClient::find($id);
        }else{
            $kategori = LayananLawyer::find($id);
        }
        if($request->image){
            $image = $request->file('image')->store('gambar');
            if(Storage::exists($kategori->image)){
                Storage::delete($kategori->image);
            }
        }else{
            $image = $kategori->image;
        }
        $kategori->update(array_merge($request->all(), [
            'image'    => $image
        ]));
        
        if(request()->is('kategori-client*')){
            return redirect('kategori-client')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('kategori-lawyer')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        Storage::delete($kategori->gambar);
    }

    public function statusClient($id){
        $layanan = LayananClient::find($id);
        if($layanan->status == true){
            $layanan->update([
                'status' => false
            ]);
        }else{
            $layanan->update([
                'status' => true
            ]);
        }
    }

    public function statusLawyer($id){
        $layanan = LayananLawyer::find($id);
        if($layanan->status == true){
            $layanan->update([
                'status' => false
            ]);
        }else{
            $layanan->update([
                'status' => true
            ]);
        }
    }
}
