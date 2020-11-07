@extends('layouts.app')
@section('title')
Penawaran
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Penawaran</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama</th>
            <th>Judul Pertanyaan</th>
            <th>Pertanyaan</th>
            <th>Kategori Layanan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($penawaran as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->user->nama_lengkap}}</td>
            <td>{{$m->judul_pertanyaan}}</td>
            <td>{{$m->pertanyaan}}</td>
            <td>{{$m->kategori_layanan}}</td>
            <td>
            @if($m->status == true)
            Aktif
            @else
            Tidak Aktif
            @endif
            </td>
            <td>
            <a href="{{request()->url('penawaran')}}/{{$m->id}}" name="penawaran" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$penawaran->links()}}
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
</script>

@endsection