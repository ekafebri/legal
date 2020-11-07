@extends('layouts.app')
@section('title')
Notaris
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Notaris {{$user->nama_lengkap}}</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<form action="{{url('user-notaris/filled/'.$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Formulir Notaris</h6>
    </div>
    <div class="row">
        <div class="modal-body m-2 col-6">
            <div class="form-group">
                <label>No KTP</label><br>
                <input type="number" value="{{$user->no_ktp}}" name="no_ktp" class="form-control">
            </div>
            <div class="form-group">
                <label>KTP</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="ktp">
                <img src="{{asset($user->ktp)}}" alt="KTP" width="200px" class="img-thumbnail myImg">
            </div>
            <div class="form-group">
                <label>Selfie KTP</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="selfie_ktp">
                <img src="{{asset($user->selfie_ktp)}}" alt="Selfie KTP" width="200px" class="img-thumbnail myImg">
            </div>
            <div class="form-group">
                <label>Avatar</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="avatar">
                <img src="{{asset($user->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail myImg">
            </div>
        </div>
        <div class="modal-body col-5">
            <div class="form-group">
                <label>NPWP</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="npwp">
                <img src="{{asset($user->npwp)}}" alt="NPWP" width="200px" class="img-thumbnail myImg">
            </div>
            <div class="form-group">
                <label>NIB</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="nib">
                <img src="{{asset($user->nib)}}" alt="NIB" width="200px" class="img-thumbnail myImg">
            </div>
            <div class="form-group">
                <label>Kartu Peradi</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="kartu_peradi">
                <img src="{{asset($user->lawyer_detail->kartu_peradi)}}" alt="Kartu Peradi" width="200px" class="img-thumbnail myImg">
            </div>
            <div class="form-group">
                <label>Berita Acara</label><br>
                <small style="color:red">*max upload 2MB</small><br>
                <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
                <input type="file" class="form-control" name="berita_acara">
                <img src="{{asset($user->lawyer_detail->berita_acara)}}" alt="Berita Acara" width="200px" class="img-thumbnail myImg">
            </div>
        <a href="{{url('user-notaris')}}" class="btn btn-default">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
                
    </div>
    </div>
</form>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')

@endsection
@section('js')
@endsection