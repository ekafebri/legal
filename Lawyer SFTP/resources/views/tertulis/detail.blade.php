@extends('layouts.app')
@section('title')
Layanan Tertulis
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Layanan Tertulis</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Layanan Tertulis {{$tertulis->client->nama_lengkap}}</h6>
    </div>
        <div class="card body">
            <table class="table">
            <tr>
                    <td width="200">Nama Client</td>
                    <td width="10">:</td>
                    <td>
                    <img src="{{($tertulis->client->avatar)?asset($tertulis->client->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$tertulis->client->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email Client</td>
                    <td>:</td>
                    <td>{{$tertulis->client->email}}</td>
                </tr>
                <tr>
                    <td>Telp Client</td>
                    <td>:</td>
                    <td>{{$tertulis->client->telp}}</td>
                </tr>
                <tr>
                    <td width="200">Nama Lawyer</td>
                    <td width="10">:</td>
                    <td>
                    <img src="{{($tertulis->lawyer->avatar)?asset($tertulis->lawyer->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$tertulis->lawyer->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email Lawyer</td>
                    <td>:</td>
                    <td>{{$tertulis->lawyer->email}}</td>
                </tr>
                <tr>
                    <td>Telp Lawyer</td>
                    <td>:</td>
                    <td>{{$tertulis->lawyer->telp}}</td>
                </tr>
                <tr>
                    <td>Bidang Hukum</td>
                    <td>:</td>
                    <td>{{$tertulis->konsultasi->service->nama}}</td>
                </tr>
                <tr>
                    <td>Jenis Layanan Tertulis</td>
                    <td>:</td>
                    <td>{{$tertulis->option}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                        @if($tertulis->status == 'WAITING')
                        Menunggu Konfirmasi
                        @elseif($tertulis->status == 'WAITING_PAYMENT')
                        Menunggu Pembayaran
                        @elseif($tertulis->status == 'PAID')
                        Sudah Bayar
                        @elseif($tertulis->status == 'TOLAK')
                        Ditolak
                        @elseif($tertulis->status == 'CONFIRM')
                        Terkonfirmasi
                        @elseif($tertulis->status == 'FINISH')
                        Selesai
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($tertulis->created_at))}}</td>
                </tr>
                @if($tertulis->status == 'TOLAK')
                <tr>
                    <td>Alasan Tolak</td>
                    <td>:</td>
                    <td>{{$tertulis->alasan_tolak}}</td>
                </tr>
                @endif
            </table>
        </div>
        <a href="{{url('tertulis')}}" class="btn btn-default">Kembali</a>
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