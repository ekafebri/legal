@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Profil</h2>
            </div>
        </div>
        <div
            class="card shadow-none md-6 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="row no-gutters">
                <div class="col-md-5 mt-3 my-auto">
                    <div class="row align-items-center mt-4 pb-0 text-center">
                        @if($profil->avatar == '')
                        <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid mx-auto d-block"
                            style="height: 150px; width: 150px;">
                        @else
                        <img src="{{asset($profil->avatar)}}" class="rounded-circle img-fluid mx-auto d-block"
                            style="height: 175px; width: 175px;" alt="...">
                        @endif
                        <div class="custom-file pt-2">
                            <input type="file" class="custom-file-input" id="customFile" style="display: none">
                            <label for="customFile" class="text-danger text-center mb-0">Ganti Foto</label>
                        </div>
                    </div>

                    <div class="col bg-light">
                        <div class="row align-items-center ">
                            <h5 style="font-size: 23px" class="font-weight-bold mx-auto  pt-2" > <a id="a-nama_lengkap">{{$profil->nama_lengkap}}</a>
                                {{$profil->lawyer_detail->gelar}} </h5>
                        </div>
                        <div class="row align-items-center">
                            <small class="text-muted mx-auto">
                                @if($profil->verified == true)
                                Verified
                                @else
                                Belum Verified
                                @endif
                            </small>
                        </div>
                    </div>
                    @if ($profil->lawyer_detail->member_expired=='')
                    <div class="p-0" role="alert" style="background-color: #FF2424; color: white;">
                        <div class="row ustify-content-betwee p-2">
                            <div class="col-lg-8 col-md-7 col-sm-6 col-6 my-auto ">
                                <p class="font-weight-bold mb-0" style="color: white;">Anda Belum Berlangganan</p>
                            </div>
                            <div class="col-lg col-md col-sm  col-6 my-auto mx-auto d-flex justify-content-center">
                                <div class="btn btn-light text-danger font-weight-bold" data-toggle="modal"
                                    data-target="#modalLangganan" type="button">Langganan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row justify-content-center  no-gutters ">
                        <div class="col-sm ">
                            <div class="card " data-toggle="modal" data-target="#modalPendapatan">
                                <small class="font-weight-bold text-info mx-auto pt-2">Pendapatan</small>
                                <h6 class="font-weight-bold mx-auto">@rupiah($harga_total)</h6>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" data-toggle="modal" data-target="#modalLangganan">
                                <small class="font-weight-bold text-info mx-auto pt-2">Sisa Langganan</small>
                                <h6 class="font-weight-bold mx-auto">{{$profil->lawyer_detail->member_expired}}124 hari
                                </h6>
                            </div>
                        </div>
                    </div>
                    @endif


                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="row d-flex mt-3 mb-3 ">
                            <div class="col">
                                <h5 class="card-title ">
                                    <strong>
                                        INFORMASI PRIBADI
                                    </strong>
                                </h5>
                            </div>
                            <div class="col">
                                <a href="" data-toggle="modal"  data-target="#modal-edit-profil"
                                    class="col d-flex justify-content-end">Sunting Profil</a>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold mb-0">
                                Email
                            </h6>
                            <p class="my-auto  text-dark m-0" id="p-email">{{$profil->email}}</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold mb-0">
                                Nomor Telepon
                            </h6>
                            <p class="my-auto  text-dark " id="p-telp">{{$profil->telp}}</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold mb-0">
                                Alamat
                            </h6>
                            <p class="my-auto  text-dark " id="p-alamat">{{$profil->alamat}}</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold mb-0">
                                Gender
                            </h6>
                            <p class="my-auto  text-dark ">
                                @if ($profil->jenis_kelamin='PR')
                                Perempuan
                                @else
                                Laki-laki
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row  no-gutters mx-auto mt-0">
                    <p class="font-weight-bold mb-5">
                        Layanan Hukum
                    </p>
                </div>
                <div class="col-sm-12 ">
                    <div class="owl-carousel carousel-bidanghukum d-flex justify-content-center">
                        @foreach ($bidang as $b)
                        <div class="col-sm d-flex justify-content-center ">
                            <a href="# " class="mb-2">
                                <div class="card rounded">
                                    <img src="{{asset($b->gambar)}}" class="rounded d-block m-2"
                                        style="width: 15rem;height: 15rem; " alt="... ">
                                    <h5 class="card-title p-2" style="text-align: center; ">{{$b->nama}}</h5>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row  no-gutters mx-auto mb-5 mt-4 ">
                <a class="btn btn-lg btn-primary" href="{{url('advokat/bidang-hukum')}}">Edit Layanan Hukum</a>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection


