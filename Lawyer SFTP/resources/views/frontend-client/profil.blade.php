@extends('frontend-client.layouts.app-putih')

@section('css')
<style>
    .overlay {
        position: static;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        background-color: #d6d6d6;
        border-radius: 50%;
    }

    .image:hover .overlay {
        opacity: 1;
    }

    .icon {
        color: white;
        font-size: 80px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .icon-camera:hover {
        color: #eee;
    }

    .image-upload>input {
        display: none;
    }
</style>
@endsection

@section('content')

<!-- Section profil -->
<section class="ftco-section ftco-no-pb ftco-services" id="practice-sectio">
    <div class="container">
        <div class="row justify-content-center pb-3">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2 class="mb-5 mt-5 mx-auto">Profil</h2>
            </div>
        </div>
        <div class="row no-gutters justify-content-center">
            <div class="col-md-5 col-lg-3 ftco-animate py-4 nav-link-wrap">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- <a class="nav-link px-4 py-1 active mx-auto text-center w-100" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas mx-auto"></span>
                        Informasi Pribadi</a> -->
                    <br>
                    <div class="image col-8 mx-auto">
                        @if($users->avatar == '')
                        <img src="{{url('public/avatar-default1.png')}}" alt="Avatar" style="height: 10rem; width: 10rem;" class="rounded-circle img-fluid mx-auto d-block">
                        @else
                        <img src="{{asset($users->avatar)}}" alt="Avatar" style="height: 10rem; width: 10rem;" class="rounded-circle img-fluid mx-auto d-block">
                        @endif
                        <a href="">
                            <input type="file" class="custom-file-input" id="customFile" style="display: none">
                            <label for="customFile" class="text-white mx-auto text-center w-100 mt-2">Ganti Foto</label>
                        </a>
                        <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="image rounded-circle img-fluid" alt=""> -->
                        <!-- <div class="overlay">
                            <a href="#" class=" icon" title="Ubah Foto Profil">
                                <div class="image-upload">
                                    <label for="file-input">
                                        <i class="icon-camera"></i>
                                    </label>
                                    <input id="file-input" type="file" />
                                </div>
                            </a>
                        </div> -->
                        <!-- <a href="">
                            <input type="file" class="custom-file-input" id="customFile" style="display: none">
                            <label for="customFile" class="text-white mx-auto text-center w-100 mt-2">Ganti Foto</label>
                        </a> -->
                        <p class="text-white text-center mt-2" id="card-nama_lengkap">{{$users->nama_lengkap}}</p>
                        <p class="text-center mt-1 mx-auto" style="font-size: small; color: silver;">
                            @if($users->verified == true)
                            Verified
                            @else
                            Belum Verified
                            @endif</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7 ml-4">
                @if($users->verified == 0)
                <div class="row alert ml-0 mr-0" style="background-color: #ff2424;">
                    <p class="col my-auto text-white" style="font-size: small;">Akun anda belum terverifikasi silahkan
                        verifikasi akun anda sekarang
                    </p>
                    <a href="" class=" btn col-auto text-danger my-auto rounded" style="background: #fff; border-width: 0;" data-toggle="modal" data-target="#exampleModal"><small class="font-weight-bold" style="color: #ff2424;">Verifikasi</small></a>
                </div>
                @endif

                <div class="row ml-0">
                    <div class="card col-12 w-100">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row d-flex mt-3 mb-3 ">
                                    <div class="col">
                                        <h5 class="card-title ">
                                            <strong>
                                                INFORMASI PRIBADI
                                            </strong>
                                        </h5>
                                    </div>
                                    <div class="col">
                                        <a href="" data-toggle="modal" data-target="#modal-edit" class="col d-flex justify-content-end" style="color: #ff2424;">Edit Profil</a>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-0">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Email</label><br>
                                        <label class="label" id="label-email" for="subject">{{$users->email}}</label><br>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Nomor
                                            Telepon</label><br>
                                        <label class="label" id="label-telp" for="subject">{{$users->telp}}</label><br>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Alamat
                                        </label><br>
                                        <label class="label" id="label-alamat" for="subject">{{$users->alamat}}</label><br>

                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Status
                                        </label><br>
                                        <label class="label" for="subject">
                                            @if($users->status == true)
                                            AKTIF
                                            @else
                                            TIDAK AKTIF
                                            @endif
                                        </label><br>

                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Tanggal
                                            Lahir</label><br>
                                        <label class="label" for="subject">05 Januari 1998</label><br>
                                    </div>
                                </div> -->

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="label font-weight-bolder" for="subject">Gender</label><br>
                                        <label class="label" for="subject">
                                            @if($users->jenis_kelamin == 'PR')
                                            Perempuan
                                            @else
                                            Laki-laki
                                            @endif
                                        </label><br>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-0">
                                    <!-- <a class="btn btn-primary" class="ml-0 mb-0" style="float:right;" href="#" role="button" data-toggle="modal" data-target="#modal-edit">Sunting Profil</a> -->
                                    <!-- <a class="btn btn-primary" name="{{request()->is('user-client*')}}" style="color:white" class="editUser" id="{{$users->id}}" style="float:right;" href="#" role="button" data-toggle="modal" data-target="#modal-edit">Sunting Profil</a> -->
                                    <!-- <a href="" data-toggle="modal" data-target="#modal-edit" class="ml-0 mb-0"> -->
                                    <!-- <p class="text-right text-danger text-right"><small>Edit Profile</small></p> -->
                                    <!-- </a> -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- // -->

<!-- aktivitas -->
<section class="ftco-section aktivitas-section" id="attorneys-section ">
    <div class="container ">
        <div class="row justify-content-center pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Riwayat Konsultasi</h2>
            </div>
        </div>
        <div class="row ">
            <div class="owl-carousel carousel-aktivitas">

                <div class="col-sm ftco-animate">
                    <div class="item " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/report')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-laporan.png " class="mb-2 " alt=" ">Laporan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/pendampingan')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-pendampingan.png" class="mb-2 " alt=" ">Pendampingan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/videoconference')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-video-confrence.png " class="mb-2 " alt=" ">Video Conference</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ftco-animate ">
                    <div class="item " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/pertemuan')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-pertemuan-10.png" class="mb-2 " alt=" ">Pertemuan</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm  ftco-animate">
                    <div class="item  " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/tertulis')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-legal.png " class="mb-2 " alt=" ">Tertulis</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm ftco-animate">
                    <div class="item " style="width: 70%;text-align: center; ">
                        <div class="aktivitas ">
                            <a href="{{url('client/tagihan')}}" style="color: #ff2424;"><img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-invoice-08.png" class="mb-2 " alt=" ">Tagihan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- // -->

