<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Slider;
use Storage;

class SliderLawyerController extends Controller{

    public function index(){
        $slider = Slider::all();
        return view('slider.lawyer', compact('slider'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|max:2024',
            'status' => 'required',
        ],
        [
            'judul' => 'judul sudah digunakakan',
            'deskripsi' => 'deskripsi harus diisi',
            'gambar.max' => 'Ukuran File Max 2 mb',
            'status' => 'Status harus diisi',
        ]);
        $gambar = $request->file('gambar')->store('image');
        Slider::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $gambar,
            'role' => 'LAWYER',
            'status' => $request->status,
        ]);

        return redirect('lawyer')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(slider $slider){
        return $slider;
    }
    
    public function edit(slider $slider)
    {
        return $slider;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if($request->gambar){
            $gambar = $request->file('gambar')->store('image');
            Storage::delete($slider->image);
        }else{
            $gambar = $slider->image;
        }
        $slider->update(array_merge($request->all(), [
            'image' => $gambar
        ]));
        return redirect('lawyer')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::delete($slider->image);
    }

    public function status($id){
        $slider->update(array_merge($request->all(), [
            'status' => $status
        ]));
        return redirect('lawyer');
    }
}