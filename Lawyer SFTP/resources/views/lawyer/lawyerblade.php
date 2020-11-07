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
<h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Admin</h6>
    <a href="#" class="btn btn-info" style="float:right;display:inline"  data-toggle="modal" data-target="#modalAdmin">
        Tambah Admin
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($admin as $m)
          <tr>
            <td>{{$m->username}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td>{{$m->role}}</td>
            <td><img src="{{asset($m->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail"></td>
            <td>
                <a href="#" name="admin" style="color:green" id="{{$m->id}}" data-toggle="modal" data-target="#modalAdminEdit" class="editAdmin">Edit</a>
                <a href="#" name="admin" class="delete" style="color:red" id="{{$m->id}}" >Delete</a>
                <a href="#" class="changePassword" style="color:black" data-toggle="modal" data-target="#modalChangePassword" data-id="{{$m->id}}" >Change Password</a>
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
            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="Telp" required>
        </div>
        <div class="form-group" id="password">
            <label>Password</label><br>
            <small style="color:red">*min 6 Karakter</small>
            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group" id="password-confirmation">
            <label>Confirm Password</label>
            <input type="password" class="form-control form-control-user" name="password_confirmation" id="password" placeholder="" required>
        </div>
        <div class="form-group" id="avatar">
            <label>Avatar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-user" name="image" id="image">
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
<!-- Modal Admin Edit-->
<div class="modal fade" id="modalAdminEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('admin')}}" method="post" enctype="multipart/form-data" class='form-admin'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="Telp" required>
        </div>
        <div class="form-group" id="avatar">
            <label>Avatar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-user" name="image" id="image">
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
  $('.editAdmin').on('click', function(){
    var id = $(this).attr('id')
    var method = $(this).attr('name')
    $.ajax({
            type:"get",
            url:"{{ url('')}}/"+ method + '/' + id + '/edit',
            success:function(data){
              console.log(data)
              var url = "{{url('admin')}}/"+id
              $('.form-admin').attr( 'action', url)
              $('.form-admin #username').val(data.username)
              $('.form-admin #email').val(data.email)
              $('.form-admin #telp').val(data.telp)
              $(".form-admin .image").attr('src', "{{asset('/')}}"+ data.avatar );
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection