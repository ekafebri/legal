@extends('layouts.app')
@section('title')
Peraturan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Peraturan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Peraturan</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalPeraturan">
        Tambah Peraturan
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama Peraturan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($peraturan as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->nama_peraturan}}</td>
            <td>
            @if($m->status == true)
            Aktif
            @else
            Tidak Aktif
            @endif
            </td>
            <td>
                <a href="#" name="peraturan/status/" style="color:white" class="activation badge bg-{{($m->status == true)?'success':'danger'}}" id="{{$m->id}}" value="{{$m->status}}">{{($m->status == true)?'Aktif':'Tidak Aktif'}}</a>
                <a href="#" name="peraturan" style="color:white" class="badge btn-info editPeraturan" id="{{$m->id}}" data-toggle="modal" data-target="#modalPeraturanEdit">Edit</a>
                <a href="{{request()->url('peraturan')}}/{{$m->id}}" name="peraturan" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$peraturan->links()}}
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')
<!-- Modal Peraturan-->
<div class="modal fade" id="modalPeraturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peraturan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('peraturan')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama Peraturan</label>
            <input type="nama" class="form-control form-control-peraturan" name="nama_peraturan" placeholder="Nama Peraturan" required>
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

<div class="modal fade" id="modalPeraturanEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Peraturan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('peraturan')}}" method="post" enctype="multipart/form-data" class='form-peraturan'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama Peraturan</label>
            <input type="nama" class="form-control form-control-peraturan" name="nama_peraturan" id="nama_peraturan" placeholder="Nama Peraturan" required>
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
  //$('.editPeraturan').on('click', function(){
    $('table tbody').on('click', '.editPeraturan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('peraturan')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/peraturan/"+ id + "/edit",
            success:function(data){
              $('.form-peraturan').attr('action', url)
              $('.form-peraturan #nama_peraturan').val(data.nama_peraturan)
              $('.form-peraturan #status').val(data.status);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection