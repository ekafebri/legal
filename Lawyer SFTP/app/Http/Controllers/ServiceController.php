<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Service;
use Storage;

class ServiceController extends Controller{

    public function index(){
        $service = Service::orderBy('id')->paginate(10);
        return view('service.index', compact('service'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        $this->validate($request, [
            'image'     => 'required|max:2024',
            'nama'  => 'required',
        ],
        [
            'image.max'  => 'Ukuran File Max 2mb',
            'nama'       => 'Username Sudah digunakan',
        ]);
        $image = $request->file('image')->store('bidang_hukum');
        Service::create([
            'nama'      => $request->nama,
            'status'    => true,
            'gambar'    => $image,
        ]);

        return redirect('service')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Service $service){
        return $service;
    }
    public function edit(Service $service)
    {
        return $service;
    }

    public function update(Request $request, Service $service)
    {
        if($request->image){
            Storage::delete($service->gambar);
            $image = $request->file('image')->store('bidang_hukum');
        }else{
            $image = $service->gambar;
        }
        $service->update(array_merge($request->all(), [
            'gambar' => $image
        ]));
        return redirect('service')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        Storage::delete($service->gambar);
    }

    public function status(Service $service)
    {
        if($service->status == true){
            $service->update([
                'status' => false
            ]);
        }else{
            $service->update([
                'status' => true
            ]);
        }
    }
}
