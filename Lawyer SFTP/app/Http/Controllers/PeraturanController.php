<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Peraturan;
use App\PeraturanDetail;
use Storage;

class PeraturanController extends Controller{

    public function index(){
        $peraturan = Peraturan::orderBy('id')->paginate(10);
        return view('peraturan.index', compact('peraturan'));
    }

    public function create(){
    }

    public function store(Request $request){
        if(request()->is('peraturanDetail*')){
            PeraturanDetail::create($request->all());
            return redirect('peraturan/'.$request->peraturan_id)->with('success', 'Data berhasil ditambahkan');
        }else{
            Peraturan::create([
                'nama_peraturan'      => $request->nama_peraturan,
                'status'              => true
            ]);
            return redirect('peraturan')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function show($id){
        $peraturan = Peraturan::find($id);
        // return $peraturan->detail;
        return view('peraturan.detail', compact('peraturan'));
    }
    
    public function edit($id)
    {
        if(request()->is('peraturanDetail*')){
            $peraturan = PeraturanDetail::find($id);
        }else{
            $peraturan = Peraturan::find($id);
        }
        return $peraturan;
    }

    public function update(Request $request, $id)
    {
        if(request()->is('peraturanDetail*')){
            $peraturan = PeraturanDetail::find($id);
            $peraturan->update($request->all());
            return redirect('peraturan/'.$peraturan->peraturan_id)->with('success', 'Data berhasil diubah');
        }else{
            $peraturan = Peraturan::find($id);
            $peraturan->update($request->all());
            return redirect('peraturan')->with('success', 'Data berhasil diubah');
        }
    }

    public function destroy(peraturan $peraturan)
    {
        $peraturan->delete();
        Storage::delete($peraturan->gambar);
    }

    public function status(Peraturan $peraturan)
    {
        if($peraturan->status == true){
            $peraturan->update([
                'status' => false
            ]);
        }else{
            $peraturan->update([
                'status' => true
            ]);
        }
    }

    public function addfile(Request $request, $id)
    {
        $peraturan_detail = PeraturanDetail::find($id);
        $file = $request->file('file')->store('peraturan');
        $files = json_decode($peraturan_detail->file)??[];
        array_push($files, $file);
        $peraturan_detail->update([
            'file' => json_encode($files)
            ]);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    
    public function deleteFile($params, $id)
    {
        $peraturan_detail = PeraturanDetail::find($id);
        $files = json_decode($peraturan_detail->file);
        if (Storage::exists($files[$params])) {
            Storage::delete($files[$params]);
        }
        unset($files[$params]); 
        $peraturan_detail->update([
            'file' => json_encode($files)
            ]);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
}
