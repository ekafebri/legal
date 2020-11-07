@extends('layouts.app')
@section('title')
@if(request()->is('user-client*'))
Client
@elseif(request()->is('user-lawyer*'))
Advokat
@elseif(request()->is('user-notaris*'))
Notaris
@elseif(request()->is('user-kantor-hukum*'))
Kantor Hukum
@elseif(request()->is('user-perusahaan*'))
Perusahaan
@endif
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


<!-- Page Heading -->
<div class="row">
<div class="col-md-9">
@if(request()->is('user-client*'))
<h1 class="h3 mb-4 text-gray-800">Daftar Client</h1>
@elseif(request()->is('user-lawyer*'))
<h1 class="h3 mb-4 text-gray-800">Daftar Advokat</h1>
@elseif(request()->is('user-notaris*'))
<h1 class="h3 mb-4 text-gray-800">Daftar Notaris</h1>
@elseif(request()->is('user-kantor-hukum*'))
<h1 class="h3 mb-4 text-gray-800">Daftar Kantor Hukum</h1>
@elseif(request()->is('user-perusahaan*'))
<h1 class="h3 mb-4 text-gray-800">Daftar Perusahaan</h1>
@endif
</div>
    <div class="col-md-3">
    @if(request()->is('user-client*'))
    <form action="{{url('user-client')}}" name="cari" method="GET">
    @elseif(request()->is('user-lawyer*'))
    <form action="{{url('user-lawyer')}}" name="cari" method="GET">
    @elseif(request()->is('user-notaris*'))
    <form action="{{url('user-notaris')}}" name="cari" method="GET">
    @elseif(request()->is('user-kantor-hukum*'))
    <form action="{{url('user-kantor-hukum')}}" name="cari" method="GET">
    @elseif(request()->is('user-perusahaan*'))
    <form action="{{url('user-perusahaan')}}" name="cari" method="GET">
    @endif
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
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar {{request()->is('user-client*')?'Client':(request()->is('user-lawyer*')?'Lawyer':'Notaris')}}</h6>
    @if(request()->is('user-notaris*'))
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalUser">
        Tambah Notaris
    </a>
    @endif
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
            <th>Tipe Akun</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $m)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$m->nama_lengkap}}</td>
            <td>{{$m->email}}</td>
            <td>{{$m->telp}}</td>
            <td>{{$m->alamat}}</td>
            <td>{{$m->type}}</td>
            <td style="width:30%">
                <a href="#" name="{{request()->is('user-client*')?'user-client/status/':'user-lawyer/status/'}}" style="color:white" class="activation badge bg-{{($m->status == true)?'success':'danger'}}" id="{{$m->id}}" value="{{$m->status}}">{{($m->status == true)?'Aktif':'Tidak Aktif'}}</a>
                <a href="#" name="user-verified/" style="color:white" class="activation badge bg-{{($m->verified == true)?'success':'danger'}}" id="{{$m->id}}" value="{{$m->verified}}">{{($m->verified == true)?'Verified':'Unverified'}}</a>
                @if(request()->is('user-client*'))
                <a href="{{url('user-client/'.$m->id)}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                @elseif(request()->is('user-lawyer*'))
                <a href="{{url('user-lawyer/'.$m->id)}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                <a href="{{url('user-lawyer/service/'.$m->id)}}" style="color:white" class="badge bg-info">Edit Service</a>
                @elseif(request()->is('user-notaris*'))
                <a href="{{url('user-notaris/'.$m->id)}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                <a href="{{url('user-notaris/service/'.$m->id)}}" style="color:white" class="badge bg-info">Edit Service</a>
                <a href="{{url('user-notaris/filled/'.$m->id)}}" style="color:white" class="badge bg-{{($m->verified == false)?'danger':'info'}}">Lengkapi Data</a>
                @elseif(request()->is('user-kantor-hukum*'))
                <a href="{{url('user-kantor-hukum/service/'.$m->id)}}" style="color:white" class="badge bg-info">Edit Service</a>
                <a href="{{url('user-kantor-hukum/'.$m->id)}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                @elseif(request()->is('user-perusahaan*'))
                <a href="{{url('user-kantor-hukum/'.$m->id)}}" name="user" style="color:white" class="badge bg-success">Detail</a>
                @endif
                <a href="#" name="user-client" style="color:white" class="badge bg-info editUser" id="{{$m->id}}" data-toggle="modal" data-target="#modalUserEdit">Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$user->links()}}
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
              <label>Nama Lengkap</label>
              <input type="text" class="form-control form-control-user" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" required>
          </div>
          <div class="form-group">
              <label>Telpon</label>
              <input type="text" class="form-control form-control-user" name="telp" id="telp" placeholder="Telp" required>
          </div>
          <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Alamat" required>
          </div>
          @if(request()->is('user-lawyer*') || request()->is('user-notaris*'))
          <div class="form-group">
              <label>Gelar</label>
              <input type="text" class="form-control form-control-user" name="gelar" id="gelar" placeholder="Gelar" required>
          </div>
          <div class="form-group">
              <label>Bio</label>
              <input type="text" class="form-control form-control-user" name="bio" id="bio" placeholder="Bio" required>
          </div>
          @endif
          <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">Pilih</option>
                <option value="LK" id="jenis_kelamin_lk">Laki-laki</option>
                <option value="PR" id="jenis_kelamin_pr">Perempuan</option>
              </select>
          </div>
          @if(request()->is('user-notaris*'))
          <div class="form-group">
              <label>PILIH LAYANAN</label><br>
              @foreach($legalitas as $m)
              <input type="checkbox" name="service[]" value="{{$m->id}}" class="service" id="service{{$m->id}}">
              <label>{{$m->nama}}</label><br>
              @endforeach
          </div>
          @endif
          <div class="form-group" id="avatar">
              <label>Avatar</label><br>
              <img src="" width="200px" alt="" class="img-thumbnail image"><br>
              <small style="color:red">*max upload 2MB</small><br>
              <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
              <input type="file" class="form-control form-control-user" name="image" id="image">
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
<!-- User Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="{{url('user-notaris')}}" method="post" enctype="multipart/form-data" class='form-user'>
          @csrf
          <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Email Address" required>
          </div>
          <div class="form-group">
              <label>Telpon</label>
              <input type="text" class="form-control" name="telp" placeholder="Telp" required>
          </div>
          <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
          </div>
          @if(request()->is('user-notaris*'))
          <div class="form-group">
              <label>PILIH LAYANAN</label><br>
              @foreach($legalitas as $m)
              <input type="checkbox" name="service[]" value="{{$m->id}}">
              <label>{{$m->nama}}</label><br>
              @endforeach
          </div>
          @endif
          <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control">
                <option value="">Pilih</option>
                <option value="LK">Laki-laki</option>
                <option value="PR">Perempuan</option>
              </select>
          </div>
          <div class="form-group">
              <label>Avatar</label><br>
              <small style="color:red">*max upload 2MB</small><br>
              <small style="color:red">*Kosongi Jika tidak ingin diubah</small>
              <input type="file" class="form-control form-control-user" name="image">
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
    var url = "{{ url('user-lawyer')}}/"+id+"/edit";
    if(method == 'user-lawyer'){
    var url_form = "{{ url('user-lawyer')}}/"+id+"";
    }else if(method == 'user-client'){
    var url_form = "{{ url('user-client')}}/"+id+"";
    }else if(method == 'user-notaris'){
    var url_form = "{{ url('user-notaris')}}/"+id+"";
    }
    $.ajax({
            type:"get",
            url: url,
            success:function(data){
              $('.form-user').attr( 'action', url_form)
              if(data.jenis_kelamin == 'PR'){
                $('.form-user #jenis_kelamin_pr').attr('selected', true)
              }
              else{
                $('.form-user #jenis_kelamin_lk').attr('selected', true)
              }
              $('.form-user #email').val(data.email)
              $('.form-user #telp').val(data.telp)
              $('.form-user #nama_lengkap').val(data.nama_lengkap)
              if(data.role == 'LAWYER' || data.role == 'NOTARIS'){
                $('.form-user #gelar').val(data.lawyer_detail.gelar)
                $('.form-user #bio').val(data.lawyer_detail.bio)
              }
              if(data.avatar == null){
                $(".form-user .image").attr('src', "{{url('public/avatar-default1.png')}}" )
              }else{
                $(".form-user .image").attr('src', "{{asset('/')}}"+ data.avatar )
              }
              $('.form-user #alamat').val(data.alamat)
              var service = JSON.parse(data.lawyer_detail.service)
              $('.form-user .service').prop('checked', false)
              $.each(service, function( index, value ) {
                $('.form-user #service'+value).prop('checked', true)
              });
              $('.form-user #jenis_kelamin').val(data.jenis_kelamin)
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
@endsection