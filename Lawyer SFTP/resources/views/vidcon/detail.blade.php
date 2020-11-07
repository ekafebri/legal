@extends('layouts.app')
@section('title')
Pengajuan Vicon
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pengajuan Vicon</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Pengajuan Vicon {{$vidcon->client->nama_lengkap}}</h6>
    </div>
        <div class="card body">
            <table class="table">
                <tr>
                    <td width="200">Nama Client</td>
                    <td width="10">:</td>
                    <td>
                    <img src="{{($vidcon->client->avatar)?asset($vidcon->client->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$vidcon->nama}}
                    </td>
                </tr>
                <tr>
                    <td>Nama Lawyer</td>
                    <td>:</td>
                    <td>
                    <img src="{{($vidcon->lawyer->avatar)?asset($vidcon->lawyer->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$vidcon->lawyer->nama_lengkap}} 
                    </td>
                </tr>
                <tr>
                    <td>Bidang Hukum</td>
                    <td>:</td>
                    <td>{{$vidcon->konsultasi->service->nama}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$vidcon->email}}</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td>{{$vidcon->durasi}} Jam</td>
                </tr>
                <tr>
                    <td>Tanggal Video conference</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($vidcon->tgl_pengajuan))}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($vidcon->status == 'WAITING')
                        Menunggu Konfirmasi
                        @elseif($vidcon->status == 'WAITING_PAYMENT')
                        Menunggu Pembayaran
                        @elseif($vidcon->status == 'PAID')
                        Sudah Bayar
                        @elseif($vidcon->status == 'TOLAK')
                        Ditolak
                        @elseif($vidcon->status == 'CONFIRM')
                        Terkonfirmasi
                        @elseif($vidcon->status == 'FINISH')
                        Selesai
                        @endif</td>
                </tr>
                @if($vidcon->status == 'TOLAK')
                <tr>
                    <td>Alasan Tolak</td>
                    <td>:</td>
                    <td>{{$vidcon->alasan_tolak}}</td>
                </tr>
                @endif
                <tr>
                    <td>Link</td>
                    <td>:</td>
                    <td>{{$vidcon->link??'Belum ada'}}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($vidcon->created_at))}}</td>
                </tr>
                <tr>
                    <td>Kode Pembayaran</td>
                    <td>:</td>
                    <td>{{$pembayaran->kode_pembayaran??''}}</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>@rupiah($pembayaran->amount??0)</td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>:</td>
                    <td>{{$pembayaran->status??''}}</td>
                </tr>
            </table>
        </div>
        <a href="{{url('vidcon')}}" class="btn btn-default">Kembali</a>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')
@endsection
@section('js')
@endsection