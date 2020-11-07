@extends('frontend-client.layouts.app-putih')

@section('css')
<link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/chat.css" />
@endsection

@section('content')
<section class="ftco-section block-23"
    style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">Selamat Datang di Layanan Pro Bono</h2>
            </div>
        </div>
        <div class="row">
            <div class="card" style="width: 100%">
                <div class="card-body2">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="dept_thumb">
                                <img src="{{url('public/plugins/frontend')}}/images/layanan_probono.png" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="dept_info">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Quis
                                    ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus
                                    vel facilisis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section section-padding30 fix mb-5">
    <div class="container">
        <div class="row justify-content-center mt-5 mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-2">Advokat</h2>
            </div>
        </div>
        <div class="card" style="border: none;">
            <div class="row no-gutters">
                <div class="col-md-4 justify-content-center p-3">
                    <a href="{{url('client/detail_lawyer_probono')}}">
                        <div class="card rounded shadow">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <h5 class="card-title p-2" style="text-align: left; color: #000;">
                                        Andira
                                        Pramanta
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <p class="p-2" style="color: #000;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Aliquam laborum voluptatem sequi vero quis
                                    mollitia,
                                    est voluptas omnis fuga dolor dolores nulla impedit provident
                                    dignissimos. Beatae, quidem? Amet, architecto veritatis!</p>
                            </div>
                            <div class="row no-gutters">
                                <a data-toggle="modal" data-target="#modal-konsultasi"
                                    class="btn btn-primary btn-lg btn-block m-2">Konsultasi</a>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 justify-content-center p-3">
                    <a href="{{url('client/detail_lawyer_probono')}}">
                        <div class="card rounded shadow">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <h5 class="card-title p-2" style="text-align: left; color: #000;">
                                        Andira
                                        Pramanta
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <p class="p-2" style="color: #000;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Aliquam laborum voluptatem sequi vero quis
                                    mollitia,
                                    est voluptas omnis fuga dolor dolores nulla impedit provident
                                    dignissimos. Beatae, quidem? Amet, architecto veritatis!</p>
                            </div>
                            <div class="row no-gutters">
                                <a data-toggle="modal" data-target="#modal-konsultasi"
                                    class="btn btn-primary btn-lg btn-block m-2">Konsultasi</a>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 justify-content-center p-3">
                    <a href="{{url('client/detail_lawyer_probono')}}">
                        <div class="card rounded shadow">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <h5 class="card-title p-2" style="text-align: left; color: #000;">
                                        Andira
                                        Pramanta
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <p class="p-2" style="color: #000;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Aliquam laborum voluptatem sequi vero quis
                                    mollitia,
                                    est voluptas omnis fuga dolor dolores nulla impedit provident
                                    dignissimos. Beatae, quidem? Amet, architecto veritatis!</p>
                            </div>
                            <div class="row no-gutters">
                                <a data-toggle="modal" data-target="#modal-konsultasi"
                                    class="btn btn-primary btn-lg btn-block m-2">Konsultasi</a>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 justify-content-center p-3">
                    <a href="{{url('client/detail_lawyer_probono')}}">
                        <div class="card rounded shadow">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <h5 class="card-title p-2" style="text-align: left; color: #000;">
                                        Andira
                                        Pramanta
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <p class="p-2" style="color: #000;">Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Aliquam laborum voluptatem sequi vero quis
                                    mollitia,
                                    est voluptas omnis fuga dolor dolores nulla impedit provident
                                    dignissimos. Beatae, quidem? Amet, architecto veritatis!</p>
                            </div>
                            <div class="row no-gutters">
                                <a data-toggle="modal" data-target="#modal-konsultasi"
                                    class="btn btn-primary btn-lg btn-block m-2">Konsultasi</a>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('modal')
