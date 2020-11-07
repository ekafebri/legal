@extends('layouts.app')
@section('title')
Privasi
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Privasi</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Detail Privasi</h6>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span onclick="history.back(-1)">×</span>
        </button>
  </div>
    <div class="modal-body">
    <div class="form-group">
        <label>Konten</label><br>
        <textarea rows="25", cols="54" class="form-control">{{$privacy->content}}</textarea></div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection