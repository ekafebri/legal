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
                <h2 class="mb-2">DETAIL ADVOKAT</h2>
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
                                @if($detail_advokat_online->avatar == '')
                                <img src="{{url('public/plugins/frontend')}}/images/img_profil_default.png" alt="Avatar"
                                    width="220px" height="220px;" style="border-radius: 50%;">
                                @else
                                <img src="{{ asset($detail_advokat_online->avatar) }}" alt=""
                                    style="border-radius: 50%;" width="220px" height="220px" />
                                @endif
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="card-body">
                                    <h3><strong>{{$detail_advokat_online->nama_lengkap}}</strong></h3>
                                    <p style="color: #ff2424; margin-top: 5px;">
                                        {{ $detail_advokat_online->lawyer_detail->gelar }}</p>
                                    <div style="color: #f7ce39; display: inline">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    &nbsp;(27 Reviews)
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
                            <p>{{ $detail_advokat_online->lawyer_detail->bio }}</p>
                        </div>
                        <div style="font-size: 14px">
                            <h5>Bahasa</h5>
                            <p>{{ $detail_advokat_online->lawyer_detail->bahasa }}</p>
                        </div>
                        <div style="font-size: 14px">
                            <h5>Domisili</h5>
                            <p>{{ $detail_advokat_online->lawyer_detail->kota }},
                                {{ $detail_advokat_online->lawyer_detail->provinsi }}</p>
                        </div>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#ModalPilihLayanan">Konsultasi</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card"
                style="width: 100%; border: none; -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.2); -moz-box-shadow: 5px 5px 10px 0px rgba(75, 43, 43, 0.2); box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.2);">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            @if($detail_advokat_online->avatar == '')
                            <img src="{{url('public/plugins/frontend')}}/images/img_profil_default.png" alt="Avatar"
        width="150px" height="150px;" style="border-radius: 50%;">
        @else
        <img src="{{ asset($detail_advokat_online->avatar) }}" alt="" style="border-radius: 5px;" width="200px"
            height="200px" />
        @endif
    </div>
    <div class="col-lg-8">
        <h3><strong>{{$detail_advokat_online->nama_lengkap}}</strong></h3>
        <p style="color: #ff2424; margin-top: 5px; margin-bottom: 5px;">
            {{ $detail_advokat_online->lawyer_detail->gelar }}</p>
        <p style="margin: 5px;">
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
    <div class="row align-items-center">
        <div class="col">
            <p style="margin-top: 5px; margin-bottom: 15px;">
                {{ $detail_advokat_online->lawyer_detail->bio }}
            </p>

            <a href=" #" class="btn btn-primary btn-lg" data-toggle="modal"
                data-target="#ModalPilihLayanan">Konsultasi</a>
        </div>

    </div>
    </div>
    </div> --}}
    </div>

    </div>
</section>
<!-- End Artikel Terbaru -->

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
<!-- Modal Pilih Layanan -->
<div class="modal fade bottom" style="width: 100%; height: 100%;" id="ModalPilihLayanan" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-bottom" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Pilih Konsultasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row" style="font-size: 16px;">
                    <div class="col" style="color: black;">
                        @foreach($detail_bidang as $m)
                        <button type="button" class="btn btn-light btn-block text-left">{{ $m->nama }}</button>
                        @endforeach
                    </div>

                </div>


            </div>
            <!--Footer-->
            <div class="modal-footer">

                <a data-toggle="modal" data-target="#ModalPilihKonsultasi" data-dismiss="modal"
                    class="btn btn-primary btn-lg btn-block">Konsultasi</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!-- Modal Pilih Konsultasi -->
<div class="modal fade bottom" style="width: 100%; height: 100%;" id="ModalPilihKonsultasi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-height modal-bottom" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Informasi Konsultasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row" style="font-size: 16px;">
                    <div class="col-7">
                        <p>Gratis Pesan Langsung</p>
                        <p>Video Conference</p>
                    </div>
                    <div class="col-5">
                        <p>Gratis 1 jam</p>
                        <p>Rp. per jam</p>
                    </div>
                </div>


            </div>
            <!--Footer-->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a data-toggle="modal" data-target="#modal-konsultasi"
                    class="btn btn-primary btn-lg btn-block">Konsultasi</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!-- Modal Konsultasi -->
<div class="modal fade" id="modal-konsultasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-video-conference">Video
                                    Conference</a>
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#modal-layanan-tertulis">Layanan Tertulis</a>
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#modal-jadwalkan-pendampingan">Jadwal pendampingan</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan
                                    Sesi</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan
                                    Konsultasi</a>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 px-3">
                        <div class="btn btn-info btn-block rounded">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-sm-6 col-12 my-auto text-left">
                                    <small class="">anda dapat melakukan konsultasi gratis selama 1
                                        jam</small>
                                </div>
                                <div class="col-lg col-md-6 col-sm-6 col-12 my-auto text-right">
                                    <h4 class="font-weight-bold text-light ">59 : 40 : 20</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body pb-0">
                <!-- content -->
                <div class="row">
                    <div class="mesgs mb-2" style="width: max-content;">
                        <div class="msg_history p-2">

                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img
                                        src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg"
                                        class="img-msg">
                                </div>
                                <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3  bg-light">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in
                                            your graphic,print and web layouts, and discover plugins for your favorite
                                            writing, design and blogging tools.</p>
                                        <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                                            <i class="fa fa-paperclip pr-3"></i>
                                            <small class=""> File perlawanan 1.docx</small>
                                        </div>
                                    </div>
                                    <small style="position:relative; float: left;" class="text-muted"> 11:01 AM |
                                        June 9</small>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in
                                            your graphic,print and web layouts, and discover plugins for your favorite
                                            writing, design and blogging tools.</p>
                                        <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                                            <i class="fa fa-paperclip pr-3"></i>
                                            <small class=""> File perlawanan 1.docx</small>
                                        </div>
                                    </div>
                                    <small style="position:relative; float: right;" class="text-muted"> 11:01 AM |
                                        June 9</small>
                                </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img
                                        src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg"
                                        class="img-msg">
                                </div>
                                <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3  bg-light">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in
                                            your graphic,print and web layouts, and discover plugins for your favorite
                                            writing, design and blogging tools.</p>
                                        <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                                            <i class="fa fa-paperclip pr-3"></i>
                                            <small class=""> File perlawanan 1.docx</small>
                                        </div>
                                    </div>
                                    <small style="position:relative; float: left;" class="text-muted"> 11:01 AM |
                                        June 9</small>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in
                                            your graphic,print and web layouts, and discover plugins for your favorite
                                            writing, design and blogging tools.</p>
                                        <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                                            <i class="fa fa-paperclip pr-3"></i>
                                            <small class=""> File perlawanan 1.docx</small>
                                        </div>

                                    </div>
                                    <small style="position:relative; float: right;" class="text-muted"> 11:01 AM |
                                        June 9</small>
                                </div>
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

<!-- Modal Konsultasi Kosong -->
<div class="modal fade" id="modal-konsultasi-kosong" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-12 px-0">
                    <div class="row">
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
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-video-conference">Video
                                    Conference</a>
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#modal-layanan-tertulis">Layanan Tertulis</a>
                                <a class="dropdown-item" data-toggle="modal"
                                    data-target="#modal-jadwalkan-pendampingan">Jadwal pendampingan</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan
                                    Sesi</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan
                                    Konsultasi</a>

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
                                <p>Belum Ada Konsultasi</p>
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

<!-- Modal Detail Konsultasi -->
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
                                <img src="{{ asset($detail_advokat_online->avatar) }}" class="rounded-circle img-fluid"
                                    style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">
                                        {{ $detail_advokat_online->nama_lengkap }}</h5>
                                    <p class="card-text"><small class="text-muted">Pajak</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto; font-size: 14px;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Konsultasi</h5>

                        <p class="card-text m-0">Tanggal Konsultasi</p>
                        <p class="card-text"><strong>12 October 2020, 11.30</strong></p>

                        <p class="card-text m-0">Status</p>
                        <p class="card-text"><strong>Pilih Metode Pembayaran</strong></p>

                        <p class="card-text m-0">Detail Konsultasi</p>
                        <p class="card-text"><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi saepe
                                quia voluptate dolores architecto ipsa corrupti sit suscipit laudantium fugiat
                                praesentium exercitationem tempore error voluptatem, aliquid dolorem assumenda
                                recusandae eos!</strong></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal video conference -->
<div class="modal fade" id="modal-video-conference" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Video Conference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-video-confrence.png"
                                    class="rounded-circle img-fluid" style="height: 100px; width: 100px" alt="..." />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Video Conference</h5>
                                    <p class="card-text text-danger mt-0">Rp 300.000 per jam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NAMA</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">EMAIL</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">AGENDAKAN WAKTU</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">PILIH DURASI VIDEO CONFERENCE</label>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-block">1 Jam</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-light btn-block">2 Jam</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-light btn-block">3 Jam</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block"><a href="#"
                            style="color: white">Ajukan</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal layanan tertulis -->
<div class="modal fade" id="modal-layanan-tertulis" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Pilih Opsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Somasi</label>
                </div>
                <div class="form-group">
                    <label for="">Legal Opinion</label>
                </div>
                <div class="form-group">
                    <label for="">Romandum</label>
                </div>
                <div class="form-group">
                    <label for="">Lainnya</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                        placeholder="Sertakan opsi lainnya" />
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block"><a href="#"
                            style="color: white">Ajukan</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->

<!-- Modal jadwalkan pendampingan -->
<div class="modal fade" id="modal-jadwalkan-pendampingan" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Pilih Opsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kepolisian</label>
                </div>
                <div class="form-group">
                    <label for="">Tatap Muka</label>
                </div>
                <div class="form-group">
                    <label for="">Mediasi</label>
                </div>
                <div class="form-group">
                    <label for="">Lainnya</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                        placeholder="Sertakan opsi lainnya" />
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block"><a href="#"
                            style="color: white">Ajukan</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->

<!-- Modal Akhiri sesi-->
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
@endsection