@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-4 font-weight-bold">Report</h2>
            </div>
        </div>
        @if ($report->isEmpty())
        <div class="row justify-content-center  ftco-animate">
            <div class="col-sm m-5 ">
                <img src="{{url('public/plugins/fronted-advokat')}}/images/icon/img_mpl_report_kosong.png"
                    alt="" class="d-block mx-auto" style="width: 30%; ">
                <div class="row justify-content-center">
                    <div class="col-sm-5 my-3">
                        <h5 class="font-weight-bold text-danger" style="text-align: center;">Tidak Ada</h5>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row ">
            {{-- <div class="card mx-3 mb-5 p-5" style="max-width: auto;">
                <div class="card-body" data-toggle="modal" data-target="#modal-report">
                    <h5 class="card-title font-weight-bold mb-0">Pembelaan Kasus Bully Versi 1</h5>
                    <p class="text-danger mb-0">29 Juli 2020</p>
                    <p class="card-text report">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>
            <div class="card mx-3 mb-3 p-5" style="max-width: auto;">
                <div class="card-body" data-toggle="modal" data-target="#modal-report">
                    <h5 class="card-title font-weight-bold mb-0">Pembelaan Kasus Bully Versi 1</h5>
                    <p class="text-danger mb-0">29 Juli 2020</p>
                    <p class="card-text report">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div> --}}
           
            @foreach ($report as $r)
            <div class="card mx-3 mb-3 p-5" style="max-width: auto;">
                <div class="card-body" data-toggle="modal" data-target="#modal-report-{{$r->id}}">
                    <h5 class="card-title font-weight-bold mb-0">{{$r->judul_report}}</h5>
                    <p class="text-danger mb-0">{{date('d F Y', strtotime($r->created_at))}}</p>
                    <p class="card-text report">
                        {{$r->penjelasan}}
                    </p>
                </div>
            </div>

            @endforeach
           
        </div>
        @endif
    </div>
</section>
@endsection

@section('modal')
<!-- Modal -->
@foreach ($report as $m)
<div class="modal fade" id="modal-report-{{$m->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content -->
                <div class="row no-gutters">
                    <div class="row justify-content-around card-body">
                        <div class="col mx-auto my-auto">
                            <img src="{{asset($m->client->avatar)}}" class="rounded-circle img-fluid"
                                style="height: 100px; width: 100px;" alt="...">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{$m->client->nama_lengkap}}</h5>
                                <p class="card-text"><small
                                        class="text-muted">{{date('d F Y  H:i ', strtotime($m->created_at))}}WIB</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{$m->judul_report}}</h5>
                    <p class="card-text">{{$m->penjelasan}}</p>
                </div>
                @if ($m->file=='')
                @else
                <?php
                    $m->file=Json_decode($m->file);
                    $no = 1;
                    ?>
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Lampiran</h5>
                    @foreach ($m->file as $item)
                    <p class="card-text">
                        <div class="alert alert-danger text-danger" role="alert">
                            <i class="icon-file-text"></i>
                        <a href="{{asset($item)}} ">
                            <span class="col-4 ml-auto">File report {{$no++}}
                            </span>
                            <i class="fa fa-download " style="float: right;"></i>
                        </a>
                        </div>
                    </p>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endforeach

@endsection


@section('js')
@endsection