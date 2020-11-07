@extends('layouts.app')
@section('title')
Bidang Hukum
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Bidang Hukum</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Bidang Hukum</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalService">
        Tambah Bidang Hukum
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($service as $m)
          <tr>
          <td>{{ $loop->iteration }}</td>
            <td>{{$m->nama}}</td>
            <td><img src="{{asset($m->gambar)}}" alt="Gambar" width="200px" class="img-thumbnail"></td>
            <td width="30%">{{$m->deskripsi}}</td>
            <td>{{($m->status == true)?'Aktif':'Tidak Aktif'}}</td>
            <td>
                <a href="#" name="service/status/" style="color:white" class="activation badge bg-{{($m->status == true)?'success':'danger'}}" id="{{$m->id}}" value="{{$m->status}}">{{($m->status == true)?'Aktif':'Tidak Aktif'}}</a>
                <a href="#" name="service" style="color:white" class="badge bg-info editService" id="{{$m->id}}" data-toggle="modal" data-target="#modalServiceEdit">Edit</a>
                <!-- <a href="#" name="service" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        {{$service->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Servis</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('service')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-service" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-service" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-service" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Servis</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('kategori')}}" method="post" enctype="multipart/form-data" class='form-service'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="nama" class="form-control form-control-service" name="nama" id="nama" placeholder="Nama" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-service" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-service" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
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
  // $('.editService').on('click', function(){
    $('table tbody').on('click', '.editService', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    // console.log(data);
    var url = "{{ url('service')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/service/" + id + "/edit",
            success:function(data){
              $('.form-service').attr( 'action', url)
              $('.form-service #nama').val(data.nama)
              $('.form-service #deskripsi').val(data.deskripsi)
              $(".form-service .image").attr('src', "{{asset('/')}}"+ data.gambar )
              $('.form-service #status').val(data.status);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>


@endsection