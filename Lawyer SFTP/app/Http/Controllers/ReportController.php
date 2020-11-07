<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\Report;
use Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $report = Report::orderBy('id')->get();

        return view('report.index', compact('report'));
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
        $this->validate($request, [
            'judul_report' => 'required',
            'file' => 'required|max:2024',
        ],
        [
            'judul_report' => 'Judul sudah digunakakan',
            'file.max' => 'Ukuran File Max 2 mb',
        ]);
        $file = $request->file('file')->store('file');
        Report::create([
            'judul_report' => $request->judul_report,
            'file' => $file,
            'penjelasan'    => $request->penjelasan,
        ]);

        return redirect('report')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $report = Report::find($id);
        return view('report.show', compact('report'));
    }
    
    public function edit($id)
    {
        $report = Report::find($id);
        return $report;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        if($request->file){
            $file = $request->file('file')->store('file');
            Storage::delete($report->file);
        }else{
            $file = $report->file;
        }
        $report->update(array_merge($request->all(), [
            'file' => $file
        ]));
        return redirect('report')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();
        Storage::delete($report->file);
    }

    public function download($file)
    {
        
        return response()->download($file);
    }
}
