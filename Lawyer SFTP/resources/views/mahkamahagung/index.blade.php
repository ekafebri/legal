@extends('layouts.app')
@section('title')
Mahkamah Agung
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Mahkamah Agung</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Mahkamah Agung</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalMahkamahAgung">
        Tambah Mahkamah Agung
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
            <th>Link</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($mahkamahagung as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->judul}}</td>
            <td><img src="{{asset($m->gambar)}}" alt="Gambar" width="200px" class="img-thumbnail myImg"></td>
            <td>{{$m->link}}</td>
            <td>
                <a href="#" name="mahkamahagung" style="color:white" class="badge bg-info editMahkamahAgung" id="{{$m->id}}" data-toggle="modal" data-target="#modalMahkamahAgungEdit">Edit</a>
                <a href="#" name="mahkamahagung" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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

<!-- Modal events-->
<div class="modal fade" id="modalMahkamahAgung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mahkamah Agung</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('mahkamahagung')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-mahkamahagung" name="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-mahkamahagung" name="image">
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control form-control-mahkamahagung" name="link" placeholder="Link" required>
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

<!-- Modal Edit Events-->
<div class="modal fade" id="modalMahkamahAgungEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Mahkamah Agung</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('mahkamahagung')}}" method="post" enctype="multipart/form-data" class='form-mahkamahagung'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-mahkamahagung" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-mahkamahagung" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control form-control-mahkamahagung" name="link" id="link" placeholder="Link" required>
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
  // $('.editEvent').on('click', function(){
    $('table tbody').on('click', '.editMahkamahAgung', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    // console.log(data);
    var url = "{{ url('mahkamahagung')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/mahkamahagung/" + id + "/edit",
            success:function(data){
              $('.form-mahkamahagung').attr( 'action', url)
              $('.form-mahkamahagung #judul').val(data.judul)
              $(".form-mahkamahagung .image").attr('src', "{{asset('/')}}"+ data.gambar )
              $('.form-mahkamahagung #link').val(data.link);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection