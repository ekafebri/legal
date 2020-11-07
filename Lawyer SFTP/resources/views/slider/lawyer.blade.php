@extends('layouts.app')
@section('title')
Slider Lawyer
@endsection
@section('css')
@endsection

@section('content')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Slider</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Slider Lawyer</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalSlider">
        Tambah Slider
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Avatar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th width="10px">No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Avatar</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          @foreach($slider as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->judul}}</td>
            <td>{{$m->deskripsi}}</td>
            <td><img src="{{asset($m->image)}}" alt="image" width="200px" class="img-thumbnail"></td>
            <td>
              <?php if($m->status == '1'){ ?>
                <button class="user_status btn btn-success " data-toggle="modal" data-target="modalPopup" uid="<?php echo $m->id; ?>"  ustatus="<?php echo $m->status; ?>" class="toogle-class">Aktif</button>
              <?php }else{ ?>
                <button class="user_status btn btn-warning " data-toggle="modal" data-target="modalPopup" uid="<?php echo $m->id; ?>"  ustatus="<?php echo $m->status; ?>" class="toogle-class">Non Aktif</button>
              <?php } ?></td>
            <td>
                <a href="#" name="slider" style="color:white" class="btn btn-info editSlider" id="{{$m->id}}" data-toggle="modal" data-target="#modalSliderEdit">Edit</a>
                <a href="#" name="slider" class="delete btn btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal slider-->

<div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah slider Lawyer
        </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('slider/lawyer')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-slider" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-slider" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group" id="image">
            <label>Avatar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-slider" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-slider" name="status" id="status" placeholder="Status" required>
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

<!-- Modal Slider Edit-->
<div class="modal fade" id="modalSliderEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit slider</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('slider/lawyer')}}" method="post" enctype="multipart/form-data" class='form-slider'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-slider" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-slider" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group" id="image">
            <label>Avatar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-service" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-slider" name="status" id="status" placeholder="Status" required>
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
  // $('.editSlider').on('click', function(){
    $('table tbody').on('click', '.editSlider', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('slider/lawyer')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/slider/lawyer/"+ id + "/edit",
            success:function(data){
              $('.form-slider').attr( 'action', url)
              $('.form-slider #judul').val(data.judul)
              $('.form-slider #deskripsi').val(data.deskripsi)
              $(".form-slider .image").attr('src', "{{asset('/')}}"+ data.image )
              $('.form-slider #status').val(data.status)
              $('.form-slider #role').val(data.role);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection