@extends('layouts.app')
@section('title')
Pendampingan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Pendampingan</h1>
</div>
    <div class="col-md-3">
    <form action="{{url('pendampingan')}}" name="cari" method="GET">
      <div class="row mb-1">
        <div class="input-group">
          <input type="text" name="search" class="form-control col-md-9" placeholder="Cari">
            <span class="input-group-prepend">
              <button type="submit" class="btn btn-danger">Cari</button>
            </span>
        </div>
      </div>
      </form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pendampingan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="20">No</th>
            <th>Nama Client</th>
            <th>Nama Lawyer</th>
            <th width="250">Jenis Pendampingan</th>
            <th width="350">Tanggal Pengajuan</th>
            <th width="350">Status</th>
            <th width="50">Aksi</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($pendampingan as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->client->nama_lengkap}}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{$m->option}}</td>
            <td>{{date('d-M-Y H:i:s', strtotime($m->created_at))}}</td>
            <td>
                @if($m->status == 'WAITING')
                Menunggu Konfirmasi
                @elseif($m->status == 'WAITING_PAYMENT')
                Menunggu Pembayaran
                @elseif($m->status == 'PAID')
                Sudah Bayar
                @elseif($m->status == 'TOLAK')
                Ditolak
                @elseif($m->status == 'CONFIRM')
                Terkonfirmasi
                @elseif($m->status == 'FINISH')
                Selesai
                @endif
            </td>
            <td>
                <a href="{{request()->url('pendampingan')}}/{{$m->id}}" name="vidcon" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$pendampingan->links()}}
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')

<!-- Modal Pendampingan-->
<div class="modal fade" id="modalPendampingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pendampingan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('pendampingan')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Client ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="client_id" id="client_id" placeholder="Client ID" required>
        </div>
        <div class="form-group">
            <label>Konsultasi ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="konsultasi_id" id="konsultasi_id" placeholder="Konsultasi Id" required>
        </div>
        <div class="form-group">
            <label>Lawyer ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="lawyer_id" id="lawyer_id" placeholder="Lawyer Id" required>
        </div>
        <div class="form-group">
            <label>Option</label>
            <input type="nama" class="form-control form-control-pendampingan" name="option" id="option" placeholder="Option" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-pendampingan" name="status" id="status" placeholder="Status" required>
        </div>
        <div class="form-group">
            <label>Alasan Tolak</label>
            <input type="nama" class="form-control form-control-pendampingan" name="alasan_tolak" id="alasan_tolak" placeholder="Alasan Tolak" required>
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

<!-- Modal Pendampingan Edit-->
<div class="modal fade" id="modalPendampinganEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pendampingan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('pendampingan')}}" method="post" enctype="multipart/form-data" class='form-pendampingan'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Client ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="client_id" id="client_id" placeholder="Client ID" required>
        </div>
        <div class="form-group">
            <label>Konsultasi ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="konsultasi_id" id="konsultasi_id" placeholder="Konsultasi Id" required>
        </div>
        <div class="form-group">
            <label>Lawyer ID</label>
            <input type="nama" class="form-control form-control-pendampingan" name="lawyer_id" id="lawyer_id" placeholder="Lawyer Id" required>
        </div>
        <div class="form-group">
            <label>Option</label>
            <input type="nama" class="form-control form-control-pendampingan" name="option" id="option" placeholder="Option" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-pendampingan" name="status" id="status" placeholder="Status" required>
        </div>
        <div class="form-group">
            <label>Alasan Tolak</label>
            <input type="nama" class="form-control form-control-pendampingan" name="alasan_tolak" id="alasan_tolak" placeholder="Alasan Tolak" required>
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
  // $('.editPendampingan').on('click', function(){
    $('table tbody').on( 'click', '.editPendampingan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('pendampingan')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/pendampingan/" + id + "/edit",
            success:function(data){
              $('.form-pendampingan').attr( 'action', url)
              $('.form-pendampingan #client_id').val(data.client_id)
              $('.form-pendampingan #konsultasi_id').val(data.konsultasi_id)
              $('.form-pendampingan #lawyer_id').val(data.lawyer_id)
              $('.form-pendampingan #option').val(data.option)
              $('.form-pendampingan #status').val(data.status)
              $('.form-pendampingan #alasan_tolak').val(data.alasan_tolak);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection