@extends('layouts.app')
@section('title')
Pertemuan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
<h1 class="h3 mb-4 text-gray-800">Daftar Pertemuan</h1>
<p class="mb-4">
Daftar Pengajuan Pertemuan untuk Layanan Pro Bono
</p>
</div>
    <div class="col-md-3">
    <form action="{{request()->url('pertemuan')}}" name="cari" method="GET">
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
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Pertemuan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Client</th>
            <th>Email Client</th>
            <th>Nama Lawyer</th>
            <th>Tanggal Pertemuan</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($pertemuan as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->nama}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->lawyer->nama_lengkap}}</td>
            <td>{{date('d-M-Y H:i:s', strtotime($m->tgl_pengajuan))}}</td>
            <td>
            @if($m->status == 'CONFIRM')
            Terkonfirmasi
            @elseif($m->status == 'WAITING')
            Menunggu Konfirmasi
            @elseif($m->status == 'TOLAK')
            Ditolak
            @endif
            </td>
            <td>
            <a href="{{request()->url('pertemuan')}}/{{$m->id}}" name="pertemuan" style="color:white" class="badge bg-success">Detail</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$pertemuan->links()}}
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
  // $('.editPertanyaan').on('click', function(){
    $('table tbody').on( 'click', '.editPertemuan', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('pertemuan')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/pertemuan/" + id + "/edit",
            success:function(data){
              $('.form-pertemuan').attr( 'action', url)
              $('.form-pertemuan #client_id').val(data.client_id)
              $('.form-pertemuan #konsultasi_id').val(data.konsultasi_id)
              $('.form-pertemuan #lawyer_id').val(data.lawyer_id)
              $('.form-pertemuan #status').val(data.status)
              $('.form-pertemuan #tgl_pengajuan').val(data.tgl_pengajuan)
              $('.form-pertemuan #nama').val(data.nama)
              $('.form-pertemuan #email').val(data.email);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

<script>
    $('table tbody').on( 'click', '.statusaktif',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di Non-Aktifkan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Non-Aktifkan!',
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"http://idaman.org/lawyer/user/" + id,
            data:{_method:'GET'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Status Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
  
  <script>
    $('table tbody').on( 'click', '.statusnon',function (e) {
      //menghentikan link/event agar tidak jalan
        var id = $(this).attr('id')
        var method = $(this).attr('name')
        console.log(method);
        e.preventDefault();
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Status akan di Aktifkan?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Aktifkan!',
        focusCancel: true,
        }).then((confirm,value)=>{
        if(confirm.value === true){
          $.ajax({
            type:"post",
            url:"http://idaman.org/lawyer/user/" + id,
            data:{_method:'GET'},
            success:function(data){
        console.log(data)
              Swal.fire({
                title:"Berhasil",
                text:"Status Berhasil Di ubah",
                type:"success",
                showConfirmButton:false,
                timer: 5000}),
                location.reload()
            },
            error : function(data){
              console.log(data)
              alert('Sorry, Something error :(')
            }
          })
        }
      })
    });
  </script>
@endsection