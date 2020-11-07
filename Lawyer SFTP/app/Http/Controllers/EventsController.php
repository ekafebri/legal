<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Events;
use Storage;

class EventsController extends Controller{

    public function index(){
        $event = Events::orderBy('id', 'desc')->get();
        return view('events.index', compact('event'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'tanggal' => 'required',
            'image' => 'required|max:2024',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ],
        [
            'nama' => 'Nama sudah digunakakan',
            'tanggal' => 'Tanggal harus diisi',
            'image.max' => 'Ukuran File Max 2 mb',
            'lokasi' => 'Lokasi harus diisi',
            'deskripsi' => 'Deskripsi harus diisi'
        ]);
        $image = $request->file('image')->store('gambar');
        Events::create(array_merge($request->all(),[
            'gambar' => $image,
            'status' => true,
        ]));

        return redirect('events')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Events $event){
        return $event;
    }
    
    public function edit(Events $event)
    {
        return $event;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        if($request->image){
            $image = $request->file('image')->store('gambar');
            Storage::delete($event->gambar);
        }else{
            $image = $event->gambar;
        }
        $event->update(array_merge($request->all(), [
            'gambar' => $image
        ]));
        return redirect('events')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Events $event)
    {
        $event->delete();
        Storage::delete($event->gambar);
    }

    public function status($id)
    {
        $event = Events::find($id);
        if($event->status == true){
            $event->update([
                'status' => false
            ]);
        }else{
            $event->update([
                'status' => true
            ]);
        }
    }
}
