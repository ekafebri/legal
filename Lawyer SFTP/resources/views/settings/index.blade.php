@extends('layouts.app')
@section('title')
Pengaturan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Pengaturan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pengaturan</h6>
    <!-- <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalPengaturan">
        Tambah Pengaturan
    </a> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($setting as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->name}}</td>
            @if($m->id == 3 || $m->id == 5)
            <td>{{$m->value}} Hari</td>
            @else
            <td>@rupiah($m->value)</td>
            @endif
            <td>{{$m->deskripsi}}</td>
            <td>
                <a href="#" name="settings" style="color:white" class="badge bg-info editPengaturan" id="{{$m->id}}" data-toggle="modal" data-target="#modalFaqEdit">Edit</a>
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
<!-- Modal Faq-->

<div class="modal fade" id="modalPengaturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengaturan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('settings')}}" method="post" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama Pengaturan" required>
        </div>
        <div class="form-group">
            <label>Value</label>
            <input type="text" class="form-control" name="value" placeholder="Nilai" required>
        </div>
        <div class="form-group">
            <label>Jawaban</label>
            <textarea row="5" class="form-control" name="deskripsi" placeholder="Deskripsi" required></textarea>
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

<!-- Modal Edit Faq-->
<div class="modal fade" id="modalFaqEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pengaturan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('settings')}}" method="post" class='form-pengaturan'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="text" class="form-control" name="value" id="value" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea row="5" class="form-control" name="deskripsi" id="deskripsi" required></textarea>
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
    $('table tbody').on('click', '.editPengaturan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    var url = "{{ url('settings')}}/"+id;
    $.ajax({
            type:"get",
            url:"{{url('')}}/"+method+'/'+ id + "/edit",
            success:function(data){
              $('.form-pengaturan').attr('action', url)
              $('.form-pengaturan #name').val(data.name)
              $('.form-pengaturan #value').val(data.value);
              $('.form-pengaturan #deskripsi').val(data.deskripsi);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection