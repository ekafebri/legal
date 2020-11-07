@extends('frontend-client.layouts.app-putih')

@section('css')
<style>
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        content: "";
        opacity: 0.9;
        background: #fff;
        width: 100%;
        height: 100%;
    }
</style>
@endsection

@section('content')
<section class="ftco-section block-23" style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row"></div>
        <div class="row justify-content-center pb-3">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2 class="mb-5">Tagihan</h2>
            </div>
        </div>
        @if ($tagihan->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_invoice_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Tagihan</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach ($tagihan as $t)
        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-invoice-{{$t->id}}">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        @if($t->lawyer->avatar == '')
                                        <img src="{{url('public/avatar-default1.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                        @else
                                        <img src="{{asset($t->lawyer->avatar)}}" class="rounded-circle img-fluid" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                        @endif
                                        <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$t->lawyer->nama_lengkap}}</h5>
                                        <h6 class="text-info">
                                            @if ($t->status =='PAID')
                                            Sudah Dibayar
                                            @else
                                            Menunggu Pembayaran
                                            @endif

                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <!-- <p class="card-text text-muted">{{date('d F Y', strtotime($t->created_at))}} -->
                                    <h2 style="color:#FF2424;">@rupiah($t->amount)</h2>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body pt-0">
                                <div class="col mx-auto my-auto">
                                    <p class="card-title">
                                        Pengajuan Layanan
                                        @if ($t->type == 'VICON')
                                        Video Conference
                                        @elseif($t->type == 'LIVE_CHAT')
                                        Konsultasi
                                        @elseif($t->type == 'PENDAMPINGAN')
                                        Pendampingan
                                        @elseif($t->type == 'TERTULIS')
                                        somasi
                                        @elseif($t->type == 'PERTEMUAN')
                                        pertemuan
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @endif
        <!-- <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-invoice">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Andira Pramanta</h5>
                                        <h6 class="text-info">Menunggu Pembayaran</h6>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <p class="card-text text-muted">20 Agustus 2020 15.00 WIB
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body pt-0">
                                <div class="col mx-auto my-auto">
                                    <h2>Rp 500.000</h2>
                                    <p class="card-title">Pengajuan Layanan Tertulis Somasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div> -->

        <!-- <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-invoice">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Andira Pramanta</h5>
                                        <h6 class="text-info">Menunggu Pembayaran</h6>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <p class="card-text text-muted">20 Agustus 2020 15.00 WIB
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body pt-0">
                                <div class="col mx-auto my-auto">
                                    <h2>Rp 500.000</h2>
                                    <p class="card-title">Pengajuan Layanan Tertulis Somasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div> -->
    </div>
</section>
@endsection

