<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Slider;
use Storage;

class SliderController extends Controller{

    public function index(){
        if(request()->is('slider-client*')){
            $slider = Slider::where('role', 'CLIENT')->orderBy('id', 'desc')->get();
        }elseif(request()->is('slider-lawyer*')){
            $slider = Slider::where('role', 'LAWYER')->orderBy('id', 'desc')->get();
        }elseif(request()->is('slider-iklan*')){
            $slider = Slider::where('role', 'IKLAN')->orderBy('id', 'desc')->get();
        }
        return view('slider.index', compact('slider'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'gambar' => 'required|max:2024'
        ],
        [
            'gambar.max' => 'Ukuran File Max 2 mb'
        ]);
        $gambar = $request->file('gambar')->store('slider');
        if(request()->is('slider-lawyer*')){
            $role = 'LAWYER';
        }elseif(request()->is('slider-client*')){
            $role = 'CLIENT';
        }elseif(request()->is('slider-iklan*')){
            $role = 'IKLAN';
        }
        Slider::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $gambar,
            'role' => $role,
            'status' => true
        ]);

        
        if(request()->is('slider-lawyer*')){
            return redirect('slider-lawyer')->with('success', 'Data berhasil ditambahkan');
        }elseif(request()->is('slider-client*')){
            return redirect('slider-client')->with('success', 'Data berhasil ditambahkan');
        }elseif(request()->is('slider-iklan*')){
            return redirect('slider-iklan')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function show($id){
        $slider = Slider::find($id);
        return $slider;
    }
    
    public function edit(Slider $slider)
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
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        if($request->gambar){
            $gambar = $request->file('gambar')->store('image');
            Storage::delete($slider->image);
        }else{
            $gambar = $slider->image;
        }
        $slider->update(array_merge($request->all(), [
            'image' => $gambar
        ]));
        if(request()->is('slider-lawyer*')){
            return redirect('slider-lawyer')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('slider-client*')){
            return redirect('slider-client')->with('success', 'Data berhasil diubah');
        }elseif(request()->is('slider-iklan*')){
            return redirect('slider-iklan')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::delete($slider->image);
    }

    public function status(Slider $slider){
        
        if($slider->status == true){
            $slider->update([
                'status' => false
            ]);
        }else{
            $slider->update([
                'status' => true
            ]);
        }
    }
}
