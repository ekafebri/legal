@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Tagihan</h2>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class=" col-lg-12">
                <a href="#" data-toggle="modal" data-target="#modal-tagihan">
                    <div class="card mx-auto shadow p-3 mb-5 " style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col-lg col-md mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7  pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Freza Ade Nugraha</h5>
                                        <h6 class="text-info">Menunggu Pembayaran</h6>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3  my-auto">
                                    <p class="card-text text-muted">20 Agustus 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body">
                                <div class="col mx-auto my-auto">
                                    <h2>Rp 500.000</h2>
                                    <p class="card-title mb-0">Pengajuan Layanan Tertulis Somasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="col-lg-12">
                <a href="#" data-toggle="modal" data-target="#modal-tagihan">
                    <div class="card mx-auto shadow p-3 mb-5" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col-lg col-md  mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7  pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Freza Ade Nugraha</h5>
                                        <h6 class="text-info">Menunggu Pembayaran</h6>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 my-auto">
                                    <p class="card-text text-muted">20 Agustus 2020
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body">
                                <div class="col mx-auto my-auto">
                                    <h2>Rp 500.000</h2>
                                    <p class="card-title mb-0">Pengajuan Layanan Tertulis Somasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection