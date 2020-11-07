@extends('layouts.app')
@section('title')
Edit Layanan
@endsection
@section('css')
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Layanan</h1>
<p class="mb-4">
</p>

    <!-- DataTales Example -->
    @csrf
    @method('put')
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float:left;display:inline">Edit Layanan {{$user->nama_lengkap}}</h6>
        </div>
        <div class="modal-body">
            <h3>Service Yang di Layani</h3>
            @foreach($service as $m)
        <form action="{{url('user-layanan/update/'.$user->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group" style="border: 1px solid #e6e6e6;">
                <div class="m-3">
                    <img src="{{asset($m['gambar'])}}" alt="{{$m['nama']}}" width="300px" class="img-thumbnail myImg">
                    <input type="hidden" value="{{$m['id']}}" name="service_id[]" class="form-control m-1">
                    <a href="#" class="btn btn-danger m-1 float-right deleteService" name="service-delete" id="{{$user->id}}" id-service="{{$m['id']}}">Delete</a>
                    <h3>Nama Layanan : {{$m['nama']}}</h3>
                    <h4>Harga : </h4>
                    <input type="number" value="{{$m['harga']}}" name="harga[]" class="form-control m-1">
                    <!-- <h4>Harga Vicon : </h4>
                    <input type="number" value="{{$m['harga_vicon']}}" name="harga_vicon[]" class="form-control m-1"> -->
                    <h4>Deskripsi : </h4>
                    <textarea name="deskripsi[]" class="form-control m-3">{{$m['deskripsi']}}</textarea>
                </div>
            </div>
            @endforeach
            <a href="{{url('user-notaris')}}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-success m-1">Simpan</button>
        </form>
        <form action="{{url('service-add/'.$user->id)}}" method="post">
        @csrf
            <div class="form-group" style="border: 1px solid #e6e6e6;">
            <br>
                <div class="m-3">
                <h3>Tambah Layanan</h3>
                    <select name="service_id" id="select" class="form-control">
                        <option value="">PILIH</option>
                        @foreach($allservice as $s)
                        <option value="{{$s->id}}" id="{{$s->id}}">{{$s->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="m-3" id="add-service">
                    
                </div>
            </div>
        </form>
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
$('.deleteService').on( 'click',function (e) {
    var id = $(this).attr('id')
    var method = $(this).attr('name')
    var service_id = $(this).attr('id-service')
    console.log(service_id)
    e.preventDefault();
    Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data akan di hapus pastikan Lawyer tidak memiliki konsultasi yang sedang berlangsung ",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Batal',
    confirmButtonText: 'Ya',
    focusCancel: true,
    }).then((confirm,value)=>{
    if(confirm.value === true){
        $.ajax({
        type:"post",
        url: "{{url('')}}/"+ method +'/'+ id,
        data:{
            'service_id': service_id
        },
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
    $(document).ready(function(){
        $("#select").change(function() {
            var id = $(this).children(":selected").attr("id");
            var value = $(this).children(":selected").html();
            console.log(id);
            $('#add-service').empty()
            $('#add-service').html(`
            <input type="hidden" value="`+id+`" name="service_id" class="form-control m-1">
            <h3>Nama Layanan : `+value+`</h3>
            <h4>Harga : </h4>
            <input type="number" name="harga" class="form-control m-1" required>
            <h4>Deskripsi : </h4>
            <textarea name="deskripsi" class="form-control m-1" required></textarea>
            <br>
            <button type="submit" class="btn btn-success">Tambah</button>
            `)
        });
    })
</script>
@endsection