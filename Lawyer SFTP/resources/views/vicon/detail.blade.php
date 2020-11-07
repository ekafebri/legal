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
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Pengajuan Vicon {{$vicon->nama_lengkap}}</h6>
    </div>
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Nama Client</td>
                    <td>:</td>
                    <td>{{$vicon->nama}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$vicon->email}}</td>
                </tr>
                <tr>
                    <td>Durasi</td>
                    <td>:</td>
                    <td>{{$vicon->durasi}} Jam</td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{$vicon->tgl_pengajuan}}</td>
                </tr>
                <tr>
                    <td>
                        <div class="modal-body">
                            <label for="">Avatar Lawyer</label>
                            <div class="form-group">
                                @if($vicon->lawyer->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @else
                                <img src="{{asset($vicon->lawyer->avatar)}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @endif
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
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