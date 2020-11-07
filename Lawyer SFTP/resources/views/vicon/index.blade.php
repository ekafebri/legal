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
<h1 class="h3 mb-2 text-gray-800">Daftar Pengajuan Vicon</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pengajuan Vicon</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Client</th>
            <th>Email</th>
            <th>Lawyer</th>
            <th>Durasi</th>
            <th>Tanggal Pengajuan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($vicon as $m)
          <?php $no++ ;?>
          <tr>
            <td>{{$no}}</td>
            <td>{{$m->nama}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{$m->durasi}} Jam</td>
            <td>{{$m->tgl_pengajuan}}</td>
            <td>{{$m->status}}</td>
            <td>
                <a href="#" name="vicon/terima/" style="color:white" data-type="text" value="Link" class="confirmation badge bg-success" id="{{$m->id}}">Terima</a>
                <a href="#" name="vicon/tolak/" style="color:white" data-type="text" value="Alasan Tolak" class="confirmation badge bg-danger" id="{{$m->id}}">Tolak</a>
                <a href="{{url('vicon/'.$m->id)}}" style="color:white" class="badge bg-info">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$vicon->links()}}
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