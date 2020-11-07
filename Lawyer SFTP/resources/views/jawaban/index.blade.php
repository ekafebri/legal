@extends('layouts.app')
@section('title')
Jawaban
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Jawaban</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Jawaban</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalJawaban">
        Tambah Jawaban
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Judul Pertanyaan</th>
            <th>Judul Jawaban</th>
            <th>Deskripsi Jawaban</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Judul Pertanyaan</th>
            <th>Judul Jawaban</th>
            <th>Deskripsi Jawaban</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          @foreach($jawaban as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->user->nama_lengkap}}</td>
            <td>{{$m->pertanyaan->judul_pertanyaan}}</td>
            <td>{{$m->judul_jawaban}}</td>
            <td>{{$m->deskripsi_jawaban}}</td>
            <td>
                <a href="#" name="jawaban" style="color:white" class="badge btn-info editJawaban" id="{{$m->id}}" data-toggle="modal" data-target="#modalJawabanEdit">Edit</a>
                <a href="#" name="jawaban" class="delete badge btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Jawaban-->
<div class="modal fade" id="modalJawaban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jawaban</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('jawaban')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-jawaban" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Pertanyaan ID</label>
            <input type="text" class="form-control form-control-jawaban" name="pertanyaan_id" id="pertanyaan_id" placeholder="Pertanyaan ID" required>
        </div>
        <div class="form-group">
            <label>Judul Jawaban</label>
            <input type="text" class="form-control form-control-jawaban" name="judul_jawaban" id="judul_jawaban" placeholder="Judul Jawaban" required>
        </div>
        <div class="form-group">
            <label>Deskripsi Jawaban</label>
            <input type="text" class="form-control form-control-jawaban" name="deskripsi_jawaban" id="deskripsi_jawaban" placeholder="Deskiripsi Jawaban" required>
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

<!-- Modal Jawaban Edit-->
<div class="modal fade" id="modalJawabanEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jawaban</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('jawaban')}}" method="post" enctype="multipart/form-data" class='form-jawaban'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-jawaban" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Pertanyaan ID</label>
            <input type="text" class="form-control form-control-jawaban" name="pertanyaan_id" id="pertanyaan_id" placeholder="Pertanyaan ID" required>
        </div>
        <div class="form-group">
            <label>Judul Jawaban</label>
            <input type="text" class="form-control form-control-jawaban" name="judul_jawaban" id="judul_jawaban" placeholder="Judul Jawaban" required>
        </div>
        <div class="form-group">
            <label>Deskripsi Jawaban</label>
            <input type="text" class="form-control form-control-jawaban" name="deskripsi_jawaban" id="deskripsi_jawaban" placeholder="Deskiripsi Jawaban" required>
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
  // $('.editJawaban').on('click', function(){
    $('table tbody').on( 'click', '.editJawaban', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('jawaban')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/jawaban/" + id + "/edit",
            success:function(data){
              $('.form-jawaban').attr( 'action', url)
              $('.form-jawaban #user_id').val(data.user_id)
              $('.form-jawaban #pertanyaan_id').val(data.pertanyaan_id)
              $('.form-jawaban #judul_jawaban').val(data.judul_jawaban)
              $('.form-jawaban #deskripsi_jawaban').val(data.deskripsi_jawaban);
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