@extends('layouts.app')
@section('title')
Admin
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Admin</h1>
</div>
    <div class="col-md-3">
    <form action="{{url('admin')}}" name="cari" method="GET">
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
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Admin</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalAdmin">
        Tambah Admin
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Avatar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($admin as $m)
          <?php $no++ ;?>
          <tr>
            <td>{{ $no }}</td>
            <td>{{$m->username}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td><img src="{{asset($m->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail myImg"></td>
            <td>
                <a href="#" name="admin" style="color:white" class="badge bg-info editAdmin" id="{{$m->id}}" data-toggle="modal" data-target="#modalAdminEdit">Edit</a>
                <a href="#" class="changePassword badge bg-success" style="color:white" data-toggle="modal" data-target="#modalChangePassword" data-id="{{$m->id}}" >Ganti Password</a>
                <a href="#" name="admin" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Admin-->
<div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('admin')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username"  placeholder="Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email"  placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control" name="telp"  placeholder="Telp" required>
        </div>
        <div class="form-group" >
            <label>Password</label><br>
            <small style="color:red">*min 6 Karakter</small>
            <input type="password" class="form-control" name="password"  placeholder="Password" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation"  placeholder="" required>
        </div>
        <div class="form-group" id="avatar">
            <label>Avatar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control" name="avatar">
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
</div>

@endsection
@section('js')
<script>
      $('table tbody').on( 'click', '.editAdmin',function (e) {
      var id = $(this).attr('id');
      var method = $(this).attr('name');
      var url = "{{url('admin')}}/"+id;
      $.ajax({
              type:"get",
              url:"{{url('admin')}}/"+id+"/edit",
              success:function(data){
                $('.form-admin').attr('action', url)
                $('.form-admin #username').val(data.username)
                $('.form-admin #email').val(data.email)
                $('.form-admin #telp').val(data.telp)
                $(".form-admin .image").attr('src', "{{asset('/')}}"+ data.avatar)
              },
              error : function(data){
                console.log(data.responseText)
              }
            });
    });
  </script>
@endsection