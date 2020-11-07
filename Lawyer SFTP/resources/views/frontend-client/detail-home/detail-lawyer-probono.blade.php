@extends('frontend-client.layouts.app-putih')

@section('css')
<link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/chat.css" />
@endsection

@section('content')
<section class="ftco-section block-23"
    style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>

    <div class="container">
        <div class="row justify-content-center mt-5 mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-2">ADVOKAT</h2>
            </div>
        </div>
        <div class="row">
            <div class="card" style="
                                width: 100%;
                                border: none;
                                border-radius: 0%;
                                padding: 16px;
                                -webkit-box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
                                -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2);
                                box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.2);
                              ">
                <!-- <div class="card-body">
                                
                              </div> -->
                <div class="card" style="max-width: auto; border: none">
                    <div class="row no-gutters">
                        <div class="row card-body">
                            <div class="col-md-3">
                                <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt=""
                                    style="border-radius: 50%;" width="220px" height="220px" />
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="card-body">
                                    <h3><strong>Andira Pramanta</strong></h3>
                                    <p style="color: #ff2424;">S.H.,LL.M, M.Hum.</p>
                                    <p>
                                        <div style="color: #f7ce39; display: inline;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        &nbsp;(27 Reviews)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />

                <div class="card mb-3" style="max-width: auto; border: none">
                    <div class="card-body">
                        <div style="font-size: 14px">
                            <h5>Deskripsi</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem porro cum dolore
                                ipsum suscipit similique quod consequatur sequi repellendus eius. A ipsa illum pariatur
                                distinctio officia aliquid tempore architecto nostrum?</p>
                        </div>
                        <div style="font-size: 14px">
                            <h5>Bahasa</h5>
                            <p>Inggris</p>
                        </div>
                        <div style="font-size: 14px">
                            <h5>Domisili</h5>
                            <p>Bandung, Jawa Barat</p>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mt-4" data-toggle="modal"
                            data-target="#ModalPilihLayanan">Konsultasi</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card"
            style="width: 100%; border: none; -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.2); -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2); box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.2);">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt=""
        style="border-radius: 5px; width: 300px;" />
    </div>
    <div class="col-lg-8">
        <h3><strong>Andira Pramanta</strong></h3>
        <p style="color: #ff2424;">S.H.,LL.M, M.Hum.</p>
        <p>
            <div style="color: #f7ce39; display: inline;">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            &nbsp;(27 Reviews)
        </p>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium corrupti blanditiis
            numquam nam, quaerat delectus consequuntur
            tenetur tempora cum voluptatum inventore consequatur! Molestias cumque sunt deleniti,
            officiis atque aliquid. Cumque.
        </p>

        <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-konsultasi">Konsultasi</a>
    </div>
    </div>
    </div>
    </div> --}}

    </div>
</section>

<section class="services-section section-padding30 fix mb-5">
    <div class="container">
        <strong>
            <h4 class="mt-5" style="color: black;">Reviews</h4>
        </strong>
        <div class="card" style="width: 100%; border: none;">
            <div class="card-body">

                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-2">
                        <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt=""
                            style="border-radius: 5px; width: 100px;" />
                    </div>
                    <div class="col-lg-8">
                        <p style="font-size: 14px;">
                            <div style="color: #f7ce39; display: inline; font-size: 14px;">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </p>

                        <p style="font-size: 14px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium corrupti blanditiis
                            numquam nam, quaerat delectus consequuntur
                            tenetur tempora cum voluptatum inventore consequatur! Molestias cumque sunt deleniti,
                            officiis atque aliquid. Cumque.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="card mt-2" style="width: 100%; border: none;">
            <div class="card-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-2">
                        <img src="{{url('public/plugins/frontend')}}/images/person_1.jpg" alt=""
                            style="border-radius: 5px; width: 100px;" />
                    </div>
                    <div class="col-lg-8">
                        <p style="font-size: 14px;">
                            <div style="color: #f7ce39; display: inline; font-size: 14px;">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                        </p>

                        <p style="font-size: 14px;">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium corrupti blanditiis
                            numquam nam, quaerat delectus consequuntur
                            tenetur tempora cum voluptatum inventore consequatur! Molestias cumque sunt deleniti,
                            officiis atque aliquid. Cumque.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" style="color: #ff2424;">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" style="color: #ff2424;" href="#">1</a></li>
                <li class="page-item"><a class="page-link" style="color: #ff2424;" href="#">2</a></li>
                <li class="page-item"><a class="page-link" style="color: #ff2424;" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" style="color: #ff2424;" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>
@endsection

@section('modal')
<!-- Modal Konsultasi -->
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
                <div class="card" style="max-width: auto; border: none;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/group.png"
                                    class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10 my-auto">
                                <div class="card-body align-items-center">
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