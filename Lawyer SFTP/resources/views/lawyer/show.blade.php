@extends('layouts.app')
@section('title')
User
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail User</h6>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span onclick="history.back(-1)">×</span>
        </button>
  </div>
    <div class="modal-body">
    <div class="form-group">
        <label>Email</label><br>
        <label class="form-control">{{$user->email}}</label></div>
    <div class="form-group">
        <label>Telepon</label><br>
        <label class="form-control">{{$user->telp}}</label></div>
    <div class="form-group">
        <label>Nama Lengkap</label><br>
        <label class="form-control">{{$user->nama_lengkap}}</label></div>
    <div class="form-group">
        <label>Alamat</label><br>
        <label class="form-control">{{$user->alamat}}</label></div>
    <div class="form-group">
        <label>Status</label><br>
        <label class="form-control">
        <div>@if($user->status == '1')
                  Aktif
                  @else
                  Non Aktif
                  @endif</div>
            </label></div>
    <div class="form-group">
        <label>Jenis Kelamin</label><br>
        <label class="form-control">
            <div>@if($user->jenis_kelamin == 'PR')
                  Perempuan
                  @else
                  Laki-laki
                  @endif</div>
            </label></div>
            
    <div class="form-group">
    <img src="{{asset($user->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail">
    </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection