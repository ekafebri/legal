@extends('layouts.app')
@section('title')
Konfirmasi Membership
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Konfirmasi Membership</h1>
<p class="mb-4">
Konfirmasi dilakukan secara otomatis oleh sistem
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Konfirmasi Membership</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Status Akun</th>
            <th>Status Verifikasi</th>
            <th>Tanggal Pengajuan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($pengajuan as $m)
          <?php $no++ ;?>
          <tr>
            <td>{{ $no }}</td>
            <td>{{$m->user->nama_lengkap}}</td>
            <td>{{$m->user->email}}</td>
            <td>{{$m->user->telp}}</td>
            <td>{{$m->user->alamat}}</td>
            <td>
                        @if($m->status == 'WAITING')
                        Menungu
                        @elseif($m->status == 'WAITING_PAYMENT')
                        Menunggu Pembayaran
                        @elseif($m->status == 'PAID')
                        Pembayaran Berhasil
                        @endif
            </td>
            <td>
              @if($m->user->verified == true)
              Verified
              @else
              Belum Verified
              @endif
            </td>
            <td>{{$m->created_at}}</td>
            <td>
            <a href="{{url('pengajuan-lawyer/detail/'.$m->id)}}" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$pengajuan->links()}}
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
@endsection