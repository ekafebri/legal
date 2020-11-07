@extends('layouts.app')
@section('title')
Privasi
@endsection
@section('css')

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Privasi</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Edit Privasi</h6>
  </div>
    <form action="{{url('privacy/'.$privacy->id)}}" method="post">
    @csrf
    @method('put')
    <div class="modal-body">
            <div class="form-group">
                <label>Konten</label><br>
                <textarea rows="25" cols="54" class="form-control summernote" name="content">{{$privacy->content}}</textarea>
            </div>
        <a href="{{url('privacy')}}" class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </form>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
@section('footer')
@endsection
@section('modal')

@endsection
@section('js')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
  $(document).ready(function() {
  $('.summernote').summernote();
});
</script>
@endsection