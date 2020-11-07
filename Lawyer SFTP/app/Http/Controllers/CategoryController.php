<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Kategori;
use Storage;

class CategoryController extends Controller{

    public function index(){
        $category = Category::get();
        return view('category.index', compact('category'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required|unique:client',
            'gambar' => 'required|max:2024',
            'status' => 'required'
        ],
        [
            'nama' => 'Nama sudah digunakakn',
            'gambar.max' => 'Ukuran File Max 2 mb',
            'status.unique' => 'Status harus diisi',
        ]);
        $gambar = $request->file('gambar')->store('gambar');
        Category::create([
            'nama' => $request->nama,
            'gambar' => $gambar,
            'status' => $status,
        ]);

        return redirect('category')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Category $category){
        return $category;
    }
    public function edit(Category $category)
    {
        return $category;
    }

    public function update(Request $request, Category $category)
    {
        if($request->image){
            $image = $request->file('image')->store('gambar');
            Storage::delete($category->gambar);
        }else{
            $image = $category->gambar;
        }
        $category->update(array_merge($request->all(), [
            'gambar' => $image
        ]));
        return redirect('category')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Storage::delete($category->gambar);
    }

    public function status(Category $id){
        if($id->status == true){
            $id->update([
                'status' => false
            ]);
        }else{
            $id->update([
                'status' => true
            ]);
        }
    }
}
