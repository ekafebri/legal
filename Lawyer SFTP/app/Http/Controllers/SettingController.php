<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Setting;
use Storage;

class SettingController extends Controller{

    public function index(){
        $setting = Setting::get();
        return view('settings.index', compact('setting'));
    }

    public function store(Request $request){
        Setting::create($request->all());
        return redirect('settings')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Setting $setting)
    {
        return $setting;
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update($request->all());
        return redirect('settings')->with('success', 'Data berhasil diubah');
    }
}
