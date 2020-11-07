@extends('layouts.app')
@section('title')
Peraturan Detail
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Detail Peraturan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Detail Peraturan</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalPeraturanDetail">
        Tambah Detail Peraturan
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Id Peraturan</th>
            <th>Nomer</th>
            <th>Judul</th>
            <th>Jenis</th>
            <th>Instansi</th>
            <th>Tanggal Ditetapkan</th>
            <th>No BN</th>
            <th>No TBN</th>
            <th>Tanggal diundingkan</th>
            <th>File</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th width="10px">No</th>
            <th>Id Peraturan</th>
            <th>Nomer</th>
            <th>Judul</th>
            <th>Jenis</th>
            <th>Instansi</th>
            <th>Tanggal Ditetapkan</th>
            <th>No BN</th>
            <th>No TBN</th>
            <th>Tanggal diundingkan</th>
            <th>File</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($peraturanDetail as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->peraturan_id}}</td>
            <td>{{$m->nomer}}</td>
            <td>{{$m->judul}}</td>
            <td>{{$m->jenis}}</td>
            <td>{{$m->instansi}}</td>
            <td>{{$m->tgl_ditetapkan}}</td>
            <td>{{$m->no_bn}}</td>
            <td>{{$m->no_tbn}}</td>
            <td>{{$m->tgl_diundingkan}}</td>
            <td>{{$m->file}}</td>
            <td>
                <a href="#" name="peraturan" style="color:white" class="btn btn-info editPeraturanDetail" id="{{$m->id}}" data-toggle="modal" data-target="#editPeraturanDetail">Edit</a>
                <a href="#" name="peraturan" class="delete btn btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Peraturan-->

<div class="modal fade" id="modalPeraturanDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Peraturan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('peraturanDetail')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>ID Peraturan</label>
            <input type="nama" class="form-control form-control-peraturan" name="peraturan_id" id="peraturan_id" placeholder="ID Peraturan" required>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="nama" class="form-control form-control-peraturan" name="nomer" id="nomer" placeholder="Nomor" required>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="nama" class="form-control form-control-peraturan" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <input type="nama" class="form-control form-control-peraturan" name="jenis" id="jenis" placeholder="Jenis" required>
        </div>
        <div class="form-group">
            <label>Instansi</label>
            <input type="nama" class="form-control form-control-peraturan" name="instansi" id="instansi" placeholder="Instansi" required>
        </div>
        <div class="form-group">
            <label>Tanggal Ditetapkan</label>
            <input type="nama" class="form-control form-control-peraturan" name="tgl_ditetapkan" id="tgl_ditetapkan" placeholder="Tanggal Ditetapkan" required>
        </div>
        <div class="form-group">
            <label>No BN</label>
            <input type="nama" class="form-control form-control-peraturan" name="no_bn" id="no_bn" placeholder="No BN" required>
        </div>
        <div class="form-group">
            <label>No TBN</label>
            <input type="nama" class="form-control form-control-peraturan" name="no_tbn" id="no_tbn" placeholder="No TBN" required>
        </div>
        <div class="form-group">
            <label>Tanggal Diundingkan</label>
            <input type="nama" class="form-control form-control-peraturan" name="tgl_diundingkan" id="tgl_diundingkan" placeholder="Tanggal Diundingkan" required>
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="nama" class="form-control form-control-peraturan" name="file" id="file" placeholder="File" required>
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

<div class="modal fade" id="editPeraturanDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Peraturan Detail</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('peraturanDetail')}}" method="post" enctype="multipart/form-data" class='form-peraturan'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>ID Peraturan</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="peraturan_id" id="peraturan_id" placeholder="ID Peraturan" required>
        </div>
        <div class="form-group">
            <label>Nomor</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="nomer" id="nomer" placeholder="Nomor" required>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="judul" id="judul" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Jenis</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="jenis" id="jenis" placeholder="Jenis" required>
        </div>
        <div class="form-group">
            <label>Instansi</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="instansi" id="instansi" placeholder="Instansi" required>
        </div>
        <div class="form-group">
            <label>Tanggal Ditetapkan</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="tgl_ditetapkan" id="tgl_ditetapkan" placeholder="Tanggal Ditetapkan" required>
        </div>
        <div class="form-group">
            <label>No BN</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="no_bn" id="no_bn" placeholder="No BN" required>
        </div>
        <div class="form-group">
            <label>No TBN</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="no_tbn" id="no_tbn" placeholder="No TBN" required>
        </div>
        <div class="form-group">
            <label>Tanggal Diundingkan</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="tgl_diundingkan" id="tgl_diundingkan" placeholder="Tanggal Diundingkan" required>
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="nama" class="form-control form-control-peraturanDetail" name="file" id="file" placeholder="File" required>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </div>
    </form>
    </div>
</div>
</div>

@endsection
@section('js')
<script>
  //$('.editPeraturanDetail').on('click', function(){
    $('table tbody').on('click', '.editPeraturanDetail', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('peraturanDetail')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/peraturanDetail/"+ id + "/edit",
            success:function(data){
              $('.form-peraturanDetail').attr('action', url)
              $('.form-peraturanDetail #peraturan_id').val(data.peraturan_id)
              $('.form-peraturanDetail #nomer').val(data.nomer)
              $('.form-peraturanDetail #judul').val(data.judul)
              $('.form-peraturanDetail #jenis').val(data.jenis)
              $('.form-peraturanDetail #instansi').val(data.instansi)
              $('.form-peraturanDetail #tgl_ditetapkan').val(data.tgl_ditetapkan)
              $('.form-peraturanDetail #no_bn').val(data.no_bn)
              $('.form-peraturanDetail #no_tbn').val(data.no_tbn)
              $('.form-peraturanDetail #tgl_diundingkan').val(data.tgl_diundingkan)
              $('.form-peraturanDetail #file').val(data.file);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection