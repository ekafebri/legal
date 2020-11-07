<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Privacy;
use Storage;

class PrivacyController extends Controller{

    public function index(){
        $privacy = Privacy::get();
        return view('privasi.index', compact('privacy'));
    }

    public function create(){
        //
    }

    public function show($id){
        $privacy = Privacy::find($id);
        return view('privasi.show', compact('privacy'));
    }
    public function edit(privacy $privacy)
    {
        return view('privasi.edit', compact('privacy'));
    }

    public function update(Request $request, Privacy $privacy)
    {
        $privacy->update([
            'content' => $request->content
        ]);
        return redirect('privacy')->with('success', 'Data berhasil diubah');
    }
}
