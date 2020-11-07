<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Vicon;
use Storage;

class VidconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $vicon = Vicon::where('nama', 'ilike', '%'.$request->search.'%')->whereIn('status', ['PAID', 'FINISH'])->orderBy('tgl_pengajuan', 'desc')->paginate(10);
        return view('vidcon.index', compact('vicon'));
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
    public function store(Request $request){
        Vicon::create([
            'link'    => $request->link,
        ]);

        return redirect('vidcon')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id){
        $vidcon = Vicon::find($id);
        return view('vidcon.detail', compact('vidcon'));
    }
    
    public function edit($id)
    {
        $vicon = Vicon::find($id);
        return $vicon;
    }
    
    public function update(Request $request, $id)
    {
        $vicon = Vicon::find($id);
        $vicon->update([
            'link'    => $request->link,
        ]);
        return redirect('vidcon')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $vicon = Vicon::find($id);
        $vicon->delete();
        Storage::delete($vicon->image);
    }

}
