@extends('layouts.app')
@section('title')
Layanan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Layanan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Layanan</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalLayanan">
        Tambah Layanan
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Avatar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Avatar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($layanan as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->nama}}</td>
            <td><img src="{{asset($m->image)}}" alt="Avatar" width="200px" class="img-thumbnail"></td>
            <td>
            @if($m->status == true)
            Aktif
            @else
            Tidak Aktif
            @endif
            </td>
            <td>
                <a class="activation btn btn-warning" data-value="{{$m->status}}" id="{{$m->id}}" name="layanan/status/">Test</a>
                <a href="#" name="layanan" style="color:white" class="btn btn-info editLayanan" id="{{$m->id}}" data-toggle="modal" data-target="#modalLayananEdit">Edit</a>
                <a href="#" name="layanan" class="delete btn btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Layanan-->

<div class="modal fade" id="modalLayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('layanan')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-layanan" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Avatar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-layanan" name="image" id="image">
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
</div>

<div class="modal fade" id="modalLayananEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Layanan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('layanan')}}" method="post" enctype="multipart/form-data" class='form-layanan'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-layanan" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Avatar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-layanan" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-layanan" name="status" id="status" placeholder="Status" required>
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
  //$('.editLayanan').on('click', function(){
    $('table tbody').on('click', '.editLayanan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('layanan')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/layanan/"+ id + "/edit",
            success:function(data){
              $('.form-layanan').attr('action', url)
              $('.form-layanan #nama').val(data.nama)
              $(".form-layanan .image").attr('src', "{{asset('/')}}"+ data.image )
              $('.form-layanan #status').val(data.status);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection