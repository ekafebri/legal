@extends('layouts.app')
@section('title')
{{request()->is('pembayaran-berhasil*')?'Pembayaran Berhasil':'Pembayaran Tertunda'}}
@endsection
@section('css')

@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail {{request()->is('pembayaran-berhasil*')?'Pembayaran Berhasil':'Pembayaran Tertunda'}}</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">{{request()->is('pembayaran-berhasil*')?'Pembayaran Berhasil':'Pembayaran Tertunda'}}</h6>
    </div>
        <div class="card body">
            <table class="table">
                <tr>
                    <td width="200">Nama</td>
                    <td width="10">:</td>
                    <td>{{$pembayaran->client->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td width="200">Email</td>
                    <td width="10">:</td>
                    <td>{{$pembayaran->client->email}}</td>
                </tr>                
                <tr>
                    <td width="200">Telepon</td>
                    <td width="10">:</td>
                    <td>{{$pembayaran->client->telp}}</td>
                </tr>                
                <tr>
                    <td width="200">Alamat</td>
                    <td width="10">:</td>
                    <td>{{$pembayaran->client->alamat}}</td>
                </tr>
                <tr>
                    <td width="200">Kode Pembayaran</td>
                    <td width="10">:</td>
                    <td>{{$pembayaran->kode_pembayaran}}</td>
                </tr>
                <tr>
                    <td>Nominal</td>
                    <td>:</td>
                    <td>@rupiah($pembayaran->amount)</td>
                </tr>
                <tr>
                    <td>Pembayaran</td>
                    <td>:</td>
                    <td>@if($pembayaran->type == 'VICON')
                        Pengajuan Video Conference
                        @elseif($pembayaran->type == 'PENDAMPINGAN')
                        Pengajuan Pendampingan
                        @elseif($pembayaran->type == 'PERTEMUAN')
                        Pengajuan Pertemuan
                        @elseif($pembayaran->type == 'TERTULIS')
                        Pengajuan Layanan Tertulis
                        @elseif($pembayaran->type == 'LIVE_CHAT')
                        Layanan Live Chat
                        @endif</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>:</td>
                    <td>
                    @if($pembayaran->type == 'MEMBERSHIP')
                    {{$pembayaran->pengajuan->status}}
                    @elseif($pembayaran->type == 'LIVE_CHAT')
                    {{$pembayaran->chat->status}}
                    @elseif($pembayaran->type == 'PENDAMPINGAN')
                    {{$pembayaran->pendampingan->status}}
                    @elseif($pembayaran->type == 'PERTEMUAN')
                    {{$pembayaran->pertemuan->status}}
                    @elseif($pembayaran->type == 'TERTULIS')
                    {{$pembayaran->chat->status}}
                    @elseif($pembayaran->type == 'VICON')
                    {{$pembayaran->vicon->status}}
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>{{$pembayaran->status}}</td>
                </tr>
                <tr></tr>
                <tr>
                    <td>
                        <div class="modal-body">
                            <label for="">Avatar</label>
                            <div class="form-group">
                                @if($pembayaran->client->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
                                @else
                                <img src="{{asset($pembayaran->client->avatar)}}" alt="Avatar" width="300px" class="img-thumbnail myImg">
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