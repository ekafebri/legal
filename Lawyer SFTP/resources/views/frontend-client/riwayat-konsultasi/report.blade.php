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
    <div class="overlay"> </div>
    <div class="container">
        <div class="row"></div>
        <div class="row justify-content-center pb-3">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2 class="mb-5">Laporan</h2>
            </div>
        </div>
        @if ($report->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_report_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada Report</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- @if ($report->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_report_kosong.png" alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else -->
        @foreach ($report as $r )
        <div class="card mx-3 mb-3 p-2" style="max-width: auto;">
            <div class="card-body" data-toggle="modal" data-target="#modal-report-{{$r->id}}">
                <h5 class="card-title font-weight-bold mb-1">{{$r->judul_report}}</h5>
                <p class="text-danger mb-1">{{date('d F Y', strtotime($r->created_at))}}</p>
                <p class="card-text report">
                    {{$r->penjelasan}}
                </p>
                <a href="detail.html">
                    <i class="icon-file text-danger"></i>
                    <span></span>
                </a>
                <a href="detail.html">
                    <i class="icon-download text-danger"></i>
                    <span></span>
                </a>
            </div>
        </div>

        <!-- <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a data-toggle="modal" data-target="#modal-report-{{$r->id}}">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="width: 70rem;">
                        <div class="row no gutters">
                            <div class="row justify-content-around card-body">
                                <div class="col mx-auto my-auto pr-0">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$r->judul_report}}</h4>
                                        <h6 class="card-subtitle mb-2 text-danger">{{date('d F Y', strtotime($r->created_at))}}</h6>
                                        <p class="card-text text-body mb-3">{{$r->penjelasan}}</p>
                                        <a href="detail.html">
                                            <i class="icon-file text-danger"></i>
                                            <span></span>
                                        </a>
                                        <a href="detail.html">
                                            <i class="icon-download text-danger"></i>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div> -->
        @endforeach
        @endif
        <!-- @endif -->
    </div>
</section>
@endsection

@section('modal')

<!-- Modal -->
@foreach ($report as $r)
<div class="modal fade" id="modal-report-{{$r->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content -->
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{asset($r->lawyer->avatar)}}" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{$r->lawyer->nama_lengkap}}</h5>
                                    <p class="card-text"><small class="text-muted">{{date('d F Y  H:i ', strtotime($r->created_at))}}WIB</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{$r->judul_report}}</h5>
                        <p class="card-text">{{$r->penjelasan}}</p>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Lampiran</h5>
                        <p class="card-text">
                            <div class="alert alert-danger" role="alert">
                                <i class="icon-file-text"></i>
                                <span class="col-md-3 ml-auto">File pembelian 1.docx</span>
                                <i class="icon-download" style="float: right;"></i>
                            </div>
                        </p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('js')
@endsection