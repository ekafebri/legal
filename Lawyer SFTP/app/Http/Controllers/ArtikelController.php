<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Artikel;
use App\Komentars;
use Storage;

class ArtikelController extends Controller{

    public function index(){
        $artikel = Artikel::where('mode', 'RELEASE')->orderBy('id')->paginate(10);
        return view('artikel.index', compact('artikel'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'judul' => 'required',
            'image' => 'required|max:2024',
            'content' => 'required',
            'mode' => 'required',
            'release_date' => 'required',
            'sumber' => 'required',
        ],
        [
            'user_id' => 'Nama sudah digunakakan',
            'judul' => 'Nama sudah digunakakan',
            'content' => 'Nama sudah digunakakan',
            'image.max' => 'Ukuran File Max 2 mb',
            'mode' => 'Nama sudah digunakakan',
            'release_date' => 'Nama sudah digunakakan',
            'sumber' => 'Nama sudah digunakakan',
        ]);
        $image = $request->file('image')->store('artikel');
        Artikel::create([
            'user_id' => $request->user_id,
            'judul' => $request->judul,
            'content' => $request->content,
            'image' => $image,
            'mode' => $request->mode,
            'release_date' => $request->release_date,
            'sumber' => $request->sumber,
        ]);
        return redirect('artikel')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id){
        $artikel = Artikel::find($id);
        return view('artikel.detail', compact('artikel'));
    }
    
    public function edit(Artikel $artikel)
    {
        return $artikel;
    }

    public function update(Request $request,  $id)
    {
        $artikel = Artikel::find($id);
        if($request->image){
            $image = $request->file('image')->store('image');
            Storage::delete($artikel->image);
        }else{
            $image = $artikel->image;
        }
        $artikel->update(array_merge($request->all(), [
            'image' => $image
        ]));
        return redirect('artikel')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->update([
            'mode' => 'DELETE'
        ]);
    }

}
