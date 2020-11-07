<?php

namespace App\Http\Controllers;

use App\Komentars;
use App\User;
use App\Konsultasi;
use App\Artikel;
use App\Events;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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
        $user_total     = User::get()->count();
        $lawyer         = User::whereRole('LAWYER')->whereType('ADVOKAT')->count();
        $kantor_hukum   = User::whereRole('LAWYER')->whereType('KANTOR_HUKUM')->count();
        $client         = User::whereRole('CLIENT')->whereType('PERORANGAN')->count();
        $perusahaan     = User::whereRole('CLIENT')->whereType('PERUSAHAAN')->count();
        $notaris        = User::whereRole('NOTARIS')->whereType('PERORANGAN')->count();
        $kasus          = Konsultasi::get()->count();
        $artikel        = Artikel::whereMode('RELEASE')->get()->count();
        $event          = Events::whereStatus(true)->get()->count();
        $konsultasi_selesai = Konsultasi::whereIn('status', ['FINISH', 'FINISH_CLIENT', 'FINISH_LAWYER'])->get()->count();
        $konsultasi_ongoing = Konsultasi::whereIn('status', ['ON_GOING', 'PAID'])->get()->count();
        $konsultasi_expired = Konsultasi::where('status', 'EXPIRED')->get()->count();
        $konsultasi_cancel = Konsultasi::whereIn('status', ['CANCEL', 'CANCEL_LAWYER', 'CANCEL_CLIENT'])->get()->count();
        // $date = Carbon::now()->day(1)->month(1)->year($request->date);

        $data = [
            'user_total'    => $user_total,
            'lawyer'        => $lawyer,
            'client'        => $client,
            'kantor_hukum'  => $kantor_hukum,
            'perusahaan'    => $perusahaan,
            'notaris'       => $notaris,
            'kasus'         => $kasus,
            'artikel'       => $artikel,
            'event'         => $event,
            'konsultasi_selesai'         => $konsultasi_selesai,
            'konsultasi_ongoing'         => $konsultasi_ongoing,
            'konsultasi_cancel'          => $konsultasi_cancel,
            'konsultasi_expired'         => $konsultasi_expired,
        ];
        return view('home', compact('data'));
    }


    public function getDataChart(Request $request)
    {
        $date = Carbon::now()->day(1)->month(1)->year($request->year);
        
        for($i = 0; $i <= 11; $i++){
            $dataSelesai[] = Konsultasi::whereBetween('created_at', [$date->startOfMonth()->addMonthsNoOverflow($i)->toDateString(), $date->endOfMonth()->addMonthsNoOverflow($i)->toDateString()])->where('status', 'FINISH')->count();
            $dataBerlangsung[] = Konsultasi::whereBetween('created_at', [$date->startOfMonth()->addMonthsNoOverflow($i)->toDateString(), $date->endOfMonth()->addMonthsNoOverflow($i)->toDateString()])->whereIn('status', 'ON_GOING')->count();
        }
  
        $data = [
            'dataSelesai'  => $dataSelesai, 
            'dataBerlangsung'     => $dataBerlangsung, 
        ];
        return $data;
    }


    public function getDataChartMonth(Request $request)
    {
        $service_id = session()->get('user')->service_id;
        $date = Carbon::now()->day(1)->month($request->month)->year($request->year);
        $dayofMonth = $date->daysInMonth;
        
        if($service_id != 0){
            for($i = 1; $i <= $dayofMonth; $i++){
                $dataSelesai[] = Konsultasi::whereHas('service', function ($query) use($service_id)
                {
                    $query->where('service_id', $service_id);
                })->whereDay('created_at', $i)->whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->where('status', 'FINISH')->count();
                $dataBerlangsung[] = Konsultasi::whereHas('service', function ($query) use($service_id)
                {
                    $query->where('service_id', $service_id);
                })->whereDay('created_at',$i)->whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->whereIn('status', 'ON_GOING')->count();
                $label[] = $i;
            }
    
        }else{
            for($i = 1; $i <= $dayofMonth; $i++){
                $dataSelesai[] = Konsultasi::whereDay('created_at', $i)->whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->where('status', 'FINISH')->count();
                $dataBerlangsung[] = Konsultasi::whereDay('created_at',$i)->whereMonth('created_at', $request->month)->whereYear('created_at', $request->year)->whereIn('status', 'ON_GOING')->count();
                $label[] = $i;
            }
        }
        $data = [

            'label'         => $label,
            'dataSelesai'  => $dataSelesai, 
            'dataBerlangsung'     => $dataBerlangsung,  
        ];
        return $data;
    }
    public function under()
    {
        return view('under');
    }
    
}
