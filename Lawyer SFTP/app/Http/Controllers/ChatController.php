<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Chat;
use Storage;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chat = Chat::all();
        return view('chat.index', compact('chat'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'konsultasi_id'  => 'required',
            'pengirim_id'    => 'required',
            'penerima_id'    => 'required',
            'message'        => 'required',
            'type'           => 'required',
        ],
        [
            'konsultasi_id'  => 'Konsultasi ID harus diisi',
            'pengirim_id'    => 'Pengirim ID harus diisi',
            'penerima_id'    => 'Penerima ID harus diisi',
            'message'        => 'Message harus diisi',
            'type'           => 'Type harus diisi',
        ]);
        Chat::create([
            'konsultasi_id'  => $request->konsultasi_id,
            'pengirim_id'    => $request->pengirim_id,
            'penerima_id'    => $request->penerima_id,
            'message'        => $request->message,
            'type'           => $request->type,
        ]);

        return redirect('chat')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$pertanyaan = Pertanyaan::find($id);
        //return view('lawyer.show', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chat = Chat::find($id);
        return $chat;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $komentars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chat = Chat::find($id);
        $chat->update(array_merge($request->all()));
        return redirect('chat')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chat::find($id);
        $chat->delete();
        Storage::delete($chat->avatar);
    }
    
}
