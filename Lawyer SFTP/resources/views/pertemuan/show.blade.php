@extends('layouts.app')
@section('title')
Detail Pertemuan
@endsection
@section('css')
<style>
    
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Pertemuan</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail Pertemuan</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Nama Client</td>
                    <td>:</td>
                    <td>
                    <img src="{{($pertemuan->client->avatar)?asset($pertemuan->client->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$pertemuan->nama}}</td>
                </tr>
                <tr>
                    <td>Email Client</td>
                    <td>:</td>
                    <td>{{$pertemuan->email}}</td>
                </tr>
                <tr>
                    <td>Telp Client</td>
                    <td>:</td>
                    <td>{{$pertemuan->client->telp}}</td>
                </tr>
                <tr>
                    <td>Nama Lawyer</td>
                    <td>:</td>
                    <td>
                    <img src="{{($pertemuan->lawyer->avatar)?asset($pertemuan->lawyer->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$pertemuan->lawyer->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email Lawyer</td>
                    <td>:</td>
                    <td>{{$pertemuan->lawyer->email}}</td>
                </tr>
                <tr>
                    <td>Telp Lawyer</td>
                    <td>:</td>
                    <td>{{$pertemuan->lawyer->telp}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                    @if($pertemuan->status == 'CONFIRM')
                    Terkonfirmasi
                    @elseif($pertemuan->status == 'WAITING')
                    Menunggu Konfirmasi
                    @elseif($pertemuan->status == 'TOLAK')
                    Ditolak
                    @endif
                    </td>
                </tr>
                @if($pertemuan->status == 'TOLAK')
                <tr>
                    <td>Alasan Tolak</td>
                    <td>:</td>
                    <td>{{$pertemuan->alasan_tolak}}</td>
                </tr>
                @endif
                <tr>
                    <td>Tanggal Pertemuan</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($pertemuan->tgl_pengajuan))}}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($pertemuan->created_at))}}</td>
                </tr>
            </table>
        </div>
        <a href="{{url('pertemuan')}}" class="btn btn-default">Kembali</a>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')
@endsection
@section('js')
<script>
</script>
@endsection