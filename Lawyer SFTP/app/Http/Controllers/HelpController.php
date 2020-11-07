<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Help;
use Storage;

class HelpController extends Controller{

    public function index(){
        $help = Help::orderBy('id')->get();
        return view('help.index', compact('help'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'name_contact' => 'required',
            'contact'      => 'required',
        ],
        [
            'name_contact' => 'Nama Kontak harus diisi',
            'contact'      => 'Kontak harus diisi',
        ]);
        help::create([
            'name_contact' => $request->name_contact,
            'contact'      => $request->contact,
        ]);

        return redirect('help')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(help $help){
        return $help;
    }
    public function edit($id)
    {
        $help = Help::find($id);
        if(request()->is('help-youtube*')){
            $help = Help::find(4);
            $youtube = json_decode($help->contact, true);
            $no = 0;
            foreach ($youtube as $k => $v) {
                if($id == $no){
                    $y = [
                        'id'    => $no,
                        'judul' => $k,
                        'value' => $v
                    ];
                }
                $no++;
            }
            return $y;
        }
        return $help;
    }

    public function update(Request $request, help $help)
    {
        if($request->nama_youtube && $request->link_youtube){
            $data = [
                $request->nama_youtube => $request->link_youtube
            ];
            $data1 = json_decode($help->contact, true);
            if($data1){
                $data = array_merge_recursive($data, $data1);
            }
            $help->update([
                'contact' => json_encode($data)
            ]);
            return redirect('help')->with('success', 'Data berhasil diubah');
        }
        $help->update(array_merge($request->all()));
        return redirect('help')->with('success', 'Data berhasil diubah');
    }

    public function updateYoutube(Request $request)
    {
        $help = Help::find(4);
        $youtube = json_decode($help->contact, true);
        $no = 0;
        $data = [];
        foreach ($youtube as $k => $v) {
            if($request->id == $no){
                $data += [
                    $request->nama_youtube => $request->link_youtube
                ];
            }else{
                $data += [
                    $k => $v
                ];
            }
            $no++;
        }
        $help->update([
            'contact' => json_encode($data)
        ]);
        return redirect('help')->with('success', 'Data berhasil diubah');
    }

    public function destroy(help $help)
    {
        $help->delete();
    }
}