@section('modal')
<!-- Modal Edit profil -->
<div class="modal fade" id="modal-edit-profil" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Sunting Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @method('put')
                @csrf
                <form id="form-update-profil">
                    <div class="form-input pb-2">
                        <label for="nama_lengkap" class="mb-1">Nama lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{$profil->nama_lengkap}}" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-input pb-2">
                        <label for="alamat" class="mb-1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat"
                            value="{{ $profil->alamat }}">
                    </div>
                    {{-- <div class="form-input pb-2">
                        <label for="bio" class="mb-1">Bio</label>
                    <input type="text" id="bio" name="bio" class="form-control" value="{{$profil->lawyer_detail->bio}}"> --}}
                        {{-- <textarea name="bio" class="form-control" placeholder="Bio" id="bio" cols="30" rows="2"
                        ></textarea> --}}

                    {{-- </div> --}}
                    <div class="form-input pb-2">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                            value="{{ $profil->email }}">
                    </div>
                    <div class="form-input pb-2">
                        <label for="no">Nomor Telepon</label>
                        <input type="text" name="telp" class="form-control" id="telp" placeholder="Nomor Telepon"
                            value="{{ $profil->telp }}">
                    </div>
                </form>
                <div class="form-input pt-2">
                    <button type="submit" id="btn-update" class="btn btn-primary  btn-block" >
                        Perbarui
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Langganan -->
<div class="modal fade" id="modalLangganan" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Langganan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <h3 class="text-danger font-weight-bold">Rp. 500.000</h3>
                </div>
                <div class="row justify-content-center text-center">
                    <small>Harga layanan untuk berlangganan 1 Tahun</small>
                </div>
                <div class="row no-gutters ">
                    <p class="font-weight-bold pt-3">Detail Pembayaran</p>
                </div>
                <div class="row no-gutters ">
                    <small>Nomor Tagihan</small>
                </div>
                <div class="row no-gutters ">
                    <h6 class="font-weight-bold">22343453330001</h6>
                </div>
                <div class="row no-gutters ">
                    <small>Waktu Langganan</small>
                </div>
                <div class="row no-gutters ">
                    <h6 class="font-weight-bold">365 Hari (1 Tahun)</h6>
                </div>
                <div class="row no-gutters ">
                    <small>Tagihan</small>
                </div>
                <div class="row no-gutters ">
                    <h6 class="font-weight-bold">Rp. 500.000</h6>
                </div>
                <div class="row no-gutters ">
                    <p class="font-weight-bold pt-3">Metode pembayaran</p>
                    <select class="form-control form-control-sm">
                        <option>pilih pembayaran</option>
                        <option>Small select</option>
                    </select>
                    <div class="col mt-3">
                        <div class="btn around btn-primary btn-block">Kirim</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPendapatan" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="card text-white shadow-none rounded" style="background: url({{URL('/')}}/public/plugins/fronted-advokat/images/icon/ic-default-card-mpl.jpg); 
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <div class="col">
                            <div class="row pl-3 mt-4">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/aset-card-mpl-04.png"
                                    class="rounded" style="width: 10%; height: 10%;" alt="">
                            </div>
                            <div class="row  mt-2 pl-3">
                                <p class="mb-0 pt-5">{{$profil->nama_lengkap}}</p>
                            </div>
                            <div class="row pl-3">
                                <small>{{$profil->email}}</small>
                            </div>
                        </div>
                        <div class="row no-gutters pl-3">
                            <div class="col-md-10 col-sm-10 col-9 mb-3 pl-3" style="z-index: 2;">
                                <div class="row  pt-5">
                                    <small class="mb-0">Pendapatan Anda</small>
                                </div>
                                <div class="row">
                                <h5 class="font-weight-bold text-white ">@rupiah($harga_total)</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2  col-3 d-flex align-items-end mx-auto my-auto"
                                style="z-index: 1; float: left;">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/aset-card-mpl-03.png"
                                    style="width: 80%; height: 80%;" class="rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <p class="font-weight-bold mt-2">Riwayat Pendapatan</p>
                </div>
                @foreach ($bayar as $b)
                @if ($b=='')
                <div class="row justify-content-center  ftco-animate">
                    <div class="col-sm m-5 ">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_pendapatan_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                        <div class="row justify-content-center">
                            <div class="col-sm-5 ">
                                <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="row no-gutters">
                        <div class="col-sm d-flex">
                            <small class="text-dark">
                                Pengajuan Layanan
                                    @if ($b->type == 'VICON')
                                        Video Conference
                                    @elseif($b->type == 'LIVE_CHAT')
                                        Konsultasi
                                     @elseif($b->type == 'PENDAMPINGAN')
                                        Pendampingan
                                     @elseif($b->type == 'TERTULIS')
                                        somasi
                                     @elseif($b->type == 'PERTEMUAN')
                                        pertemuan
                                    @endif
                            </small>
                        </div>
                        <div class="col-sm mr-3">
                            <small class="text-muted  row justify-content-end">{{date(' d F Y  ', strtotime($b->created_at))}}</small>
                        </div>
                    </div>
                    <div class="row no-gutters mb-4">
                        <div class="col-sm d-flex">
                            <h5 class="font-weight-bold text-danger">@rupiah($b->amount)</h5>
                        </div>
                        <div class="col-sm mr-3 ">
                            <small class="text-black  row justify-content-end">sudah dibayar</small>
                        </div>
                    </div>
                @endif
                @endforeach
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $('#btn-update').on("click", function () {
        var queryString = $('#form-update-profil').serialize();
        $.ajax(`/lawyer/advokat/update_profil?${queryString}`, {
            method: 'GET',
            success: function (e) {
                console.log(e);
                $('input[name="nama_lengkap"]').val(e.nama_lengkap)
                $('input[name="alamat"]').val(e.alamat)
                // $('input[name="bio"]').val(e.bio)
                $('input[name="email"]').val(e.email)
                $('input[name="telp"]').val(e.telp)

                $("#a-nama_lengkap").html(e.nama_lengkap)
                $("#p-email").html(e.email)
                $("#p-alamat").html(e.alamat)
                $("#p-telp").html(e.telp)

                $("#modal-edit-profil").modal("toggle")
                alert("Profil Anda Telah Diperbaruhi!" );

                
            }
      
        });
    });
</script>
@endsection