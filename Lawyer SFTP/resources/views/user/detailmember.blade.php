@extends('layouts.app')
@section('title')
Konfirmasi Membership
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Konfirmasi Membership</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Konfirmasi Membership</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td width="200">Nama</td>
                    <td width="10">:</td>
                    <td>{{$user->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td>{{$user->telp}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$user->alamat}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if($user->jenis_kelamin == 'PR')
                        Perempuan
                        @else
                        Laki-laki
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tipe Akun</td>
                    <td>:</td>
                    <td>{{$user->type}}</td>
                </tr>
                <tr>
                    <td>Status Akun</td>
                    <td>:</td>
                    <td>
                        @if($user->pengajuan->status == 'WAITING')
                        Menungu
                        @elseif($user->pengajuan->status == 'WAITING_PAYMENT')
                        Menunggu Pembayaran
                        @elseif($user->pengajuan->status == 'PAID')
                        Pembayaran Berhasil
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status Verifikasi</td>
                    <td>:</td>
                    <td>
                        @if($user->verified == true)
                        Sudah Verifikasi
                        @else
                        Belum Verifikasi
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td>:</td>
                    <td>{{$user->pengajuan->created_at}}</td>
                </tr>
                <tr>
                    <td>
                        <div class="modal-body">
                            <label for="">Avatar</label>
                            <div class="form-group">
                                @if($user->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @else
                                <img src="{{asset($user->avatar)}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @endif
                            </div>
                        </div>
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