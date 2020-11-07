@extends('layouts.app')
@section('title')
{{request()->is('user-client*')?'Client':'Lawyer'}}
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar {{request()->is('user-client*')?'Client':'Lawyer'}}</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar {{request()->is('user-client*')?'Client':'Lawyer'}}</h6>
    <!-- <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalUser">
        Tambah User
    </a> -->
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Tipe Akun</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;?>
          @foreach($opinion as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->nama_lengkap}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td>{{$m->alamat}}</td>
            <td>
              @if($m->jenis_kelamin == 'PR')
              Perempuan
              @else
              Laki-laki
              @endif
            </td>
            <td>{{$m->type}}</td>
            <td>
              @if($m->status == true)
              AKTIF
              @else
              TIDAK AKTIF
              @endif
            </td>
            <td>
                <a href="#" name="{{request()->is('user-client*')?'user-client/status/':'user-lawyer/status/'}}" style="color:white" class="activation badge bg-{{($m->status == true)?'success':'danger'}}" id="{{$m->id}}">{{($m->status == true)?'Aktif':'Tidak A ktif'}}</a>
                <a href="{{request()->is('user-client*')?url('user-client'):url('user-lawyer')}}/{{$m->id}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                <a href="#" name="user" style="color:white" class="badge bg-info editUser" id="{{$m->id}}" data-toggle="modal" data-target="#modalUserEdit">Edit</a>
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

<!-- Modal User Edit-->
<div class="modal fade" id="modalUserEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('user')}}" method="post" enctype="multipart/form-data" class='form-user'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" required>
        </div>
        <div class="form-group">
            <label>Telpon</label>
            <input type="number" class="form-control form-control-user" name="telp" id="telp" placeholder="Telp" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control form-control-user" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group" id="avatar">
            <label>Avatar</label><br>
            <img src="" width="200px" alt="" class="img-thumbnail image"><br>
            <small style="color:red">*max upload 2MB</small><br>
            <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
            <input type="file" class="form-control form-control-user" name="image" id="image">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" class="form-control form-control-user" name="status" id="status" placeholder="Status" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <input type="text" class="form-control form-control-user" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" required>
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
  // $('.editUser').on('click', function(){
    $('table tbody').on( 'click', '.editUser', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('user')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/user/" + id + "/edit",
            success:function(data){
              $('.form-user').attr( 'action', url)
              $('.form-user #email').val(data.email)
              $('.form-user #telp').val(data.telp)
              $('.form-user #nama_lengkap').val(data.nama_lengkap)
              $(".form-user .image").attr('src', "{{asset('/')}}"+ data.avatar )
              $('.form-user #alamat').val(data.alamat)
              $('.form-user #status').val(data.status)
              $('.form-user #jenis_kelamin').val(data.jenis_kelamin);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection