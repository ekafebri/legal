<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Vicon;
use Storage;

class ViconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    public function index()
    {
        $vicon = Vicon::whereStatus('WAITING')->orderBy('id', 'desc')->paginate(10);
        return view('vicon.index', compact('vicon'));
    }

    public function terima(Request $request, Vicon $vicon)
    {
        dd('oke');
    }
    
    public function tolak(Request $request, Vicon $vicon)
    {
        $vicon->update([
            'alasan_tolak'  => $request->alasan_tolak,
            'status'        => 'TOLAK'
        ]);
    }

    public function show(Vicon $vicon)
    {
        return view('vicon.detail', compact('vicon'));
    }

}
