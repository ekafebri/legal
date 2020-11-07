@extends('layouts.app')
@section('title')
Pendampingan
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pendampingan</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Pendampingan {{$pendampingan->client->nama_lengkap}}</h6>
    </div>
        <div class="card body">
            <table class="table">
                <tr>
                    <td width="200">Nama Client</td>
                    <td width="10">:</td>
                    <td>
                    <img src="{{($pendampingan->client->avatar)?asset($pendampingan->client->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$pendampingan->client->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email Client</td>
                    <td>:</td>
                    <td>{{$pendampingan->client->email}}</td>
                </tr>
                <tr>
                    <td>Telp Client</td>
                    <td>:</td>
                    <td>{{$pendampingan->client->telp}}</td>
                </tr>
                <tr>
                    <td width="200">Nama Lawyer</td>
                    <td width="10">:</td>
                    <td>
                    <img src="{{($pendampingan->lawyer->avatar)?asset($pendampingan->lawyer->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$pendampingan->lawyer->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email Lawyer</td>
                    <td>:</td>
                    <td>{{$pendampingan->lawyer->email}}</td>
                </tr>
                <tr>
                    <td>Telp Lawyer</td>
                    <td>:</td>
                    <td>{{$pendampingan->lawyer->telp}}</td>
                </tr>
                <tr>
                    <td>Bidang Hukum</td>
                    <td>:</td>
                    <td>{{$pendampingan->konsultasi->service->nama}}</td>
                </tr>
                <tr>
                    <td>Jenis Pendampingan</td>
                    <td>:</td>
                    <td>{{$pendampingan->option}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                    @if($pendampingan->status == 'WAITING')
                    Menunggu Konfirmasi
                    @elseif($pendampingan->status == 'WAITING_PAYMENT')
                    Menunggu Pembayaran
                    @elseif($pendampingan->status == 'PAID')
                    Sudah Bayar
                    @elseif($pendampingan->status == 'TOLAK')
                    Ditolak
                    @elseif($pendampingan->status == 'CONFIRM')
                    Terkonfirmasi
                    @elseif($pendampingan->status == 'FINISH')
                    Selesai
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($pendampingan->created_at))}}</td>
                </tr>
                @if($pendampingan->status == 'TOLAK')
                <tr>
                    <td>Alasan Tolak</td>
                    <td>:</td>
                    <td>{{$pendampingan->alasan_tolak}}</td>
                </tr>
                @endif
            </table>
        </div>
        <a href="{{url('pendampingan')}}" class="btn btn-default">Kembali</a>
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