@section('modal')
<!-- Modal -->
@foreach($tagihan as $t)
<div class="modal fade" id="modal-invoice-{{$t->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                @if($t->client->avatar == '')
                                <img src="{{url('public/avatar.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                @else
                                <img src="{{asset($t->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                @endif
                                <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">{{$t->lawyer->nama_lengkap}}</h5>
                                    <p class="card-text"><small class="text-muted">{{date(' d F Y  H:i', strtotime($t->created_at))}} WIB</small>
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
                        <h5 class="card-text"> Pengajuan Layanan
                            @if ($t->type == 'VICON')
                            Video Conference
                            @elseif($t->type == 'LIVE_CHAT')
                            Konsultasi
                            @elseif($t->type == 'PENDAMPINGAN')
                            Pendampingan
                            @elseif($t->type == 'TERTULIS')
                            somasi
                            @elseif($t->type == 'PERTEMUAN')
                            pertemuan
                            @endif</h5>
                        <br>
                        <p class="card-text m-0">Tanggal & Waktu Video Conference</p>
                        <h5 class="card-text">{{$t->tgl_pengajuan}}</h5>
                        <br>
                        <p class="card-text m-0">Status</p>
                        <h5 class="card-text">{{$t->status}}</h5>
                        <br>
                        <p class="card-text m-0">Catatan</p>
                        <h5 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                            odit, tempora culpa sint natus harum necessitatibus quo ipsum architecto eius nemo unde
                            eos praesentium. Ipsa accusantium a accusamus fugiat praesentium?</h5>


                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Tagihan</h5>
                        <p class="card-text m-0">Total Tagihan</p>
                        <h5 class="card-text font-weight-bold">@rupiah($t->amount)</h5>
                        <br>
                        <p class="card-text m-0">Nomor Tagihan</p>
                        <button type="button" class="btn text-white rounded my-auto" style="background-color: #FF2424; float: right;">Salin</button>

                        <h5 class="text-danger">{{$t->kode_pembayaran}}</h5>
                        <br>
                        <p class="card-text m-0">Ketentuan Pembayaran</p>
                        <p class="card-text m-0">1. Pilih Menu Lain > Transfer</p>
                        <p class="card-text m-0">2. Pilih jenis rekening asal dan pilih Virtual Account Billing</p>
                        <p class="card-text m-0">3. Masukan nomor Virtual Account (123dhdjbjf) dan pilih Benar</p>
                        <p class="card-text m-0">4. Tagihan yang harus dibayar akan muncul pada layar konfirmasi</p>

                    </div>
                </div>

            </div>
            <!-- <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <div class="col mx-auto my-auto">
                                    @if($t->lawyer->avatar == '')
                                    <img src="{{url('public/avatar-default1.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                    @else
                                    <img src="{{asset($t->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold m-0">{{$t->lawyer->nama_lengkap}}</h5>
                                        <p class="card-text"><small class="text-muted">{{date('d F Y ', strtotime($t->created_at))}}</small>
                                        </p>
                                    </div>
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
                        <h5 class="card-text"> Pengajuan Layanan
                            @if ($t->type == 'VICON')
                            Video Conference
                            @elseif($t->type == 'LIVE_CHAT')
                            Konsultasi
                            @elseif($t->type == 'PENDAMPINGAN')
                            Pendampingan
                            @elseif($t->type == 'TERTULIS')
                            somasi
                            @elseif($t->type == 'PERTEMUAN')
                            pertemuan
                            @endif</h5>
                        <br>
                        <p class="card-text m-0">Tanggal & Waktu Video Conference</p>
                        <h5 class="card-text">{{$t->tgl_pengajuan}}</h5>
                        <br>
                        <p class="card-text m-0">Status</p>
                        <h5 class="card-text">{{$t->status}}</h5>
                        <br>
                        <p class="card-text m-0">Catatan</p>
                        <h5 class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
                            odit, tempora culpa sint natus harum necessitatibus quo ipsum architecto eius nemo unde
                            eos praesentium. Ipsa accusantium a accusamus fugiat praesentium?</h5>


                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Tagihan</h5>
                        <p class="card-text m-0">Total Tagihan</p>
                        <h5 class="card-text font-weight-bold">@rupiah($t->amount)</h5>
                        <br>
                        <p class="card-text m-0">Nomor Tagihan</p>
                        <button type="button" class="btn text-white rounded my-auto" style="background-color: #FF2424; float: right;">Salin</button>

                        <h5 class="text-danger">{{$t->kode_pembayaran}}</h5>
                        <br>
                        <p class="card-text m-0">Ketentuan Pembayaran</p>
                        <p class="card-text m-0">1. Pilih Menu Lain > Transfer</p>
                        <p class="card-text m-0">2. Pilih jenis rekening asal dan pilih Virtual Account Billing</p>
                        <p class="card-text m-0">3. Masukan nomor Virtual Account (123dhdjbjf) dan pilih Benar</p>
                        <p class="card-text m-0">4. Tagihan yang harus dibayar akan muncul pada layar konfirmasi</p>

                    </div>
                </div>
            </div> -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- // -->
@endsection
@section('js')
@endsection