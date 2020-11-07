<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\PeraturanDetail;
use Storage;

class PeraturanDetailController extends Controller{

    public function index(){
        $peraturanDetail = PeraturanDetail::get();
        return view('peraturan.detail', compact('peraturanDetail'));
    }

    public function create(){
        //1
    }

    public function store(Request $request){
        $this->validate($request, [
            'peraturan_id'       => 'required',
            'nomer'       => 'required',
            'judul'       => 'required',
            'jenis'       => 'required',
            'instansi'       => 'required',
            'tgl_ditetapkan'       => 'required',
            'no_bn'       => 'required',
            'no_tbn'       => 'required',
            'tgl_diundingkan'       => 'required',
            'file'       => 'required',
        ],
        [
            'peraturan_id'       => 'Username Sudah digunakan',
            'nomer'       => 'Username Sudah digunakan',
            'judul'       => 'Username Sudah digunakan',
            'jenis'       => 'Username Sudah digunakan',
            'instansi'       => 'Username Sudah digunakan',
            'tgl_ditetapkan'       => 'Username Sudah digunakan',
            'no_bn'       => 'Username Sudah digunakan',
            'no_tbn'       => 'Username Sudah digunakan',
            'tgl_diundingkan'       => 'Username Sudah digunakan',
            'file'       => 'Username Sudah digunakan',
            'peraturan_id'       => 'Username Sudah digunakan',
        ]);
        PeraturanDetail::create([
            'peraturan_id'      => $request->peraturan_id,
            'nomer'      => $request->nomer,
            'judul'      => $request->judul,
            'jenis'      => $request->jenis,
            'instansi'      => $request->instansi,
            'tgl_ditetapkan'      => $request->tgl_ditetapkan,
            'no_bn'      => $request->no_bn,
            'no_tbn'      => $request->no_tbn,
            'tgl_diundingkan'      => $request->tgl_diundingkan,
            'file'      => $request->file,
        ]);

        return redirect('peraturan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(peraturanDetail $peraturanDetail){
        return $peraturanDetail;
    }
    public function edit(peraturanDetail $peraturanDetail)
    {
        return $peraturanDetail;
    }

    public function update(Request $request, peraturanDetail $peraturanDetail)
    {
        $peraturanDetail->update(array_merge($request->all()));
        return redirect('peraturan')->with('success', 'Data berhasil diubah');
    }

    public function destroy(peraturanDetail $peraturanDetail)
    {
        $peraturanDetail->delete();
    }
}
