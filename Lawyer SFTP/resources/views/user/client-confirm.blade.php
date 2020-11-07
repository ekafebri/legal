@extends('layouts.app')
@section('title')
Konfirmasi Client
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Konfirmasi Client</h1>
<p class="mb-4">
Konfirmasi dilakukan secara manual oleh admin
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Konfirmasi Client</h6>
    <!-- <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalUser">
        Tambah User
    </a> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($verified as $m)
          <?php $no++ ;?>
          <tr>
            <td>{{$no}}</td>
            <td>{{$m->user->nama_lengkap}}</td>
            <td>{{$m->user->email}}</td>
            <td>{{$m->user->telp}}</td>
            <td>{{$m->status}}</td>
            <td>
                <a href="#" name="user-client/terima/" style="color:white" data-type="" value="" class="confirmation badge bg-success" id="{{$m->id}}">Terima</a>
                <a href="#" name="user-client/tolak/" style="color:white" data-type="text" value="Alasan Tolak" class="confirmation badge bg-danger" id="{{$m->id}}">Tolak</a>
                <a href="{{url('client-konfirmasi/detail/'.$m->id)}}" style="color:white" class="badge bg-info">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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