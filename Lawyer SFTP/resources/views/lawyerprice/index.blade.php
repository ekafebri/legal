@extends('layouts.app')
@section('title')
Harga Lawyer
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Harga Lawyer</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Harga Lawyer</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalLawyerPrice">
        Tambah Harga Lawyer
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Service ID</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Harga Vicon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Judul Service ID</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Harga Vicon</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          @foreach($lawyerprice as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->user_id}}</td>
            <td>{{$m->service_id}}</td>
            <td>{{$m->harga}}</td>
            <td>{{$m->deskripsi}}</td>
            <td>{{$m->harga_vicon}}</td>
            <td>
                <a href="#" name="lawyerprice" style="color:white" class="btn btn-info editLawyerPrice" id="{{$m->id}}" data-toggle="modal" data-target="#modalLawyerPriceEdit">Edit</a>
                <a href="#" name="lawyerprice" class="delete btn btn-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal LawyerPrice-->
<div class="modal fade" id="modalLawyerPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Harga Lawyer</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('lawyerprice')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-lawyerprice" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Service ID</label>
            <input type="text" class="form-control form-control-lawyerprice" name="service_id" id="service_id" placeholder="Service ID" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control form-control-lawyerprice" name="harga" id="harga" placeholder="Harga" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-lawyerprice" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group">
            <label>Harga Vicon</label>
            <input type="text" class="form-control form-control-lawyerprice" name="harga_vicon" id="harga_vicon" placeholder="Harga Vicon" required>
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

<!-- Modal Lawyer Price Edit-->
<div class="modal fade" id="modalLawyerPriceEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lawyer Price</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('lawyerprice')}}" method="post" enctype="multipart/form-data" class='form-lawyerprice'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-lawyerprice" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Service ID</label>
            <input type="text" class="form-control form-control-lawyerprice" name="service_id" id="service_id" placeholder="Service ID" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control form-control-lawyerprice" name="harga" id="harga" placeholder="Harga" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control form-control-lawyerprice" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required>
        </div>
        <div class="form-group">
            <label>Harga Vicon</label>
            <input type="text" class="form-control form-control-lawyerprice" name="harga_vicon" id="harga_vicon" placeholder="Harga Vicon" required>
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
  // $('.editLawyerPrice').on('click', function(){
    $('table tbody').on( 'click', '.editLawyerPrice', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('lawyerprice')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/lawyerprice/" + id + "/edit",
            success:function(data){
              $('.form-lawyerprice').attr( 'action', url)
              $('.form-lawyerprice #user_id').val(data.user_id)
              $('.form-lawyerprice #service_id').val(data.service_id)
              $('.form-lawyerprice #harga').val(data.harga)
              $('.form-lawyerprice #deskripsi').val(data.deskripsi)
              $('.form-lawyerprice #harga_vicon').val(data.harga_vicon);
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