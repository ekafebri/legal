@extends('layouts.app')
@section('title')
Faq
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Faq</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Faq</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalFaq">
        Tambah Faq
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10px">No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($faq as $m)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$m->pertanyaan}}</td>
            <td>{{$m->jawaban}}</td>
            <td>
                <a href="#" name="faq" style="color:white" class="badge bg-info editFaq" id="{{$m->id}}" data-toggle="modal" data-target="#modalFaqEdit">Edit</a>
                <a href="#" name="faq" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Faq-->

<div class="modal fade" id="modalFaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Faq</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('faq')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>Pertanyaan</label>
            <input type="text" class="form-control form-control-faq" name="pertanyaan" placeholder="Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Jawaban</label>
            <textarea row="5" class="form-control form-control-faq" name="jawaban" placeholder="Jawaban" required></textarea>
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

<!-- Modal Edit Faq-->
<div class="modal fade" id="modalFaqEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Faq</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('faq')}}" method="post" enctype="multipart/form-data" class='form-faq'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>Pertanyaan</label>
            <input type="text" class="form-control form-control-faq" name="pertanyaan" id="pertanyaan" placeholder="Pertanyaan" required>
        </div>
        <div class="form-group">
            <label>Jawaban</label>
            <textarea row="5" class="form-control form-control-faq" name="jawaban" id="jawaban" placeholder="Jawaban" required></textarea>
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
  //$('.editFaq').on('click', function(){
    $('table tbody').on('click', '.editFaq', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('faq')}}/"+id;
    $.ajax({
            type:"get",
            url:"{{url('')}}/"+method+'/'+ id + "/edit",
            success:function(data){
              $('.form-faq').attr('action', url)
              $('.form-faq #pertanyaan').val(data.pertanyaan)
              $('.form-faq #jawaban').val(data.jawaban);
            },
            error : function(data){
              console.log(data.responseText)
              alert('Sorry, Something error :(')
            }
          })
  })
</script>

@endsection