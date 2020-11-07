@extends('layouts.app')
@section('title')
{{request()->is('konsultasi-ongoing*')?'Konsultasi Berlangsung':(request()->is('konsultasi-finish*')?'Konsultasi Selesai':'History Konsultasi')}}
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar {{request()->is('konsultasi-ongoing*')?'Konsultasi Berlangsung':(request()->is('konsultasi-finish*')?'Konsultasi Selesai':'History Konsultasi')}}</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Konsultasi</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lawyer</th>
            <th>Nama Client</th>
            <th>Bidang Hukum</th>
            <th>Tanggal Konsultasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($konsultasi as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{$m->client->nama_lengkap}}</td>
            @if($m->lawyer->role == 'NOTARIS')
              <td>{{$m->legalitas->nama}}</td>
            @else
              @if($m->service_id == 0)
              <td>Probono</td>
              @else
              <td>{{$m->service->nama}}</td>
              @endif
            @endif
            <td>{{date('d-M-Y H:i:s', strtotime($m->created_at))}}</td>
            <td>
                <a href="{{request()->is('konsultasi-ongoing*')?url('konsultasi-ongoing'):(request()->is('konsultasi-finish*')?url('konsultasi-finish'):url('konsultasi-history'))}}/{{$m->id}}" name="konsultasi" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$konsultasi->links()}}
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')
@endsection
@section('js')
<script>
  // $('.editKonsultasi').on('click', function(){
    $('table tbody').on( 'click', '.editKonsultasi', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('konsultasi-history')}}/"+id+"/edit";
    if(method == 'konslutasi-ongoing'){
    var url_form = "{{ url('konslutasi-ongoing')}}/"+id+"";
    }else if(method == 'konsultasi-finish'){
    var url_form = "{{ url('konsultasi-finish')}}/"+id+"";
    }else if(method == 'konsultasi-history'){
    var url_form = "{{ url('konsultasi-history')}}/"+id+"";
    }
    $.ajax({
            type:"get",
            url: url,
            success:function(data){
              $('.form-konsultasi').attr( 'action', url)
              $('.form-konsultasi #client_id').val(data.client_id)
              $('.form-konsultasi #service_id').val(data.service_id)
              $('.form-konsultasi #lawyer_id').val(data.lawyer_id)
              $('.form-konsultasi #rating').val(data.rating)
              $('.form-konsultasi #review').val(data.review)
              $('.form-konsultasi #status').val(data.status)
              $('.form-konsultasi #alasan_tolak').val(data.alasan_tolak);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection