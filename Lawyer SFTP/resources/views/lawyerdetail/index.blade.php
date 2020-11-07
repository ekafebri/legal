@extends('layouts.app')
@section('title')
Detail Lawyer
@endsection
@section('css')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Detail Lawyer</h1>
<p class="mb-4">
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Daftar Detail Lawyer</h6>
    <a href="#" class="btn btn-danger" style="float:right;display:inline"  data-toggle="modal" data-target="#modalLawyerDetail">
        Tambah Detail Lawyer
    </a>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Service</th>
            <th>Member Expired</th>
            <th>Kartu Peradi</th>
            <th>Berita Acara</th>
            <th>Probono</th>
            <th>Gelar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>Service</th>
            <th>Member Expired</th>
            <th>Kartu Peradi</th>
            <th>Berita Acara</th>
            <th>Probono</th>
            <th>Gelar</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $no = 0;?>
          @foreach($lawyerdetail as $m)
          <?php $no++ ;?>
          <tr>
          <td>{{ $no }}</td>
            <td>{{$m->user_id}}</td>
            <td>{{$m->service}}</td>
            <td>{{$m->member_expired}}</td>
            <td><img src="{{asset($m->kartu_peradi)}}" alt="Gambar" width="200px" class="img-thumbnail"></td>
            <td><img src="{{asset($m->berita_acara)}}" alt="Gambar" width="200px" class="img-thumbnail"></td>
            <td>{{$m->probono}}</td>
            <td>{{$m->gelar}}</td>
            <td>
                <a href="#" name="lawyerdetail" style="color:white" class="badge bg-info editLawyerDetail" id="{{$m->id}}" data-toggle="modal" data-target="#modalKomentarsEdit">Edit</a>
                <a href="#" name="lawyerdetail" class="delete badge bg-danger" style="color:white" id="{{$m->id}}" >Hapus</a>
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
<!-- Modal Komentars-->
<div class="modal fade" id="modalLawyerDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Lawyer</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('lawyerdetail')}}" method="post" enctype="multipart/form-data" class='form'>
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Service</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="service" placeholder="Service" required>
        </div>
        <div class="form-group">
            <label>Member Expired</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="member_expired" placeholder="Member Expired" required>
        </div>
        <div class="form-group" id="kartu_peradi">
            <label>Kartu Peradi</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-lawyerdetail" name="image1" id="image1">
        </div>
        <div class="form-group" id="berita_acara">
            <label>Berita Acara</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-lawyerdetail" name="image2" id="image2">
        </div>
        <div class="form-group">
            <label>Probono</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="probono" placeholder="Probono" required>
        </div>
        <div class="form-group">
            <label>Gelar</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="gelar" placeholder="Gelar" required>
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

<!-- Modal Komentars Edit-->
<div class="modal fade" id="modalKomentarsEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Detail Lawyer</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{url('lawyerdetail')}}" method="post" enctype="multipart/form-data" class='form-lawyerdetail'>
        @method('put')
        @csrf
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="user_id" id="user_id" placeholder="User ID" required>
        </div>
        <div class="form-group">
            <label>Service</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="service" id="service" placeholder="Service" required>
        </div>
        <div class="form-group">
            <label>Member Expired</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="member_expired" id="member_expired" placeholder="Member Expired" required>
        </div>
        <div class="form-group" id="kartu_peradi">
            <label>Kartu Peradi</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-lawyerdetail" name="image1" id="image1">
        </div>
        <div class="form-group" id="berita_acara">
            <label>Berita Acara</label><br>
            <small style="color:red">*max upload 2MB</small>
            <input type="file" class="form-control form-control-lawyerdetail" name="image2" id="image2">
        </div>
        <div class="form-group">
            <label>Probono</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="probono" id="probono" placeholder="Probono" required>
        </div>
        <div class="form-group">
            <label>Gelar</label>
            <input type="text" class="form-control form-control-lawyerdetail" name="gelar" id="gelar" placeholder="Gelar" required>
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
<script type="text/javascript" >
  // $('.editKomentars').on('click', function(){
    $('table tbody').on( 'click', '.editLawyerDetail', function (e){
    var id = $(this).attr('id');
    var method = $(this).attr('name');
    //console.log(data);
    var url = "{{ url('lawyerdetail')}}/"+id;
    $.ajax({
            type:"get",
            url:"http://idaman.org/lawyer/lawyerdetail/" + id + "/edit",
            success:function(data){
              $('.form-lawyerdetail').attr( 'action', url)
              $('.form-lawyerdetail #user_id').val(data.user_id)
              $('.form-lawyerdetail #service').val(data.service)
              $('.form-lawyerdetail #member_expired').val(data.member_expired)
              $(".form-lawyerdetail .image1").attr('src', "{{asset('/')}}"+ data.kartu_peradi )
              $(".form-lawyerdetail .image2").attr('src', "{{asset('/')}}"+ data.berita_acara )
              $('.form-lawyerdetail #probono').val(data.probono)
              $('.form-lawyerdetail #gelar').val(data.gelar);
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