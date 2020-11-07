<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;
use App\Artikel;
use App\Events;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $slider_iklan = Slider::whereRole('IKLAN')->whereStatus(true)->get();
        return view('landing.home', compact('slider_iklan'));
    }
    
    public function blog()
    {
        $event = Events::whereStatus(true)->get();
        $artikel = Artikel::whereMode('RELEASE')->get();
        return view('landing.blog', compact('event', 'artikel'));
    }
    
    public function artikel($id)
    {
        $artikel = Artikel::find($id);
        $allartikel = Artikel::whereMode('RELEASE')->get();
        return view('landing.detail-artikel', compact('artikel', 'allartikel'));
    }
    
    public function event($id)
    {
        $event = Events::find($id);
        $allevent = Events::whereStatus(true)->get();
        return view('landing.detail-event', compact('event', 'allevent'));
    }
    
}
