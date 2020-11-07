@extends('layouts.app')
@section('title')
User
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar User</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalUser">
        Tambah User
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          @foreach($user as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td>{{$m->nama_lengkap}}</td>
            <td>{{$m->alamat}}</td>
            <td>@if($m->jenis_kelamin == 'PR')
                  Perempuan
                  @else
                  Laki-laki
                  @endif</td>
            <td>
              <?php if($m->status == '1'){ ?>
                <button class="statusaktif btn btn-success " id="{{$m->id}}" data-toggle="modal" data-target="modalPopup" ustatus="<?php echo $m->status; ?>" class="toogle-class">Aktif</button>
              <?php }else{ ?>
                <button class="statusnon btn btn-warning " id="{{$m->id}}" data-toggle="modal" data-target="modalPopup" ustatus="<?php echo $m->status; ?>" class="toogle-class">Non Aktif</button>
              <?php } ?></td>
            <td>
                <a href="{{url('user/'.$m->id)}}" name="user" style="color:white" class="btn btn-success">Detail</a>
                <a href="#" name="user" style="color:white" class="btn btn-info editUser" id="{{$m->id}}" data-toggle="modal" data-target="#modalUserEdit">Edit</a>
                <a href="#" name="user" style="color:white" class="btn btn-danger" style="float:right;display:inline" class="delete" id="{{$m->id}}">Hapus</a>
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
<!-- Modal User-->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('user')}}" method="post" enctype="multipart/form-data" class='form'>
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
            <small style="color:red">*max upload 2MB</small>
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
        <div class="form-group" id="password">
            <label>Password</label><br>
            <small style="color:red">*min 6 Karakter</small>
            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="form-group" id="password-confirmation">
            <label>Confirm Password</label>
            <input type="password" class="form-control form-control-user" name="password_confirmation" id="password" placeholder="" required>
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