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
                <h2 class="mb-5">Pertemuan</h2>
            </div>
        </div>

        @if ($pertemuan->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_belum_ada_pendampingan.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Pertemuan</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        @foreach($pertemuan as $p)
        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-pertemuan-{{$p->id}}">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="row justify-content-center">
                                        @if($p->lawyer->avatar == '')
                                        <img src="{{url('public/avatar-default1.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                        @else
                                        <img src="{{asset($p->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                        @endif
                                        <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                                    </div>
                                </div>
                                <div class="col-md-7 pl-0">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$p->lawyer->nama_lengkap}}</h5>
                                        <h6 class="text-info">
                                            @if($p->status== 'WAITING')
                                            Menunggu Advokat
                                            @elseif($p->status =='CONFIRM')
                                            Disetujui Advokat
                                            @elseif($p->status =='TOLAK')
                                            Ditolak Advokat
                                            @elseif($p->status =='PAID')
                                            Sudah Dibayar
                                            @elseif($p->status =='WAITING_PAYMENT')
                                            Menunggu Pembayaran
                                            @else
                                            {{$p->status}}
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-3 my-auto">
                                    <p class="card-text text-muted">{{date('d F Y ', strtotime($p->created_at))}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="row card-body">
                                <div class="col mx-auto my-auto">
                                    <p class="card-title" style="color: black;">
                                        @if ($p['konsultasi']->service_id == 0)
                                        <p class="m-0 text-dark pl-2">Pertemuan Probono </p>
                                        @else
                                        <p class="m-0 text-dark pl-2">Pertemuan {{$p['konsultasi']->service['nama']}}</p>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </a>
        </div>
        @endforeach
        @endif

    </div>
</section>
@endsection

@section('modal')
<!-- Modal -->

@foreach($pertemuan as $p)
<div class="modal fade" id="modal-pertemuan-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pertemuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                @if($p->lawyer->avatar == '')
                                <img src="{{url('public/avatar-default1.png')}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;">
                                @else
                                <img src="{{asset($p->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                                @endif
                                <!-- <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="..."> -->
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold m-0">{{$p->lawyer->nama_lengkap}}</h5>
                                    <p class="card-text"><small class="text-muted">{{date('d F Y ', strtotime($p->created_at))}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Pengajuan</h5>
                        <p class="text-danger" style="float: right;">#PNSF32423CX2319</p>
                        <p class="card-text m-0">Kategori</p>
                        @if ($p['konsultasi']->service_id == 0)
                        <p class="card-text font-weight-bold">Pertemuan Probono </p>
                        @else
                        <p class="card-text font-weight-bold">Pertemuan {{$p['konsultasi']->service['nama']}}</p>
                        @endif
                        <p class="card-text m-0">Status</p>
                        <h5 class="card-text">
                            @if($p->status== 'WAITING')
                            Menunggu Advokat
                            @elseif($p->status =='CONFRIM')
                            Disetujui Advokat
                            @elseif($p->status =='TOLAK')
                            Ditolak Advokat Dengan Alasan "{{$p->alasan_tolak}}"
                            @elseif($p->status =='PAID')
                            Sudah Dibayar
                            @else
                            {{$p->status}}
                            @endif
                        </h5>
                    </div>
                </div>

                <!-- <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Detail Tagihan</h5>
                        <p class="card-text m-0">Total Tagihan</p>
                        <h5 class="card-text font-weight-bold">@rupiah($p->amount)</h5>
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
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('js')
@endsection