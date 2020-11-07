@extends('layouts.app')
@section('title')
Pembayaran
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Pembayaran</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pembayaran</h6>
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
            <th>Kode Pembayaran</th>
            <th>Nominal</th>
            <th>Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pembayaran as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->kode_pembayaran}}</td>
            <td>@rupiah($m->amount)</td>
            <td>
            @if($m->type == 'VICON')
            Pengajuan Video Conference
            @elseif($m->type == 'PENDAMPINGAN')
            Pengajuan Pendampingan
            @elseif($m->type == 'PERTEMUAN')
            Pengajuan Pertemuan
            @elseif($m->type == 'TERTULIS')
            Pengajuan Layanan Tertulis
            @elseif($m->type == 'LIVE_CHAT')
            Layanan Live Chat
            @endif
            </td>
            <td>{{$m->status}}</td>
            <td>
                <!--@if(request()->is('pembayaran-berhasil*'))
                <a href="{{request()->url('pembayaran-berhasil')}}/{{$m->id}}" style="color:white" class="badge bg-success">Detail</a>
                @elseif(request()->is('pembayaran-pending*'))
                <a href="{{request()->url('pembayaran-pending')}}/{{$m->id}}" style="color:white" class="badge bg-success">Detail</a>
                @elseif(request()->is('pembayaran-expired*'))
                <a href="{{request()->url('pembayaran-expired')}}/{{$m->id}}" style="color:white" class="badge bg-success">Detail</a>
                @endif-->
                <a href="{{request()->is('pembayaran-berhasil*')?url('pembayaran-berhasil'):(request()->is('pembayaran-pending*')?url('pembayaran-pending'):url('pembayaran-expired'))}}/{{$m->id}}" name="user" style="color:white" class="badge bg-success">Detail</a>

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