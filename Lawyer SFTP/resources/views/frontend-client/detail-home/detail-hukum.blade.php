@extends('frontend-client.layouts.app-putih')

@section('content')
<section class="ftco-section block-23"
    style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-4">{{ $bidang_hukum->nama }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="card" style="width: 100%">
                <div class="card-body2">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="dept_thumb">
                                <img src="{{ asset($bidang_hukum->gambar) }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="dept_info">
                                <p>
                                    {{ $bidang_hukum->deskripsi }}
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
                <h2 class="mb-2">ADVOKAT BIDANG {{ $bidang_hukum->nama }}</h2>
            </div>
        </div>
        <div class="card" style="border: none;">
            <div class="row no-gutters">
                @foreach($lawyer as $m)
                <div class="col-md-4 justify-content-center p-3">
                    <a href="{{url('client/detail_lawyer/'.$m->lawyer_id)}}">
                        <div class="card rounded shadow">
                            <div class="row">
                                <div class="col-lg-6">
                                    @if($m->avatar == '')
                                    <img src="{{url('public/avatar-default1.png')}}"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                    @else
                                    <img src="{{asset($m->avatar)}}"
                                        class="rounded d-block m-2" style="width: 10rem;height: 10rem; " alt="... ">
                                    @endif
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <h5 class="card-title p-2" style="text-align: left; color: #000;">
                                        {{$m->nama_lengkap}}
                                    </h5>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <p class="p-2" style="color: #000;">
                                    {{$m->deskripsi_layanan}}</p>
                            </div>
                            <div class="row no-gutters">
                                <a data-toggle="modal" data-target="#modal-pilih-konsultasi"
                                    class="btn btn-primary btn-lg btn-block m-2">Konsultasi</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection

@section('modal')
<!-- Modal Pilih Konsultasi -->
<div class="modal fade bottom" style="width: 100%; height: 100%;" id="modal-pilih-konsultasi" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class="col-7">
                        <p>Live Chat</p>
                        <p>Video Conference</p>
                    </div>
                    <div class="col-5">
                        <p>Free 1 jam</p>
                        <p>Rp.5.000.000 / jam</p>
                    </div>
                </div>


            </div>
            <!--Footer-->
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <a data-toggle="modal" data-target="#YukBayar" class="btn btn-primary btn-lg btn-block">Konsultasi</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

<!-- Modal Sesi Habis -->
<div class="modal fade bottom" style="width: 100%; height: 100%;" id="YukBayar" tabindex="-1" role="dialog"
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
            <div class="modal-body text-center">
                <img src="{{url('public/plugins/frontend')}}/images/habis.png" style="width: 100px; height: 100px;"
                    alt="">
                <h5>Sesi konsultasi gratis sudah habis</h5>
                <p>Lakukan pembayaran untuk melanjutkan konsultasi dengan advokat selanjutnya</p>
                <a data-toggle="modal" data-target="#modal-detail-konsultasi"
                    class="btn btn-primary btn-lg btn-block">Yuk Bayar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

{{-- Modal Detail Konsultasi --}}
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
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">Andira Pramanta</h5>
                                    <p class="card-text"><small class="text-muted">Kasus Perceraian</small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button type="button" class="btn btn-primary btn-block">Detail</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto; font-size: 14px;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Informasi pembayaran</h5>

                        <p class="card-text m-0">Nomor Tagihan</p>
                        <p class="card-text"><strong>202098039287</strong></p>

                        <p class="card-text m-0">Total Tagihan</p>
                        <p class="card-text"><strong>Rp. 265.950</strong></p>

                        <p class="card-text m-0">Status Tagihan</p>
                        <p class="card-text"><strong>Pilih Metode Pembayaran</strong></p>

                        <h5 class="card-title font-weight-bold">Metode pembayaran</h5>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Pilih Pembayaran</label>
                            <select class="form-control" id="exampleFormControlSelect2">
                                <option>Credit Card</option>
                                <option>Bank Transfer</option>
                                <option>Indomaret</option>

                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-block"><a href="#"
                                style="color: white;">Kirim</a>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection