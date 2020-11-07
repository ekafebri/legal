@extends('layouts.app')
@section('title')
Artikel
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Artikel</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Artikel</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama User</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Mode</th>
            <th>Tanggal Rilis</th>
            <th>Sumber</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($artikel as $m)
          <tr>
          <td>{{ $loop->iteration }}</td>
            <td>{{$m->user->nama_lengkap}}</td>
            <td>{{$m->judul}}</td>
            <td><img src="{{asset($m->image)}}" alt="image" width="200px" class="img-thumbnail myImg"></td>
            <td>{{$m->mode}}</td>
            <td>{{$m->release_date}}</td>
            <td>{{$m->sumber}}</td>
            <td>
                <a href="#" name="artikel" style="color:white" class="badge bg-info editArtikel" id="{{$m->id}}" data-toggle="modal" data-target="#modalArtikelEdit">Edit</a>
                <a href="{{request()->url('artikel')}}/{{$m->id}}" name="artikel" style="color:white" class="badge bg-success">Detail</a>
                <a href="#" name="artikel" class="delete badge btn btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        {{$artikel->links()}}
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')


<!-- Modal Artikel Edit-->
<div class="modal fade" id="modalArtikelEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('artikel')}}" method="post" enctype="multipart/form-data" class='form-artikel'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-artikel" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Konten</label>
            <input type="text" class="form-control form-control-artikel" name="content" id="content" placeholder="Konten" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-artikel" name="gambar" id="gambar">
        </div>
        <div class="form-group">
            <label>Tanggal Rilis</label>
            <input type="date" class="form-control form-control-artikel" name="release_date" id="release_date" placeholder="Tanggal Rilis" required>
        </div>
        <div class="form-group">
            <label>Sumber</label>
            <input type="text" class="form-control form-control-artikel" name="sumber" id="sumber" placeholder="Sumber" required>
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
    $('table tbody').on('click', '.editArtikel', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    console.log(method);
    var url = "{{ url('artikel')}}/"+id;
    $.ajax({
            type:"get",
            url:"{{url('')}}/" + method + '/' + id + "/edit",
            success:function(data){
              $('.form-artikel').attr( 'action', url)
              $('.form-artikel #user_id').val(data.user_id)
              $('.form-artikel #judul').val(data.judul)
              $('.form-artikel #content').val(data.content)
              $(".form-artikel .image").attr('src', "{{asset('/')}}"+ data.image )
              $('.form-artikel #mode').val(data.mode)
              $('.form-artikel #release_date').val(data.release_date)
              $('.form-artikel #sumber').val(data.sumber);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>


@endsection