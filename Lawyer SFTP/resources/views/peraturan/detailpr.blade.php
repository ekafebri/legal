@extends('layouts.app')
@section('title')
Peraturan
@endsection
@section('css')
<style>
.avatar { 
  background: url(blah.jpg) 50% 50% no-repeat; /* 50% 50% centers image in div */
  width: 40px;
  height: 40px;
}
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Peraturan</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Peraturan {{$peraturan->judul}}</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td width="300">Nama Peraturan</td>
                    <td width="50">:</td>
                    <td >{{$peraturan->nama_peraturan}}</td>
                </tr>
                <tr>
                    <td width="300">Status</td>
                    <td width="50">:</td>
                    <td >@if($peraturan->status == true)
                        Aktif
                        @else
                        Tidak Aktif
                        @endif</td>
                </tr>
                @foreach($peraturan->detail as $m)
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>
                    {{$m['nomer']}}
                    </td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>
                    {{$m['judul']}}
                    </td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td>
                    {{$m['jenis']}}
                    </td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td>:</td>
                    <td>
                    {{$m['instansi']}}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Ditetapkan</td>
                    <td>:</td>
                    <td>
                    {{$m['tgl_ditetapkan']}}
                    </td>
                </tr>
                <tr>
                    <td>No BN</td>
                    <td>:</td>
                    <td>
                    {{$m['no_bn']}}
                    </td>
                </tr>
                <tr>
                    <td>No TBN</td>
                    <td>:</td>
                    <td>
                    {{$m['no_tbn']}}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Diundingkan</td>
                    <td>:</td>
                    <td>
                    {{$m['tgl_diundingkan']}}
                    </td>
                </tr>
                <tr>
                    <td>File</td>
                    <td>:</td>
                    <td>
                    {{$m['file']}}
                    </td>
                </tr>
                @endforeach
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