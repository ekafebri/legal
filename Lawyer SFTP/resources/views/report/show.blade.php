@extends('layouts.app')
@section('title')
Detail Report
@endsection
@section('css')
<style>
    
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Report</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail Report</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Client</td>
                    <td>:</td>
                    <td>
                    <img src="{{($report->client->avatar)?asset($report->client->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$report->client->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Lawyer</td>
                    <td>:</td>
                    <td>
                    <img src="{{($report->lawyer->avatar)?asset($report->lawyer->avatar):url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;" width="30" height="30" class="avatar myImg">
                    {{$report->lawyer->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Judul Report</td>
                    <td>:</td>
                    <td>{{$report->judul_report}}</td>
                </tr>
                <tr>
                    <td>Penjelasan</td>
                    <td>:</td>
                    <td>{{$report->penjelasan}}</td>
                </tr>
                <tr>
                    <td>Layanan</td>
                    <td>:</td>
                    <td>{{$report->konsultasi->service->nama}}</td>
                </tr>
                <tr>
                    <td>Tanggal Pengiriman</td>
                    <td>:</td>
                    <td>{{date('d-M-Y H:i:s', strtotime($report->created_at))}}</td>
                </tr>
                <tr>
                    <td>File</td>
                    <td>:</td>
                    @php
                    $file = json_decode($report->file);
                    @endphp
                    <td>
                    @foreach($file as $k => $s)
                    <a href="{{asset($s)}}" target="_blank" class="badge btn-info" style="color:white">Download File {{$k +1 }}</a>
                    @endforeach
                    </td>
                </tr>
            </table>
        </div>
        <a href="{{url('report')}}" class="btn btn-default">Kembali</a>
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