@endsection

@section('modal')
<!-- Modal verifikasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title weight-bold" id="exampleModalLabel">Verifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/" method="POST" class="dropzone">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">NOMOR KTP</label>
                        <input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="Nomor KTP">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">FOTO KTP</label>
                        <div id="foto-preview" class="dropzone w-100 overflow-auto" style="height: 125px"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">SELFIE DENGAN KTP</label>
                        <div id="selfie-preview" class="dropzone w-100 overflow-auto" style="height: 125px"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                <!-- <button type="button" class="btn btn-secondary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sunting Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form action="{{url('user')}}" method="post" enctype="multipart/form-data" class='form-user'>
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="email">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="no">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                    </div>


                </form> -->
                <form id="form-update-profile">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" value="{{ $users->nama_lengkap }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="no" placeholder="Alamat" value="{{ $users->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ $users->email }}">
                    </div>

                    <div class="form-group">
                        <label for="no">Nomor Telepon</label>
                        <input type="text" name="telp" class="form-control" id="no" placeholder="Nomor Telepon" value="{{ $users->telp }}">
                    </div>
                    <!-- <div class="form-group">
                        <label class="label">Kata Sandi Baru</label>
                        <p class="mb-0"><small style="color:red">*Kosongi Jika tidak ingin diubah</small></p>
                        <input type="password" name="password" class="form-control" placeholder="******">
                    </div>
                    <div class="form-group">
                        <label class="label">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="******">
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button> -->
                <button type="submit" id="button-update-profile" class="btn btn-primary">Perbarui</button>
            </div>
        </div>
    </div>
</div>
<!-- // -->

@endsection

@section('js')
<script>
    $('#button-update-profile').on("click", function() {
        var queryString = $('#form-update-profile').serialize();
        $.ajax(`/lawyer/client/update_profile?${queryString}`, {
            method: 'GET',
            success: function(e) {
                console.log(e);
                $('input[name="nama_lengkap"]').val(e.nama_lengkap)
                $('input[name="alamat"]').val(e.alamat)
                $('input[name="email"]').val(e.email)
                $('input[name="telp"]').val(e.telp)

                $("#card-nama_lengkap").html(e.nama_lengkap)
                $("#label-email").html(e.email)
                $("#label-alamat").html(e.alamat)
                $("#label-telp").html(e.telp)

                $("#modal-edit").modal("toggle")
                alert("Profil Anda Telah Diperbaruhi!");

            }
        });
    })
</script>
@endsection