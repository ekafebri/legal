<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Konsultasi;
use App\Tertulis;
use Storage;

class TertulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tertulis = Tertulis::where('option', 'ilike', '%'.$request->search.'%')->orderBy('updated_at', 'desc')->paginate(10);
        return view('tertulis.index', compact('tertulis'));
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
            'option'         => 'required',
            'status'         => 'required',
            'alasan_tolak'   => 'required',
        ],
        [
            'client_id'      => 'Nama Lengkap harus diisi',
            'konsultasi_id'  => 'konsultasi_id Sudah digunakan',
            'lawyer_id'      => 'lawyer_id Sudah digunakan',
            'option'         => 'option harus diisi',
            'status'         => 'status harus diisi',
            'alasan_tolak'   => 'alasan_tolak harus diisi',
        ]);
        Tertulis::create([
            'client_id'      => $request->client_id,
            'konsultasi_id'  => $request->konsultasi_id,
            'lawyer_id'      => $request->lawyer_id,
            'option'         => $request->option,
            'status'         => $request->status,
            'alasan_tolak'   => $request->alasan_tolak,
        ]);

        return redirect('tertulis')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
      public function show($id)
    {
        $tertulis = Tertulis::find($id);
        return view('tertulis.detail', compact('tertulis'));
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tertulis = Tertulis::find($id);
        return $tertulis;
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
        $tertulis = Tertulis::find($id);
        if($request->image){
            $image = $request->file('image')->store('avatar');
            Storage::delete($tertulis->avatar);
        }else{
            $image = $tertulis->avatar;
        }
        $tertulis->update(array_merge($request->all(), [
            'avatar' => $image
        ]));
        return redirect('tertulis')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tertulis = Tertulis::find($id);
        $tertulis->delete();
        Storage::delete($tertulis->avatar);
    }
    
}
