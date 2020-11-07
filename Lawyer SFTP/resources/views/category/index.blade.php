@extends('layouts.app')
@section('title')
Kategori
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Category</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Category</h6>
    <a href="#" class="btn btn-info" style="float:right;display:inline"  data-toggle="modal" data-target="#modalKategori">
        Tambah Category
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
          @foreach($kategori as $m)
          <tr>
            <td>{{$m->nama}}</td>
            <td><img src="{{asset($m->avatar)}}" alt="Avatar" width="200px" class="img-thumbnail"></td>
            <td>{{$m->status}}</td>
            <td>
                <a href="#" name="kategori" style="color:green" id="{{$m->id}}" data-toggle="modal" data-target="#modalKategoriEdit" class="editKategori">Edit</a>
                <a href="#" name="kategori" class="delete" style="color:red" id="{{$m->id}}" >Delete</a>
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
<!-- Modal Kategori-->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('kategori')}}" method="post" enctype="multipart/form-data" class='form'>
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
<!-- Modal Kategori Edit-->
<div class="modal fade" id="modalKategoriEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('Kategori')}}" method="post" enctype="multipart/form-data" class='form-Kategori'>
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
  $('.editKategori').on('click', function(){
    var id = $(this).attr('id')
    var method = $(this).attr('name')
    $.ajax({
            type:"get",
            url:"{{ url('')}}/"+ method + '/' + id + '/edit',
            success:function(data){
              console.log(data)
              var url = "{{url('Kategori')}}/"+id
              $('.form-Kategori').attr( 'action', url)
              $('.form-Kategori #nama').val(data.nama)
              $(".form-Kategori .image").attr('src', "{{asset('/')}}"+ data.avatar )
              $('.form-Kategori #status').val(data.status);
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection