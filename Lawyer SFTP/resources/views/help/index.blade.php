@extends('layouts.app')
@section('title')
Bantuan
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Bantuan</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Bantuan</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Nama Kontak</th>
            <th>Kontak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($help as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->name_contact}}</td>
            @if($m->id == 4)
            @php
            $no = 0;
            $link = json_decode($m->contact);
            @endphp
            {{$no}}
            <td>
              @if($link)
              @foreach($link as $k => $l)
                {{$k}} = 
                {{$l}}
                <a href="#" name="help-youtube" style="color:white" class="badge bg-info editHelpY" id="{{$no}}" data-toggle="modal" data-target="#modalHelpEditYoutube">Edit</a>
                <br>
                @php
                $no ++;
                @endphp
              @endforeach
              @endif
            </td>
            @else
            <td>{{$m->contact}}</td>
            @endif
            <td>
                @if($m->id == 4)
                <a href="#" name="help" style="color:white" class="badge bg-info editHelp" id="{{$m->id}}" data-toggle="modal" data-target="#modalHelpTambahYoutube">Tambah Link</a>
                @else
                <a href="#" name="help" style="color:white" class="badge bg-info editHelp" id="{{$m->id}}" data-toggle="modal" data-target="#modalHelpEdit">Edit</a>
                @endif
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
<!-- Modal Help-->

<div class="modal fade" id="modalHelp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bantuan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('help')}}" method="post" class='form'>
        @csrf
        <div class="form-group">
            <label>Nama Kontak</label>
            <input type="text" class="form-control form-control-help" name="name_contact" placeholder="Nama Kontak" required>
        </div>
        <div class="form-group">
            <label>Kontak</label>
            <input type="text" class="form-control form-control-help" name="contact" placeholder="Kontak" required>
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

<!-- Modal Edit Help-->
<div class="modal fade" id="modalHelpEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Bantuan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('help')}}" method="post" enctype="multipart/form-data" class='form-help'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Nama Kontak</label>
            <input type="text" class="form-control form-control-help" name="name_contact" id="name_contact" placeholder="Nama Kontak" required>
        </div>
        <div class="form-group">
            <label>Kontak</label>
            <input type="text" class="form-control form-control-help" name="contact" id="contact" placeholder="Kontak" required>
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
<!-- Modal Tambah Help Youtube-->
<div class="modal fade" id="modalHelpTambahYoutube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Youtube Link</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('help')}}" method="post" class='form-help'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-help" name="nama_youtube" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Link Youtube</label>
            <input type="text" class="form-control form-control-help" name="link_youtube"  placeholder="Link Youtube" required>
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
<!-- Modal Edit Help Youtube-->
<div class="modal fade" id="modalHelpEditYoutube" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Youtube Link</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('help')}}" method="post" class='form-help-youtube'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control form-control-help" name="nama_youtube" id="nama_youtube" placeholder="Judul" required>
        </div>
        <div class="form-group">
            <label>Link Youtube</label>
            <input type="text" class="form-control form-control-help" name="link_youtube" id="link_youtube" placeholder="Link Youtube" required>
        </div>
            <input type="hidden" name="id" id="id-youtube">
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
    $('table tbody').on('click', '.editHelp', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    var url = "{{ url('help')}}/"+id;
    $.ajax({
            type:"get",
            url:"{{url('')}}/"+method+'/'+ id + "/edit",
            success:function(data){
              console.log(data)
              $('.form-help').attr('action', url)
              $('.form-help #name_contact').val(data.name_contact)
              $('.form-help #contact').val(data.contact);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>
<script>
    $('table tbody').on('click', '.editHelpY', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    var url = "{{ url('help-y-update')}}/"+id;
    $.ajax({
            type:"get",
            url:"{{url('')}}/"+method+'/'+ id + "/edit",
            success:function(data){
              $('.form-help-youtube').attr('action', url)
              $('.form-help-youtube #nama_youtube').val(data.judul)
              $('.form-help-youtube #link_youtube').val(data.value);
              $('.form-help-youtube #id-youtube').val(data.id);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection