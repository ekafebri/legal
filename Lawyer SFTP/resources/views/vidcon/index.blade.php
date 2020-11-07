@extends('layouts.app')
@section('title')
Video Conference
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Video Conference</h1>
</div>
    <div class="col-md-3">
    <form action="{{url('vidcon')}}" name="cari" method="GET">
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
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Video Conference</h6>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Durasi</th>
            <th>Tanggal Video Conference</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($vicon as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->nama}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->durasi}} Jam</td>
            <td>{{date('d-M-Y H:i:s', strtotime($m->tgl_pengajuan))}}</td>
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
                @endif</td>
            <td>
                <a href="{{request()->url('vidcon')}}/{{$m->id}}" name="vidcon" style="color:white" class="badge bg-success">Detail</a>
                @if($m->status == 'PAID' && $m->link == '')
                <a href="#" name="vidcon" style="color:white" class="badge bg-info editVidcon" id="{{$m->id}}" data-toggle="modal" data-target="#modalTambahLink">Tambah Link</a>
                @elseif($m->status == 'PAID' || $m->status == 'FINISH')
                <a href="#" name="vidcon" style="color:white" class="badge bg-info editVidcon" id="{{$m->id}}" data-toggle="modal" data-target="#modalTambahLink">Edit Link</a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$vicon->links()}}
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')

<!-- Modal events
<div class="modal fade" id="modalTambahLinks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Link</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('vidcon')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control form-control-vidcon" name="link" placeholder="Link" required>
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
</div>-->

<!-- Modal Edit Events-->
<div class="modal fade" id="modalTambahLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Link Vicon</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('vidcon')}}" method="post" enctype="multipart/form-data" class='form-vidcon'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Link</label>
            <input type="text" class="form-control form-control-vidcon" name="link" id="link" placeholder="Link" required>
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
    $('table tbody').on('click', '.editVidcon', function(e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    // console.log(data);
    var url = "{{ url('vidcon')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/vidcon/" + id + "/edit",
            success:function(data){
              $('.form-vidcon').attr( 'action', url)
              $('.form-vidcon #link').val(data.link);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection