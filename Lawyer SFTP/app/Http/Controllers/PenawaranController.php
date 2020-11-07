<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Jawaban;
use App\Pertanyaan;
use Storage;

class PenawaranController extends Controller{

    public function index(){

        if(request()->is('penawaran-kantor*')){
            $penawaran = Pertanyaan::where('kategori', 'KANTOR_HUKUM')->orderBy('id')->paginate(10);
        }elseif(request()->is('penawaran-lawyer*')){
            $penawaran = Pertanyaan::where('kategori', 'LAWYER')->orderBy('id')->paginate(10);
        }
        return view('penawaran.index', compact('penawaran'));
    }

    public function create(){
        //1
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_peraturan'       => 'required',
        ],
        [
            'nama_peraturan'       => 'Username Sudah digunakan',
        ]);
        Pertanyaan::create([
            'nama_peraturan'      => $request->nama_peraturan,
            'status'              => true
        ]);

        return redirect('penawaran')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id){
        $penawaran = Pertanyaan::find($id);
        return view('penawaran.show', compact('penawaran'));
    }
    public function edit($id)
    {
        $penawaran = Pertanyaan::find($id);
        return $penawaran;
    }

    public function update(Request $request, $id)
    {
        $penawaran = Pertanyaan::find($id);
        $penawaran->update(array_merge($request->all()));
        return redirect('penawaran')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $penawaran = Pertanyaan::find($id);
        $penawaran->delete();
        Storage::delete($penawaran->gambar);
    }
    public function status($id)
    {
        $penawaran = Pertanyaan::find($id);
        if($penawaran->status == true){
            $penawaran->update([
                'status' => false
            ]);
        }else{
            $penawaran->update([
                'status' => true
            ]);
        }
    }
}
