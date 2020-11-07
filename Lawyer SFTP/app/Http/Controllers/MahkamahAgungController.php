<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\MahkamahAgung;
use Storage;

class MahkamahAgungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahkamahagung = MahkamahAgung::orderBy('id')->get();
        return view('mahkamahagung.index', compact('mahkamahagung'));
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
            'judul' => 'required',
            'image' => 'required|max:2024',
            
        ],
        [
            'judul' => 'Nama sudah digunakakan',
            'image.max' => 'Ukuran File Max 2 mb',
            
        ]);
        $image = $request->file('image')->store('gambar');
        MahkamahAgung::create([
            'judul' => $request->judul,
            'gambar' => $image,
            'link'    => $request->link,
        ]);

        return redirect('mahkamahagung')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(MahkamahAgung $mahkamahagung){
        return $mahkamahagung;
    }
    
    public function edit($id)
    {
        $mahkamahagung = MahkamahAgung::find($id);
        return $mahkamahagung;
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
        $mahkamahagung = MahkamahAgung::find($id);
        if($request->image){
            $image = $request->file('image')->store('gambar');
            Storage::delete($mahkamahagung->gambar);
        }else{
            $image = $mahkamahagung->gambar;
        }
        $mahkamahagung->update(array_merge($request->all(), [
            'gambar' => $image
        ]));
        return redirect('mahkamahagung')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $mahkamahagung = MahkamahAgung::find($id);
        $mahkamahagung->delete();
        Storage::delete($mahkamahagung->image);
    }

}
