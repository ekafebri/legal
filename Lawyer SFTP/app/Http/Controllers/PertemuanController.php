<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Pertemuan;
use Storage;

class PertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pertemuan = Pertemuan::orderBy('id')->paginate(10);
        if($request->search){
            $pertemuan = Pertemuan::where('nama', 'ilike', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(10);
        }
        return view('pertemuan.index', compact('pertemuan'));
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
            'client_id'      => 'required',
            'konsultasi_id'  => 'required',
            'lawyer_id'      => 'required',
            'status'         => 'required',
            'tgl_pengajuan'  => 'required',
            'nama'           => 'required',
            'email'          => 'required',
        ],
        [
            'client_id'      => 'Nama Lengkap harus diisi',
            'konsultasi_id'  => 'konsultasi_id Sudah digunakan',
            'lawyer_id'      => 'lawyer_id Sudah digunakan',
            'status'         => 'status harus diisi',
            'tgl_pengajuan'  => 'tgl_pengajuan harus diisi',
            'nama'           => 'nama harus diisi',
            'email'          => 'email harus diisi',
        ]);
        Pertemuan::create([
            'client_id'      => $request->client_id,
            'konsultasi_id'  => $request->konsultasi_id,
            'lawyer_id'      => $request->lawyer_id,
            'status'         => $request->status,
            'tgl_pengajuan'  => $request->tgl_pengajuan,
            'nama'           => $request->nama,
            'email'          => $request->email,
        ]);

        return redirect('pertemuan')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    /**  public function show($id)
    *{
    *    $pertanyaan = Pertanyaan::find($id);
    *    return view('lawyer.show', compact('pertanyaan'));
    *} */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertemuan = Pertemuan::find($id);
        return view('pertemuan.show', compact('pertemuan'));
    }

    public function edit($id)
    {
        $pertemuan = Pertemuan::find($id);
        return $pertemuan;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pertemuan = Pertemuan::find($id);
        if($request->image){
            $image = $request->file('image')->store('avatar');
            Storage::delete($pertemuan->avatar);
        }else{
            $image = $pertemuan->avatar;
        }
        $pertemuan->update(array_merge($request->all(), [
            'avatar' => $image
        ]));
        return redirect('pertemuan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertemuan = Pertemuan::find($id);
        $pertemuan->delete();
        Storage::delete($pertemuan->avatar);
    }
    
}
