@extends('layouts.app')
@section('title')
Report
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Report</h1>
</div>
    <div class="col-md-3">
    <form action="{{url('report')}}" name="cari" method="GET">
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
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Report</h6>
    
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Judul Report</th>
            <th>Penjelasan</th>
            <th>Client</th>
            <th>Lawyer</th>
            <th>Tanggal Pengiriman</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        
          @foreach($report as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->judul_report}}</td>
            <td>{{$m->penjelasan}}</td>
            <td>{{$m->client->nama_lengkap}}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{date('d-M-Y H:i:s', strtotime($m->created_at))}}</td>
            <td>
            <a href="{{request()->url('report')}}/{{$m->id}}" name="report" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$report->links()}}
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