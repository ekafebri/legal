@extends('layouts.app')
@section('title')
Detail Penawaran
@endsection
@section('css')
<style>
    .mySlides {display:none;}
.Center { 
            top: 50%; 
            left: 50%; 
            margin-left: 35%;
        } 
        .Button { 
            top: 50%; 
            left: 50%; 
            margin-left: 23%;
        } 
        .Size{
            font-size: 13px;
        }
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Penawaran</h1>
    <p class="mb-4">
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail Penawaran</h6>
    </div>
    
        <div class="card body">
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$penawaran->user->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Judul Pertanyaan</td>
                    <td>:</td>
                    <td>{{$penawaran->judul_pertanyaan}}</td>
                </tr>
                <tr>
                    <td>Pertanyaan</td>
                    <td>:</td>
                    <td>{{$penawaran->pertanyaan}}</td>
                </tr>
                <tr>
                    <td>Budget</td>
                    <td>:</td>
                    <td>{{$penawaran->budget}}</td>
                </tr>
                <tr>
                    <td>Penjelasan</td>
                    <td>:</td>
                    <td>{{$penawaran->penjelasan}}</td>
                </tr>
                
                <tr>
                    <td>Kategori Layanan</td>
                    <td>:</td>
                    <td>{{$penawaran->kategori_layanan}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td>
                    @if($penawaran->status == true)
                    Aktif
                    @else
                    Tidak Aktif
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>Kota Client</td>
                    <td>:</td>
                    <td>{{$penawaran->kota_client}}</td>
                </tr>
                <tr>
                    <td>Provinsi Client</td>
                    <td>:</td>
                    <td>{{$penawaran->provinsi_client}}</td>
                </tr>
            </table>
            <div class="card-body" >
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    @foreach($penawaran->jawaban as $m)
    <div class="col-md-4 " style="float: left; ">
     <div class="card mb-4" >
        <div class="card-body" style="background-color: white;">
        <img class="card-img-top"
          src="{{asset($penawaran->user->avatar)}}" alt="Card image cap" style="width:50px; height:50px; border-radius:150%; margin-right:3px;">
          {{$penawaran->user->nama_lengkap}} <br>
          <label class="Size"><small class="">{{$m->created_at}}</small></label>
          <p class="card-text" style="margin-top:5px;">{{$m->judul_jawaban}}</p>
          <p class="card-text">{{$m->deskripsi_jawaban}}</p>
        </div>
      </div>
    </div>

@endforeach
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            </div>
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
<script>
</script>
@endsection