<!-- modal konsultasi -->
<div class="modal fade" id="modal-konsultasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-12 px-0">
                    <div class="row  ">
                        <div class="col-lg-6 col-md-6 col-sm-8 col-6 my-auto">
                            <h5 class="font-weight-bold my-auto">Konsultasi</h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4 col-6 d-flex justify-content-end">
                            <button type="button" class="btn" data-toggle="modal"
                                data-target="#modal-detail-konsultasi"><i class="fa fa-info-circle"
                                    style="font-size: 1.5rem;"></i></button>
                            <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="font-size: 1.5rem;">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#modal-jadwal-pertemuan">Jadwalkan pertemuan</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan
                                    Konsultasi</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan
                                    Sesi</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body mx-3">
                <!-- content -->
                <div class="row">
                    <div class="mesgs mb-2" style="width: max-content;">

                        <div class="msg_history p-2">

                            <div class="d-flex justify-content-center mt-5 mb-3">
                                <img src="{{url('public/plugins/frontend')}}/images/icon/img_mpl_live_chat.png"
                                    style="width: 40%;">
                            </div>
                            <div class="d-flex justify-content-center">
                                <h5>Selamat Datang di Fitur Pro Bono</h5>
                            </div>
                            <div class="d-flex justify-content-center text-center">
                                <p style="font-size: 14px;">Pelayanan ini diberikan untuk kepentingan umum atau
                                    hanya untuk pihak yang tidak mampu
                                    secara finansial untuk membayar jasa pengacara tanpa dipungut biaya atau secara
                                    cuma cuma.</p>
                            </div>
                        </div>
                        <div class="type_msg px-2">
                            <div class="col-md-12 mx-0">
                                <div class="input_msg_write">
                                    <div class="row ">
                                        <div class="col-lg-1  col-sm-1 col-xs-2 col-2 my-auto">
                                            <i class="fa fa-paperclip text-danger d-flex justify-content-center"
                                                style="font-size: 1.5rem;z-index: 2;"></i>
                                        </div>
                                        <div class="col-lg-9 col-sm-9 col-xs-7 col-7 px-0" style="width:max-content">
                                            <input type=" text " class="write_msg " placeholder="Tulis Pesan " />
                                        </div>
                                        <div
                                            class="col-lg-2 col-sm-2 col-xs-3 col-3 my-auto  d-flex justify-content-center">
                                            <button class="msg_send_btn  " type="button ">
                                                <i class="fa fa-paper-plane  px-auto" aria-hidden="true "></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Akhiri Sesi -->
<div class="modal fade" id="modal-akhiri-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content">
            <div class="modal-body mx-3">
                <div class="row justify-content-center">
                    <img src="{{url('public/plugins/frontend')}}/images/icon/ic-lawyer-selesai.png"
                        style="width: 40%" />
                </div>
                <div class="row justify-content-center">
                    <p class="font-weight-bold my-3">Apakah Layanan Ini Sudah Selesai ?</p>
                    <small style="text-align: center">Terimakasih Sudah menggunakan legal Pocket dan Mohon Feedbacknya
                        di Akhir Sesi Ini</small>
                </div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <button type="button" class="btn btn-outline-danger btn-block font-weight-bold my-2"
                            data-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-sm">
                        <button type="button"
                            class="btn btn-primary btn-block font-weight-bold my-2">Selesaikan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Batalkan Sesi-->
<div class="modal fade" id="modal-batal-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-body mx-3">
                <div class="row justify-content-center">
                    <img src="{{url('public/plugins/frontend')}}/images/icon/ic-lawyer-batal.png" style="width: 40%" />
                </div>
                <div class="row justify-content-center">
                    <p class="font-weight-bold">Apakah Anda Ingin Membatalkan Kasus?</p>
                </div>
                <div class="form-group">
                    <label for="appointment_message " class="text-black">ALASAN PEMBATALAN</label>
                    <textarea name=" " id="appointment_message " class="form-control" cols="30 " rows="5 "
                        placeholder="alasan pembatalan "></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <button type="button" class="btn btn-outline-danger btn-block font-weight-bold my-2"
                                data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-primary btn-block font-weight-bold my-2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Lawyer -->
<div class="modal fade" id="modal-detail-konsultasi" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                    class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">Andira Pramanta</h5>
                                    <p class="card-text"><small class="text-muted">20 Agustus 2020 15.00 WIB</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto; font-size: 14px;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Konsultasi</h5>
                        <p class="text-danger" style="float: right;">#PNSF32423CX2319</p>
                        <p class="card-text m-0">Kategori</p>
                        <p class="card-text"><strong>Pro Bono</strong></p>

                        <p class="card-text m-0">Tanggal & Waktu Video Conference</p>
                        <p class="card-text"><strong>Rabu, 5 Agustus 2020 19.30 WIB</strong></p>

                        <p class="card-text m-0">Status</p>
                        <p class="card-text"><strong>Sedang Berlangsung</strong></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal jadwalkan pertemuan -->
<div class="modal fade" id="modal-jadwal-pertemuan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Konsultasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-1" style="max-width: auto; border: none;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                    class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">Jadwalkan Pertemuan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto; font-size: 14px; border: none;">
                    <div class="card-body">
                        <div class="form-group ">
                            <label for="appointment_message " class="text-black ">NAMA</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group ">
                            <label for="appointment_message " class="text-black ">EMAIL</label>
                            <input type="text" class="form-control" id="email" aria-describedby="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group ">
                            <label for="appointment_message " class="text-black ">AGENDAKAN PERTEMUAN</label>
                            <input type="date" class="form-control" id="jadwal" aria-describedby="jadwal">
                        </div>
                        <button type="button" class="btn btn-primary btn-block">Ajukan</button>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
@endsection