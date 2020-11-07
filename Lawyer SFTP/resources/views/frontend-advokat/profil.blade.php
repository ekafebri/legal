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
        <div class="card md-6 d-flex justify-content-center counter-wrap ftco-animate fadeInUp ftco-animated">
            <div class="row no-gutters">
                <div class="col-md-5 mt-3 my-auto">
                    <div class="row align-items-center mt-3 mb-2">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="rounded-circle img-fluid mx-auto d-block" style="height: 200px; width: 200px;" alt="...">
                    </div>
                    <div class="col bg-light mt-3">
                        <div class="row align-items-center">
                            <h5 class="font-weight-bold mx-auto">Andira Pramanta</h5>
                        </div>
                        <div class="row align-items-center">
                            <small class="text-muted mx-auto">Berlangganan 1 Tahun</small>
                        </div>
                    </div>
                    <div class="row justify-content-center  no-gutters ">
                        <div class="col-sm ">
                            <div class="card " data-toggle="modal" data-target="#modalPendapatan">
                                <small class="font-weight-bold text-info mx-auto pt-2">Pendapatan</small>
                                <h5 class="font-weight-bold mx-auto">Rp. 5.000.000</h5>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card" data-toggle="modal" data-target="#modalLangganan">
                                <small class="font-weight-bold text-info mx-auto pt-2">Sisa Langganan</small>
                                <h5 class="font-weight-bold mx-auto">124 hari</h5>
                            </div>
                        </div>
                    </div>
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

                                <a href="" data-toggle="modal" data-target="#modalEditProfil" class="col d-flex justify-content-end">Edit Profil</a>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold ">
                                Email
                            </h6>
                            <p class="my-auto  text-dark ">andirapramanta@gmail.com</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold ">
                                Nomor Telepon
                            </h6>
                            <p class="my-auto  text-dark ">085802774491</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold ">
                                Tanggal Lahir
                            </h6>
                            <p class="my-auto  text-dark ">05 Januari 1998</p>
                        </div>
                        <div class="col mb-3">
                            <h6 class="font-weight-bold ">
                                Gender
                            </h6>
                            <p class="my-auto  text-dark ">laki-laki</p>
                        </div>
                    </div>
                </div>
                <div class="row  no-gutters mx-auto ">
                    <h5 class="font-weight-bold">
                        Layanan Hukum
                    </h5>
                </div>
                <div class="col-sm-12 ">
                    <div class="owl-carousel carousel-bidanghukum">
                        <div class="col-sm d-flex justify-content-center ftco-animate">
                            <a href="# " class="mb-2">
                                <div class="card rounded">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/img/probono/img_divorce.jpg" class="rounded d-block m-2" style="width: 15rem;height: 15rem; " alt="... ">
                                    <h5 class="card-title p-2" style="text-align: center; ">Divorce</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm d-flex justify-content-center ftco-animate">
                            <a href="# " class="mb-2">
                                <div class="card rounded">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/img/probono/img_pidana.jpg" class="rounded d-block m-2 " style="width: 15rem;height: 15rem; " alt="... ">
                                    <h5 class="card-title p-2" style="text-align: center; ">Pidana</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm d-flex justify-content-center ftco-animate">
                            <a href="# " class="mb-2">
                                <div class="card rounded ">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/img/probono/img_hutang.jpg" class="rounded d-block m-2 " style="width: 15rem;height: 15rem; " alt="... ">
                                    <h5 class="card-title p-2" style="text-align: center; ">Hutang</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm d-flex justify-content-center ftco-animate">
                            <a href="# " class="mb-2">
                                <div class="card rounded">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/img/probono/img_pro_bono.jpg" class="rounded d-block m-2 " style="width: 15rem;height: 15rem; " alt="... ">
                                    <h5 class="card-title p-2" style="text-align: center; ">Pro bono</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row  no-gutters mx-auto mb-5 mt-4 ftco-animate">
                    <a class="btn btn-lg btn-primary" href="advokat/bidang-hukum">Edit Badan Hukum</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
  <!-- Modal Edit profil -->
  <div class="modal fade" id="modalEditProfil" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-input">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-input">
                        <label for="exampleInputEmail1">Nomor Telepon</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-input">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-input">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                          </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    <a href="" style="color: white;">Simpan</a>
                 </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Langganan -->
<div class="modal fade" id="modalLangganan" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
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
<div class="modal fade" id="modalPendapatan" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointmentLabel">Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="card text-white" style="background: url({{URL('/')}}/public/plugins/fronted-advokat/images/aset-card-mpl-02.png); 
                    background-repeat: no-repeat;
                    background-size: cover;">
                        <div class="col">
                            <div class="row pl-3 mt-4">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/aset-card-mpl-04.png" class="rounded" style="width: 10%; height: 10%;" alt="">
                            </div>
                            <div class="row  mt-2 pl-3">
                                <p class="mb-0 pt-5">Andira Pratama</p>
                            </div>
                            <div class="row pl-3">
                                <small>andirapratama@gmail.com</small>
                            </div>
                        </div>
                        <div class="row no-gutters pl-3">
                            <div class="col-md-10 col-sm-10 col-9 mb-3 pl-3" style="z-index: 2;">
                                <div class="row  pt-5">
                                    <small class="mb-0">Pendapatan Anda</small>
                                </div>
                                <div class="row">
                                    <h5 class="font-weight-bold text-white ">Rp. 5.000.0000</h5>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2  col-3 d-flex align-items-end mx-auto my-auto" style="z-index: 1; float: left;">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/aset-card-mpl-03.png" style="width: 80%; height: 80%;" class="rounded" alt="">
                            </div>
                        </div>
                    </div>
                    <p class="font-weight-bold mt-2">Riwayat Pendapatan</p>
                </div>

                <div class="row no-gutters">
                    <div class="col-sm d-flex">
                        <small class="text-dark">Pembuatan Legalitas Perusahaan</small>
                    </div>
                    <div class="col-sm mr-3">
                        <small class="text-muted  row justify-content-end">20 Agustus 2020 13:10 WIB</small>
                    </div>
                </div>
                <div class="row no-gutters mb-4">
                    <div class="col-sm d-flex">
                        <h5 class="font-weight-bold text-danger">Rp. 500.000</h5>
                    </div>
                    <div class="col-sm mr-3 ">
                        <small class="text-black  row justify-content-end">Menunggu Admin</small>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm d-flex">
                        <small class="text-dark ">Pembuatan Legalitas Perusahaan</small>
                    </div>
                    <div class="col-sm mr-3">
                        <small class="text-muted  row justify-content-end">20 Agustus 2020 13:10 WIB</small>
                    </div>
                </div>
                <div class="row no-gutters mb-2">
                    <div class="col-sm d-flex">
                        <h5 class="font-weight-bold text-danger">Rp. 500.000</h5>
                    </div>
                    <div class="col-sm mr-3 ">
                        <small class="text-black  row justify-content-end">Menunggu Admin</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection