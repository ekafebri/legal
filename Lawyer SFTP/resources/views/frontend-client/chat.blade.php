@extends('frontend-client.layouts.app-chat')

@section('css')
<link rel="stylesheet" href="{{url('public/plugins/frontend')}}/css/chat_konsultasi.css" />
@endsection

@section('content')
<div class="container-chat mt-5 pt-5">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="cari" />
                        </div>
                    </div>
                </div>

                <div class="inbox_chat scroll">
                    @foreach($konsultasi as $k)
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                                    class="img-msg" /></div>
                            <div class="chat_ib">
                                <h5>{{ $k->lawyer->nama_lengkap }}<span class="chat_date"></span></h5>
                                <p>{{ $k->chat }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_2.jpg"
                    class="img-msg" /></div>
                <div class="chat_ib">
                    <h5>Eko Renaldi</h5>
                    <p>Bagaimana perkembangan kasusku?</p>
                </div>
            </div>
        </div>
        <div class="chat_list">
            <div class="chat_people">
                <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_3.jpg"
                        class="img-msg" /></div>
                <div class="chat_ib">
                    <h5>Banu Nugra</h5>
                    <p>Saya terkena UU ITE, gimana nih?</p>
                </div>
            </div>
        </div>
        <div class="chat_list">
            <div class="chat_people">
                <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_4.jpg"
                        class="img-msg" /></div>
                <div class="chat_ib">
                    <h5>Baim Paris</h5>
                    <p>Saya mengalami pembullyan di kantor</p>
                </div>
            </div>
        </div>
        <div class="chat_list">
            <div class="chat_people">
                <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                        class="img-msg" /></div>
                <div class="chat_ib">
                    <h5>Andira Pramanta</h5>
                    <p>Gimana progressnya hari ini?</p>
                </div>
            </div>
        </div>
        <div class="chat_list">
            <div class="chat_people">
                <div class="chat_img"><img src="{{url('public/plugins/frontend')}}/images/person_2.jpg"
                        class="img-msg" /></div>
                <div class="chat_ib">
                    <h5>Eko Renaldi</h5>
                    <p>Gimana perkembangannya?</p>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<div class="mesgs mb-2">
    <div class="row mx-2 pt-2" style="border-bottom: 1px solid #c4c4c4">
        <div class="col-lg-6 col-md-6 col-sm-8 col-6 my-auto">
            <h5 class="font-weight-bold my-auto">Konsultasi</h5>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-4 col-6 d-flex justify-content-end">
            <button type="button" class="btn" data-toggle="modal" data-target="#modal-detail-konsultasi">
                <i class="fa fa-info-circle" style="font-size: 1.5rem"></i>
            </button>
            <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                style="font-size: 1.5rem">
                <i class="fa fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <a class="dropdown-item" data-toggle="modal" data-target="#modal-somasi">Tambahkan Report</a> -->
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-video-conference">Video
                    Conference</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-layanan-tertulis">Layanan
                    Tertulis</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-jadwalkan-pendampingan">Jadwal
                    pendampingan</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan
                    Sesi</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan
                    Konsultasi</a>
            </div>
        </div>
    </div>

    <div class="msg_history p-2">
        <div class="row mb-3 px-3">
            <div class="btn btn-info btn-block rounded" id="timer">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-12 my-auto text-left">
                        <small class="">anda dapat melakukan konsultasi gratis selama 1
                            jam</small>
                    </div>
                    <div class="col-lg col-md col-sm col-12 my-auto text-right">
                        <h4 class="font-weight-bold text-light ">59 : 40 : 20</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="incoming_msg">
            <div class="incoming_msg_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                    class="img-msg" /></div>
            <div class="received_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3 bg-light">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: left" class="text-muted"> 11:01 AM | June 9</small>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: right" class="text-muted"> 11:01 AM | June
                    9</small>
            </div>
        </div>

        <div class="incoming_msg">
            <div class="incoming_msg_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                    class="img-msg" /></div>
            <div class="received_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3 bg-light">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: left" class="text-muted"> 11:01 AM | June 9</small>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: right" class="text-muted"> 11:01 AM | June
                    9</small>
            </div>
        </div>
        <div class="incoming_msg">
            <div class="incoming_msg_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                    class="img-msg" /></div>
            <div class="received_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3 bg-light">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: left" class="text-muted"> 11:01 AM | June 9</small>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: right" class="text-muted"> 11:01 AM | June
                    9</small>
            </div>
        </div>
        <div class="incoming_msg">
            <div class="incoming_msg_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                    class="img-msg" /></div>
            <div class="received_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3 bg-light">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: left" class="text-muted"> 11:01 AM | June 9</small>
            </div>
        </div>
        <div class="outgoing_msg">
            <div class="sent_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: right" class="text-muted"> 11:01 AM | June
                    9</small>
            </div>
        </div>
        <div class="incoming_msg">
            <div class="incoming_msg_img"><img src="{{url('public/plugins/frontend')}}/images/person_1.jpg"
                    class="img-msg" /></div>
            <div class="received_msg col-lg-6 col-md-6 col-sm-8 col-10">
                <div class="card shadow-none p-3 bg-light">
                    <p style="font-size: medium">
                        Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts,
                        and discover plugins for your favorite
                        writing, design and blogging tools.
                    </p>
                    <div class="alert alert-danger py-0 text-danger col-12 mb-0">
                        <i class="fa fa-paperclip pr-3"></i>
                        <small class=""> File perlawanan 1.docx</small>
                    </div>
                </div>
                <small style="position: relative; float: left" class="text-muted"> 11:01 AM | June 9</small>
            </div>
        </div>
    </div>

    <div class="type_msg">
        <div class="col-md-12 mx-0">
            <div class="input_msg_write">
                <div class="row ">
                    <div class="col-lg-1  col-sm-1 col-xs-2 col-2 my-auto">
                        <i class="fa fa-paperclip text-danger d-flex justify-content-center"
                            style="font-size: 1.5rem;z-index: 2;"></i>
                    </div>
                    <div class="col-lg-10 col-sm-10 col-xs-8 col-7 px-0" style="width:max-content">
                        <input type=" text " class="write_msg " placeholder="Tulis Pesan " />
                    </div>
                    <div class="col-lg-1 col-sm-1 col-xs-2 col-2 my-auto  ">
                        <button class="msg_send_btn " type="button ">
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
@endsection

@section('modal')
<!-- modal detail konsultasi -->
<div class="modal fade" id="modal-detail-konsultasi" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content -->
                <div class="mb-3" style="max-width: auto">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col-md-3 mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_4.jpg" class="rounded-circle"
                                    style="height: 100px; width: 100px" alt="..." />
                            </div>
                            <div class="col-md">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Freza Ade Nugraha</h5>
                                    <p class="card-text"><small class="text-muted">1 Agustus 2020 15.00 WIB</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3" style="max-width: auto">
                    <div class="row align-items-center mb-2 mt-2">
                        <h5 class="font-weight-bold mx-auto">Detail Konsultasi</h5>
                    </div>
                    <div class="col mb-2">
                        <small class="row font-weight-bold justify-content-end"
                            style="color: #ff2424">#PNSF24356OP89JK</small>
                        <p class="my-auto text-secondary">Bidang Hukum</p>
                        <h6 class="font-weight-bold mx-auto mb-3">Perceraian</h6>
                    </div>
                    <div class="col mb-2">
                        <p class="my-auto text-secondary">Pengajuan Konsultasi</p>
                        <h6 class="font-weight-bold mx-auto mb-3">Rabu, 5 Agustus 2020; 19:30 WIB</h6>
                    </div>
                    <div class="col mb-2">
                        <p class="my-auto text-secondary">Status</p>
                        <h6 class="font-weight-bold mx-auto mb-3">Sedang Berlangsung</h6>
                    </div>
                </div>
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

<!-- Modal setuju-->
<div class="modal fade" id="modal-akhiri-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content">
            <div class="modal-body mx-3">
                <div class="row justify-content-center">
                    <img src="{{url('public/plugins/frontend')}}/images/setuju.png" style="width: 40%" />
                </div>
                <div class="row justify-content-center">
                    <p class="font-weight-bold my-3">Apakah Layanan Ini Sudah Selesai ?</p>
                    <small style="text-align: center">Terimakasih Sudah menggunakan legal Pocket dan Mohon Feedbacknya
                        di Akhir Sesi Ini</small>
                </div>
                <div class="row mb-3">
                    <div class="col-sm">
                        <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2"
                            data-dismiss="modal ">Batal</button>
                    </div>
                    <div class="col-sm">
                        <button type="button "
                            class="btn btn-primary btn-block font-weight-bold my-2">Selesaikan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal batal-->
<div class="modal fade" id="modal-batal-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-body mx-3">
                <div class="row justify-content-center">
                    <img src="{{url('public/plugins/frontend')}}/images/tolak.png" style="width: 40%" />
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
                            <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2"
                                data-dismiss="modal ">Batal</button>
                        </div>
                        <div class="col-sm">
                            <button type="button "
                                class="btn btn-primary btn-block font-weight-bold my-2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection