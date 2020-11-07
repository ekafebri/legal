@extends('frontend-client.layouts.app-putih')

@section('css')

@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row"></div>
        <div class="row justify-content-center pb-3">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2 class="mb-5">Riwayat</h2>
            </div>
        </div>

        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">

                <ul class="nav nav-tabs ">
                    <li class="col-4 nav-item ">
                        <a class="nav-link font-weight-bold btn btn-outline-danger" href="#konsultasi" id="btn-konsultasi">Konsultasi</a>
                    </li>
                    <li class="col-4 nav-item">
                        <a class="nav-link font-weight-bold btn btn-outline-danger" href="#pertanyaan" id="btn-pertanyaan">Pertanyaan</a>
                    </li>
                    <li class="col-4 nav-item">
                        <a class="nav-link font-weight-bold btn btn-outline-danger" href="#pembayaran" id="btn-pembayaran">Pembayaran</a>
                    </li>
                </ul>
            </div>
        </div>
        <br>

        <div class="row justify-content-center" id="div-konsultasi">
            @if ($konsultasi->isEmpty())
            <div class="row justify-content-center ftco-animate">
                <div class="col-sm m-5 ">
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_pertanyaan_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                    <div class="row justify-content-center">
                        <div class="col-sm-5 my-3">
                            <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Konsultasi</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @foreach ($konsultasi as $k)
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-konsultasi">
                    <div class="card mx-auto shadow p-0 mb-3 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class=" row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        @if($k->lawyer->avatar == '')
                                        <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                        @else
                                        <img src="{{asset($k->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                        @endif
                                        <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title ">{{$k->lawyer->nama_lengkap}}</h5>
                                        <h6 class="card-text text-danger">@if ($k->status == 'ON_GOING')
                                            Sedang Berjalan
                                            @elseif($k->status == 'CANCEL_CLIENT')
                                            Konsultasi Dibatalkan
                                            @elseif($k->status == 'FINISH_CLIENT'||'FINISH')
                                            Konsultasi Selesai
                                            @else
                                            {{$k->status}}
                                            @endif</h6>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <p class="card-text text-muted text-center">{{date('d F Y ', strtotime($k->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body pt-0">
                                <div class="col mx-auto my-auto">
                                    <p class="card-title mt-0">Layanan {{$k->service['nama']}}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>

        <div class="row" id="div-pertanyaan">
            @if ($pertanyaan->isEmpty())
            <div class="row justify-content-center  ftco-animate">
                <div class="col-sm m-5 ">
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_pertanyaan_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                    <div class="row justify-content-center">
                        <div class="col-sm-5 my-3">
                            <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Pertanyaan</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @foreach($pertanyaan as $p)
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-pertanyaan">
                    <div class="card mx-auto shadow p-0 mb-3 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class=" row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        @if($p->user->avatar == '')
                                        <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                        @else
                                        <img src="{{asset($p->user->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                        @endif
                                        <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title m-0">{{$p->user->nama_lengkap}}</h5>
                                        <p class="card-text text-muted">{{date(' d M Y  H:i', strtotime($p->created_at))}} WIB</p>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h3 class="card-text text-danger">@rupiah($p->budget)
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body pt-0">
                                <div class="col mx-auto my-auto">
                                    <p class="card-title mt-0">Kategori : {{$p->kategori_layanan}}</p>
                                    <p class="shadow-none p-3 mb-0 bg-light rounded"> {{$p->judul_pertanyaan}}
                                    </p>
                                    <p class="text-info mt-2" style="float: right;">{{count($p->jawaban)}} Lawyer Menjawab</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>

        <div class="row justify-content-center" id="div-pembayaran">
            @if ($pembayaran->isEmpty())
            <div class="row justify-content-center  ftco-animate">
                <div class="col-sm m-5 ">
                    <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_invoice_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                    <div class="row justify-content-center">
                        <div class="col-sm-5 my-3">
                            <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Pembayaran</h5>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @foreach($pembayaran as $t)
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-invoice">
                    <div class="card mx-auto shadow p-3 mb-5 bg-white rounded" style="max-width: auto;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 my-auto">
                                    <h2 class="card-title">@rupiah($t->amount)</h2>
                                    <p class="card-title font-weight-bold">Tagihan
                                        @if ($t->type ='MEMBERSHIP')
                                        Pengajuan Member
                                        @else
                                        {{$t->type}}
                                        @endif</p>
                                    <p class="text-danger"> @if ($t->status =='PAID')
                                        Sudah Dibayar
                                        @else
                                        Menunggu Pembayaran
                                        @endif</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="card-text text-muted text-center">20 Agustus 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection

@section('modal')
<!-- Modal -->
<!-- Modal konsultasi -->
@foreach($konsultasi as $k)
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
                            <button type="button" class="btn" data-toggle="modal" data-target="#modal-detail-konsultasi-{{$k->id}}"><i class="fa fa-info-circle" style="font-size: 1.5rem;"></i></button>
                            <button type="button" class="btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5rem;">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-video-conference">Video Conference</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-layanan-tertulis">Layanan Tertulis</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-jadwalkan-pendampingan">Jadwal pendampingan</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-akhiri-sesi">Selesaikan Sesi</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#modal-batal-sesi">Batalkan Konsultasi</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <!-- content -->
                <div class="row">

                    <div class="mesgs mb-2" style="width: max-content;">
                        <div class="msg_history p-2">
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="img-msg">
                                </div>
                                <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3  bg-light">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use
                                            in your graphic,print and web layouts, and discover plugins for your
                                            favorite writing, design and blogging tools.</p>
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
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use
                                            in your graphic,print and web layouts, and discover plugins for your
                                            favorite writing, design and blogging tools.</p>
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
                                <div class="incoming_msg_img"> <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="img-msg">
                                </div>
                                <div class="received_msg col-lg-8 col-md-8 col-sm-8 col-10">
                                    <div class="card shadow-none p-3  bg-light">
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use
                                            in your graphic,print and web layouts, and discover plugins for your
                                            favorite writing, design and blogging tools.</p>
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
                                        <p style="font-size: medium;"> Generate Lorem Ipsum placeholder text for use
                                            in your graphic,print and web layouts, and discover plugins for your
                                            favorite writing, design and blogging tools.</p>
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
                                        <div class="col-lg-9 col-sm-9 col-xs-7 col-7 px-0" style="width:max-content">
                                            <input type=" text " class="write_msg " placeholder="Tulis Pesan " />
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-xs-3 col-3 my-auto d-flex justify-content-center">
                                            <button class="msg_send_btn " type="button ">
                                                <i class="fa fa-paper-plane " aria-hidden="true "></i></button></div>
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
@endforeach
<!-- // -->

<!-- modal detail konsultasi -->
@foreach($konsultasi as $k)
<div class="modal fade" id="modal-detail-konsultasi-{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                @if($k->lawyer->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                @else
                                <img src="{{asset($k->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                @endif
                                <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">{{$k->lawyer->nama_lengkap}}</h5>
                                    <p class="card-text"><small class="text-muted">{{date('d F Y ', strtotime($k->created_at))}} WIB</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Konsultasi</h5>
                        <p class="text-danger" style="float: right;">#PNSF32423CX2319</p>
                        <p class="card-text m-0">Kategori</p>
                        <h5 class="card-text">Layanan {{$k->service['nama']}}</h5>
                        <br>
                        <p class="card-text m-0">Tanggal & Waktu Video Conference</p>
                        <h5 class="card-text">Rabu, 5 Agustus 2020 19.30 WIB</h5>
                        <br>
                        <p class="card-text m-0">Status</p>
                        <h5 class="card-text"> @if ($k->status == 'ON_GOING')
                            Sedang Berjalan
                            @elseif($k->status == 'CANCEL_CLIENT')
                            Konsultasi Dibatalkan
                            @elseif($k->status == 'FINISH_CLIENT'||'FINISH')
                            Konsultasi Selesai
                            @else
                            {{$k->status}}
                            @endif</h5>
                        <!-- 
                            <div class="alert alert-danger" role="alert">
                                <i class="icon-warning"></i>
                                <span class="col-md-3 ml-auto">Link pertemuan akan dikirimkan setelah anda melakukan
                                    proses pembayaran</span>
                            </div> -->
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Tagihan</h5>
                        <p class="card-text m-0">Total Tagihan</p>
                        <h5 class="card-text font-weight-bold">Rp 300.000,00</h5>
                        <br>
                        <p class="card-text m-0">Nomor Tagihan</p>
                        <button type="button" class="btn text-white rounded my-auto" style="background-color: #FF2424; float: right;">Salin</button>

                        <h5 class="text-danger">123dhdjbjf</h5>
                        <br>
                        <p class="card-text m-0">Ketentuan Pembayaran</p>
                        <p class="card-text m-0">1. Pilih Menu Lain > Transfer</p>
                        <p class="card-text m-0">2. Pilih jenis rekening asal dan pilih Virtual Account Billing</p>
                        <p class="card-text m-0">3. Masukan nomor Virtual Account (123dhdjbjf) dan pilih Benar</p>
                        <p class="card-text m-0">4. Tagihan yang harus dibayar akan muncul pada layar konfirmasi</p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- // -->

<!-- modal video conference -->
<div class="modal fade" id="modal-video-conference" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Video Conference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/icon-lawyer-video-confrence.png" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Video Conference</h5>
                                    <p class="card-text text-danger mt-0">Rp 300.000 per jam
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NAMA</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">EMAIL</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">AGENDAKAN WAKTU</label>
                    <input type="date" class="form-control" id="exampleInputPassword1">
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
                    <button type="button" class="btn btn-primary btn-block"><a href="#" style="color: white;">Ajukan</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->

<!-- Modal layanan tertulis -->
<div class="modal fade" id="modal-layanan-tertulis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Pilih Opsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="font-size: 16px;">
                    <div class="col" style="color: black;">
                        <button type="button" class="btn btn-light btn-block">Somasi</button>
                        <button type="button" class="btn btn-light btn-block">Legal Opinion</button>
                        <button type="button" class="btn btn-light btn-block">Romandum</button>
                        <button type="button" class="btn btn-light btn-block">Lainnya</button>
                    </div>

                </div>
                <!-- <div class="form-group">
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
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sertakan opsi lainnya">
                </div> -->
                <div class="row">
                    <button type="button" class="btn btn-primary btn-block"><a href="#" style="color: white;">Ajukan</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->

<!-- Modal jadwalkan pendampingan -->
<div class="modal fade" id="modal-jadwalkan-pendampingan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppointment">Pilih Opsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="font-size: 16px;">
                    <div class="col" style="color: black;">
                        <button type="button" class="btn btn-light btn-block">Kepolisian</button>
                        <button type="button" class="btn btn-light btn-block">Tatap Muka</button>
                        <button type="button" class="btn btn-light btn-block">Mediasi</button>
                        <button type="button" class="btn btn-light btn-block">Lainnya</button>
                    </div>

                </div>
                <!-- <div class="form-group">
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
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Sertakan opsi lainnya">
                </div> -->
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block"><a href="#" style="color: white;">Ajukan</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // -->
<!-- Modal setuju-->
<div class="modal fade" id="modal-akhiri-sesi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content ">
            <div class="modal-body mx-3 ">
                <div class="row justify-content-center ">
                    <img src="{{url('public/plugins/frontend')}}/images/icon/ic-lawyer-selesai.png" style="width: 40%; ">
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
                    <img src="{{url('public/plugins/frontend')}}/images/icon/ic-lawyer-batal.png" style="width: 40%; ">
                </div>
                <div class="row justify-content-center ">
                    <p class="font-weight-bold ">Apakah Anda Ingin Membatalkan Kasus?</p>
                </div>
                <div class="form-group ">
                    <label for="appointment_message " class="text-black ">ALASAN PEMBATALAN</label>
                    <textarea name=" " id="appointment_message " class="form-control " cols="30 " rows="5 " placeholder="Alasan Pembatalan"></textarea>
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

<!-- Modal pertanyaan-->
<div class="modal fade" id="modal-pertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
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

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Sengketa Tanah Desa</h5>
                        <p class="text-info">Rp 800.000</p>
                        <br>
                        <h5 class="card-text text-danger m-0">Pertanyaan</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione libero
                            distinctio tenetur, aperiam quae similique illum ex aut natus sed enim, blanditiis,
                            magni officiis cumque iste dolores? Voluptatem, unde alias.</p>
                        <br>
                        <h5 class="card-text text-danger m-0">Penjelasan</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi totam
                            magnam debitis rem laboriosam, repellendus natus vero quas esse. Ducimus fugit
                            aspernatur id praesentium eius ipsam accusamus illo explicabo corrupti.</p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae
                            mollitia porro,
                            assumenda reiciendis deserunt alias rem iste ipsum? Exercitationem maxime fuga sunt
                            aliquam quod voluptas cupiditate provident doloribus eos totam?</p>
                        <br>
                        <h5 class="card-text m-0">Jawaban Dari Advokat</h5>
                        <p class="card-text text-info" style="float: right;">2/3 jawaban</p>
                        <br>
                        <div class="card col-md-12" style="max-width: auto;">
                            <div class="row no-gutters">
                                <div class="row justify-content-around card-body">
                                    <div class="col mx-auto my-auto">
                                        <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <h5 class="card-title font-weight-bold m-0">Andira Pramanta</h5>
                                            <p class="card-text"><small class="text-muted">20 Agustus 2020 15.00
                                                    WIB</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card-body">
                                    <p class="card-text">Saya berpengalaman menangani sengketa tanah perdesaan</p>
                                    <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Error voluptate ipsum ab! Ipsam rerum similique enim quod possimus corporis
                                        hic mollitia id quaerat. Assumenda porro beatae, ad ea eos hic!</p>
                                    <a href="#pembayaran" type="button" class="btn btn-primary btn-block">Konsultasi</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- // -->

<!-- Modal pembayaran-->
<div class="modal fade" id="modal-invoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
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

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Informasi</h5>
                        <p class="text-danger" style="float: right;">#PNSF32423CX2319</p>
                        <p class="card-text m-0">Layanan</p>
                        <h5 class="card-text">Pengajuan Somasi Perceraian</h5>
                        <br>
                        <p class="card-text m-0">Tanggal & Waktu Video Conference</p>
                        <h5 class="card-text">Rabu, 5 Agustus 2020 19.30 WIB</h5>
                        <br>
                        <p class="card-text m-0">Tagihan</p>
                        <h5 class="card-text">Rp 1.000.000</h5>
                        <br>
                        <p class="card-text m-0">Status</p>
                        <h5 class="card-text">Pilih Metode Pembayaran</h5>
                        <br>
                        <p class="card-text m-0">Catatan</p>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                            odit, tempora culpa sint natus harum necessitatibus quo ipsum architecto eius nemo unde
                            eos praesentium. Ipsa accusantium a accusamus fugiat praesentium?</p>

                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Metode Pembayaran</h5>
                        <select class="custom-select">
                            <option selected>Pilih Metode Pembayaran</option>
                            <option value="1"><i class="icon-credit-card">Credit Card</i></option>
                            <option value="2">Bank Transfer</option>
                            <option value="3">Indomart</option>
                        </select>
                        <br>
                        <br>
                        <a href="riwayat.html#pembayaran" type="button" class="btn btn-primary btn-block">Konfirmasi</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- // -->
<!-- // -->
@endsection
@section('js')
<script>
    $(window).on("load", function() {
        // $('#div-konsultasi').hide();
        // $('#div-pertanyaan').hide();
        // $('#div-pembayaran').hide();

        $('#div-konsultasi').show();
        $('#btn-konsultasi').attr('style', 'background-color: #dc3545');
        $('#btn-konsultasi').addClass("text-white");

        $('#div-pertanyaan').hide();
        $('#btn-pertanyaan').attr('style', false);
        $('#btn-pertanyaan').removeClass("text-white");

        $('#div-pembayaran').hide();
        $('#btn-pembayaran').attr('style', false);
        $('#btn-pembayaran').removeClass("text-white")
    });
</script>
@endsection