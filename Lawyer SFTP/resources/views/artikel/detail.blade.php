@extends('layouts.app')
@section('title')
Artikel
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
    <h1 class="h3 mb-2 text-gray-800">Detail Artikel</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Artikel {{$artikel->judul}}</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Nama User</td>
                    <td>:</td>
                    <td>{{$artikel->user->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Konten</td>
                    <td>:</td>
                    <td>{{$artikel->content}}</td>
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td>:</td>
                    <td>{{$artikel->release_date}}</td>
                </tr>
                <tr>
                    <td>Sumber</td>
                    <td>:</td>
                    <td>{{$artikel->sumber}}</td>
                </tr>
                
                <tr>
                    <td>Komentar</td>
                    <td>:</td>
                    <td>
                    <div class="scroll">
                    @foreach($artikel->comment as $m)
                        <div class="form-group" style="border: 1px solid #e6e6e6;">
                            <div class="m-2">
                                @if($m->user->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" style="border-radius: 100%;"class="avatar myImg">
                                @else
                                <img src="{{asset($m->user->avatar)}}" alt="Avatar" style="border-radius: 100%;"class="avatar myImg">
                                @endif
                                {{$m->user['nama_lengkap']}}
                                <br>{{$m['created_at']}}</br>
                                {{$m['komentar']}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>Like</td>
                    <td>:</td>
                    <td>{{count($artikel->like)}}</td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td>:</td>
                    <td><img src="{{asset($artikel->image)}}" alt="Berita Acara" width="600px" class="img-thumbnail myImg"></td>
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