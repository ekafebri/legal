@extends('layouts.app')
@section('title')
Service
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Service</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Client</h6>
    <a href="#" class="btn btn-info" style="float:right;display:inline"  data-toggle="modal" data-target="#modalAdmin">
        Tambah Service
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($service as $m)
          <tr>
            <td>{{$m->username}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td>{{$m->role}}</td>
            <td><img src="{{asset($m->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail"></td>
            <td>
                <a href="#" name="service" style="color:green" id="{{$m->id}}" data-toggle="modal" data-target="#modalServiceEdit" class="editService">Edit</a>
                <a href="#" name="service" class="delete" style="color:red" id="{{$m->id}}" >Delete</a>
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
<!-- Modal Service-->
<div class="modal fade" id="modalService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Service</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('service')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-user" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="number" class="form-control form-control-user" name="status" id="status" placeholder="Status" required>
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
<!-- Modal Service Edit-->
<div class="modal fade" id="modalServiceEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('service')}}" method="post" enctype="multipart/form-data" class='form-service'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-user" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="number" class="form-control form-control-user" name="status" id="status" placeholder="Status" required>
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
  $('.editService').on('click', function(){
    var id = $(this).attr('id')
    var method = $(this).attr('name')
    $.ajax({
            type:"get",
            url:"{{ url('')}}/"+ method + '/' + id + '/edit',
            success:function(data){
              console.log(data)
              var url = "{{url('service')}}/"+id
              $('.form-service').attr( 'action', url)
              $('.form-service #username').val(data.username)
              $('.form-service #email').val(data.email)
              $('.form-service #telp').val(data.telp)
              $(".form-service .image").attr('src', "{{asset('/')}}"+ data.avatar );
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection