<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\PengajuanMember;
use App\Pembayaran;
use Storage;

class PengajuanMemberController extends Controller
{
    public function index(){
        $pengajuanMember = PengajuanMember::orderBy('id')->paginate(10);
        return view('user.membership', compact('pengajuanMember'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'transaksi_id'      => 'required',
            'status'            => 'required',
            'member_expired'    => 'required',
            'lawyer_id'         => 'required',
        ],
        [
            'transaksi_id'      => 'Nama Lengkap harus diisi',
            'status'            => 'status harus diisi',
            'member_expired'    => 'memper expired Sudah digunakan',
            'lawyer_id'         => 'lawyer id harus diisi',
        ]);
        PengajuanMember::create([
            'transaksi_id'      => $request->transaksi_id,
            'status'            => $request->status,
            'member_expired'    => $request->member_expired,
            'lawyer_id'         => $request->lawyer_id,
        ]);

        return redirect('pengajuanMember')->with('success', 'Data berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $pengajuanMember
     * @return \Illuminate\Http\Response
     */
    /**  public function show($id)
    *{
    *    $pengajuanMember = pengajuanMember::find($id);
    *    return view('lawyer.show', compact('pengajuanMember'));
    *} */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pengajuanMember
     * @return \Illuminate\Http\Response
     */
    public function edit(pengajuanMember $pengajuanMember)
    {
        return $pengajuanMember;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $pengajuanMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengajuanMember $pengajuanMember)
    {
        $pengajuanMember->update(array_merge($request->all()));
        return redirect('pengajuanMember')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pengajuanMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengajuanMember $pengajuanMember)
    {
        $pengajuanMember->delete();
        Storage::delete($pengajuanMember->avatar);
    }

    public function status(pengajuanMember $pengajuanMember)
    {
        if($pengajuanMember->status == true){
            $pengajuanMember->update([
                'status' => false
            ]);
        }else{
            $pengajuanMember->update([
                'status' => true
            ]);
        }
    }
    
}
