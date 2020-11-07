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
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Layanan Tertulis</h1>
</div>
    <div class="col-md-3">
    <form action="{{url('tertulis')}}" name="cari" method="GET">
      <div class="row mb-1">
        <div class="input-group">
          <input type="text" name="search" class="form-control col-md-9" placeholder="Cari">
            <span class="input-group-prepend">
              <button type="submit" class="btn btn-danger">Cari</button>
            </span>
        </div>
      </div>
      </form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Layanan Tertulis</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th width="200">Nama Client</th>
            <th width="200">Nama Lawyer</th>
            <th>Jenis Layanan Tertulis</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($tertulis as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->client->nama_lengkap}}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{$m->option}}</td>
            <td>{{date('d-M-Y H:i:s', strtotime($m->created_at))}}</td>
            <td>
                @if($m->status == 'WAITING')
                Menunggu Konfirmasi
                @elseif($m->status == 'WAITING_PAYMENT')
                Menunggu Pembayaran
                @elseif($m->status == 'PAID')
                Sudah Bayar
                @elseif($m->status == 'TOLAK')
                Ditolak
                @elseif($m->status == 'CONFIRM')
                Terkonfirmasi
                @elseif($m->status == 'FINISH')
                Selesai
                @endif
            </td>
            <td>
                <a href="{{request()->url('tertulis')}}/{{$m->id}}" name="vidcon" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$tertulis->links()}}
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
@endsection