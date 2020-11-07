@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
    <div class="container mt-5 pt-5 ">
        <nav>
            <div class="nav nav-tabs mt-5" id="nav-tab">
                <a class="nav-item nav-link active font-weight-bold" id="nav-konsultasi-tab" data-toggle="tab" href="#nav-konsultasi" role="tab" style="width: 50%; ">Konsultasi</a>
                <a class="nav-item nav-link font-weight-bold" id="nav-tagihan-tab" data-toggle="tab" href="#nav-tagihan" role="tab" style="width: 50%;">Tagihan</a>
            </div>
        </nav>
        <div class="tab-content  " id="nav-tabContent">
            <!-- content Konsultasi -->
            <div class="tab-pane fade show active py-5  bg-white " id="nav-konsultasi" role="tabpanel">
                <div class=" mx-3 my-2">
                    <div class="card mx-auto  p-3 mt-4 mb-5 " style="max-width: auto;" data-toggle="modal" data-target="#modal-konsultasi">
                        <div class="row card-body py-0">
                            <div class="col-lg col-md col-sm ">
                                <div class="row justify-content-center">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                                <div class="card-body pb-0">
                                    <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                    <p class="text-danger">Sedang berjalan</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4  my-auto ">
                                <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                            </div>
                            <div class="row card-body pb-0">
                                <p class="m-0 text-dark pl-2">Pendampingan Personal Injury</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mx-3 my-2">
                    <div class="card mx-auto  p-3 mt-4 mb-5 " style="max-width: auto;" data-toggle="modal" data-target="#modal-konsultasi-kosong">
                        <div class="row card-body py-0">
                            <div class="col-lg col-md col-sm ">
                                <div class="row justify-content-center">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                                <div class="card-body pb-0">
                                    <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                    <p class="text-danger">Sedang berjalan</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4  my-auto ">
                                <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                            </div>
                            <div class="row card-body pb-0">
                                <p class="m-0 text-dark pl-2">Pendampingan Personal Injury</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mx-3 my-2">
                    <div class="card mx-auto  p-3 mt-4 mb-5 " style="max-width: auto;" data-toggle="modal" data-target="#modal-konsultasi-kosong">
                        <div class="row card-body py-0">
                            <div class="col-lg col-md col-sm ">
                                <div class="row justify-content-center">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                                <div class="card-body pb-0">
                                    <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                    <p class="text-danger">Sedang berjalan</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4  my-auto ">
                                <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                            </div>
                            <div class="row card-body pb-0">
                                <p class="m-0 text-dark pl-2">Pendampingan Personal Injury</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content tagihan -->
            <div class="tab-pane fade bg-white py-5  " id="nav-tagihan" role="tabpanel">
                <div class="mx-3 my-2">
                    <div class="card mx-auto   mt-4 mb-5 bg-white " style="max-width: auto;">
                        <div class="row card-body">
                            <div class="col-lg-10 col-md-10 col-sm-9 ">
                                <h4 class="m-0">Rp. 500.000</h4>
                                <small><strong>Tagihan Layanan Member</strong></small>
                                <p class="m-0 pt-2 text-danger">Menunggu Pembayaran</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 ">
                                <small class="text-muted  d-flex flex-row-reverse">3 Agustus 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" mx-3 my-2">
                    <div class="card mx-auto   mt-4 mb-5 bg-white " style="max-width: auto;">
                        <div class="row card-body">
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <h4 class="m-0">Rp. 500.000</h4>
                                <small><strong>Tagihan Layanan Member</strong></small>
                                <p class="m-0 pt-2 text-danger">Menunggu Pembayaran</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 ">
                                <small class="text-muted  d-flex flex-row-reverse">3 Agustus 2020</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-3 my-2">
                    <div class="card mx-auto   mt-4 mb-5 bg-white " style="max-width: auto;">
                        <div class="row card-body">
                            <div class="col-lg-10 col-md-10 col-sm-9 ">
                                <h4 class="m-0">Rp. 500.000</h4>
                                <small><strong>Tagihan Layanan Member</strong></small>
                                <p class="m-0 pt-2 text-danger">Menunggu Pembayaran</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <small class="text-muted  d-flex flex-row-reverse">3 Agustus 2020</small>
                            </div>
                        </div>
                    </div>
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
                                <button type="button" class="btn" data-toggle="modal" data-target="#modal-detail-konsultasi"><i class="fa fa-info-circle"
                                        style="font-size: 1.5rem;"></i></button>
                                <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5rem;">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-somasi">Tambahkan
                                        Report</a>
                                    <a class="dropdown-item" href="{{url('advokat/video-conference')}}">Video Conference</a>
                                    <a class="dropdown-item" href="{{url('advokat/tertulis')}}">Layanan Tertulis</a>
                                    <a class="dropdown-item" href="{{url('advokat/pendampingan')}}">Jadwal pendampingan</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan Sesi</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan Konsultasi</a>
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
                                <div class="row mb-3 px-3">
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
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="img-msg">
                                    </div>
                                    <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                        <div class="card shadow-none p-3  bg-light">
                                            <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts, and discover plugins for your favorite writing, design and blogging tools.</p>
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
                                            <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts, and discover plugins for your favorite writing, design and blogging tools.</p>
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
                                    <div class="incoming_msg_img"> <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="img-msg">
                                    </div>
                                    <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                        <div class="card shadow-none p-3  bg-light">
                                            <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts, and discover plugins for your favorite writing, design and blogging tools.</p>
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
                                            <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use in your graphic,print and web layouts, and discover plugins for your favorite writing, design and blogging tools.</p>
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
                                                <i class="fa fa-paperclip text-danger d-flex justify-content-center" style="font-size: 1.5rem;z-index: 2;"></i>
                                            </div>
                                            <div class="col-lg-10 col-sm-10 col-xs-8 col-8 px-0" style="width:max-content">
                                                <input type=" text " class="write_msg " placeholder="Tulis Pesan " />
                                            </div>
                                            <div class="col-lg-1 col-sm-1 col-xs-2 col-2 my-auto  ">
                                                 <button class="msg_send_btn " type="button ">
                                                     <i class="fa fa-paper-plane  px-auto"aria-hidden="true "></i>
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
    <!-- modal detail konsultasi -->
    <div class="modal fade" id="modal-detail-konsultasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- content -->
                    <div class="mb-3" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col-md-3 mx-auto my-auto">
                                    <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle " style="height: 100px; width: 100px;" alt="...">
                                </div>
                                <div class="col-md">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Freza Ade Nugraha</h5>
                                        <p class="card-text"><small class="text-muted">1 Agustus 2020 15.00 WIB</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" style="max-width: auto;">
                        <div class="row  align-items-center  mb-2 mt-2">
                            <h5 class="font-weight-bold mx-auto">
                                Detail Konsultasi
                            </h5>
                        </div>
                        <div class="col mb-2">
                            <small class="row  font-weight-bold justify-content-end" style="color: #FF2424;">#PNSF24356OP89JK</small>
                            <p class="my-auto text-secondary">Bidang Hukum</p>
                            <h6 class="font-weight-bold mx-auto mb-3">
                                Perceraian
                            </h6>
                        </div>
                        <div class="col mb-2">
                            <p class="my-auto  text-secondary "> Pengajuan Konsultasi</p>
                            <h6 class="font-weight-bold mx-auto  mb-3 ">
                                Rabu, 5 Agustus 2020; 19:30 WIB
                            </h6>
                        </div>
                        <div class="col mb-2 ">
                            <p class="my-auto  text-secondary">Status</p>
                            <h6 class="font-weight-bold mx-auto   mb-3">
                                Sedang Berlangsung
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal somasi -->
    <div class="modal fade" id="modal-somasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAppointment">Buat Somasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Judul</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" style="line-height: 1.5;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Lampiran (Maks 3 File)</label>
                        <form action="/file-upload" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </form>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block"><a href="#"
                                style="color: white;">Kirim</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal setuju-->
    <div class="modal fade" id="modal-akhiri-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document ">
            <div class="modal-content ">
                <div class="modal-body mx-3 ">
                    <div class="row justify-content-center ">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/setuju.png " style="width: 40%; ">
                    </div>
                    <div class="row justify-content-center ">
                        <p class="font-weight-bold my-3 ">Apakah Layanan Ini Sudah Selesai ?</p>
                        <small style="text-align:center;">Terimakasih Sudah menggunakan legal Pocket dan Mohon
                            Feedbacknya di Akhir Sesi Ini</small>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-sm ">
                            <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2 " data-dismiss="modal">Batal</button>
                        </div>
                        <div class="col-sm ">
                            <button type="button " class="btn btn-primary btn-block font-weight-bold my-2 ">Selesaikan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal batal-->
    <div class="modal fade" id="modal-batal-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document ">
            <div class="modal-content ">
                <div class="modal-body mx-3 ">
                    <div class="row justify-content-center ">
                        <img src="{{url('public/plugins/fronted-advokat')}}/images/tolak.png " style="width: 40%; ">
                    </div>
                    <div class="row justify-content-center ">
                        <p class="font-weight-bold ">Apakah Anda Ingin Membatalkan Kasus?</p>
                    </div>
                    <div class="form-group ">
                        <label for="appointment_message " class="text-black ">ALASAN PEMBATALAN</label>
                        <textarea name=" " id="appointment_message " class="form-control " cols="30 " rows="5 " placeholder="alasan pembatalan"></textarea>
                    </div>
                    <div class=" form-group ">
                        <div class="row ">
                            <div class="col-sm ">
                                <button type="button " class="btn btn-outline-danger btn-block font-weight-bold my-2 " data-dismiss="modal">Batal</button>
                            </div>
                            <div class="col-sm ">
                                <button type="button " class="btn btn-primary btn-block font-weight-bold my-2 ">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection