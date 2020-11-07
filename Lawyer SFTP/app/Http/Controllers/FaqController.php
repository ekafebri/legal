<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Faq;
use Storage;

class FaqController extends Controller{

    public function index(){
        $faq = Faq:: orderBy('id')->get();
        return view('faq.index', compact('faq'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'pertanyaan'=> 'required',
            'jawaban'      => 'required',
        ],
        [
            'pertanyaan' => 'Pertanyaan harus diisi',
            'jawaban'       => 'Jawaban harus diisi',
        ]);
        Faq::create([
            'pertanyaan'      => $request->pertanyaan,
            'jawaban'      => $request->jawaban,
        ]);

        return redirect('faq')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Faq $faq){
        return $faq;
    }
    public function edit(Faq $faq)
    {
        return $faq;
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update(array_merge($request->all()));
        return redirect('faq')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
    }
}
