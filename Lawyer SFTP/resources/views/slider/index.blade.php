@extends('layouts.app')
@section('title')
Slider
@endsection
@section('css')
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Slider {{(request()->is('slider-lawyer*')?'Lawyer':(request()->is('slider-iklan*')?'Iklan':'Client'))}}</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Slider {{(request()->is('slider-lawyer*')?'Lawyer':(request()->is('slider-iklan*')?'Iklan':'Client'))}}</h6>
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
        <tbody>
          <?php $no = 0;?>
          @foreach($slider as $m)
          <?php $no++ ;?>
          <tr>
            <td>{{ $no }}</td>
            <td>{{$m->judul}}</td>
            <td>{{$m->deskripsi}}</td>
            <td><img src="{{asset($m->image)}}" alt="image" width="200px" class="img-thumbnail myImg"></td>
            <td>
              @if($m->status == true)
              Aktif
              @else
              Tidak Aktif
              @endif
            </td>
            <td>
                <a href="#" name="slider/status/" style="color:white" class="activation badge bg-{{($m->status == true)?'success':'danger'}}" id="{{$m->id}}" value="{{$m->status}}">{{($m->status == true)?'Aktif':'Tidak Aktif'}}</a>
                <a href="#" name="{{(request()->is('slider-lawyer*')?'slider-lawyer':(request()->is('slider-iklan*')?'slider-iklan':'slider-client'))}}" style="color:white" class="badge bg-info editSlider" id="{{$m->id}}" data-toggle="modal" data-target="#modalSliderEdit">Edit</a>
                <a href="#" name="{{(request()->is('slider-lawyer*')?'slider-lawyer':(request()->is('slider-iklan*')?'slider-iklan':'slider-client'))}}" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Slider {{(request()->is('slider-lawyer*')?'Lawyer':(request()->is('slider-iklan*')?'Iklan':'Client'))}}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{(request()->is('slider-lawyer*')?url('slider-lawyer'):(request()->is('slider-iklan*')?url('slider-iklan'):url('slider-client')))}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group">
            <label>Gambar</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control" name="gambar" required>
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
        <form action="" method="post" enctype="multipart/form-data" class='form-slider'>
        @csrf
        @method('put')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group" id="gambar">
            <label>Gambar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-slider" name="gambar" id="gambar">
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
    $('table tbody').on('click', '.editSlider', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    var url = "{{(request()->is('slider-lawyer*')?url('slider-lawyer'):(request()->is('slider-iklan*')?url('slider-iklan'):url('slider-client')))}}/"+id;
    console.log(url)
    $.ajax({
            type:"get",
            url: "{{url('')}}/"+method+'/'+ id,
            success:function(data){
              $('.form-slider').attr('action', url)
              $('.form-slider #deskripsi').val(data.deskripsi)
              $(".form-slider .image").attr('src', "{{asset('/')}}"+ data.image)
            },
            error : function(data){
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection