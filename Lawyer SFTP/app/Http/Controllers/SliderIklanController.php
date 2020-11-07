<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Slider;
use Storage;

class SliderIklanController extends Controller{

    public function index(){
        $slider = Slider::where('role', 'IKLAN')->orderBy('id')->get();
        return view('slider.iklan', compact('slider'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'image'     => 'required|max:2024',
            'status'    => 'required|in:1,0',
        ],
        [
            'judul'       => 'Judul harus diisi',
            'deskripsi'   => 'Deskripsi harus diisi',
            'image.max'  => 'Ukuran File Max 2mb',
            'status.in'  => 'Telpon Sudah digunakan',
        ]);
        $image = $request->file('image')->store('image');
        Slider::create([
            'judul'      => $request->judul,
            'deskripsi'  => $request->deskripsi,
            'image'      => $image,
            'role'      => 'IKLAN',
            'status'     => $request->status,
        ]);

        return redirect('slider/iklan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Slider $slider){
        return $slider;
    }
    public function edit(Slider $slider)
    {
        return $slider;
    }

    public function update(Request $request, Slider $slider)
    {
        if($request->image){
            $image = $request->file('image')->store('image');
            Storage::delete($slider->image);
        }else{
            $image = $slider->image;
        }
        $slider->update(array_merge($request->all(), [
            'image'    => $image
        ]));
        return redirect('slider/iklan')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        Storage::delete($slider->gambar);
    }

    public function SliderChangeStatus(Request $request){
        \Log::info($request->all());
        $slider = Slider::find($request->id);
        $slider->status = $request->$status;
        $slider->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
}
