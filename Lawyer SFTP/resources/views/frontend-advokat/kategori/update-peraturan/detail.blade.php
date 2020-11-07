@extends('frontend-advokat.layouts.app-putih')

@section('css')
<style>
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #fff;
    }

    .table-active {
        background: #fffefe60
    }

    .badge-info {
        color: #2F88FC;
        background: #dde8f7;
    }
</style>
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Update Peraturan</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($detail_peraturan as $p)
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <div class="card" data-toggle="modal" id="dataCard" data-target="#modal-detail-peraturan-{{$p->id}}">
                    <div class="card-body">
                        <div class="col-12 py-2">
                            <small class="text-danger">{{$p->nomer}}</small>
                            <p class="text-uppercase mb-0">{{$p->judul}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection


@section('modal')
@foreach ($detail_peraturan as $m)
<div class="modal fade" id="modal-detail-peraturan-{{$m->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="padding: 16px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Peraturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-bold text-uppercase "> {{$m->judul}}</h5>
                <div class="mb-3">
                    <small class="text-danger ">{{$m->nomer}}</small>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-bordered table-sm" style="font-size: 15px" >
                        <tbody>
                            <tr class="table-danger">
                                <th class="px-3">Jenis Peraturan</th>
                                <td class="px-3">{{$m->jenis}}</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Institusi</th>
                                <td class="px-3">{{$m->instansi}}</td>
                            </tr>
                            <tr class="table-danger">
                                <th class="px-3">Tanggal Ditetapkan</th>
                            <td class="px-3" id="id">{{date(' d F Y', strtotime($m->tgl_ditetapkan))}}</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Nomor BN</th>
                                <td class="px-3">{{$m->no_bn}}</td>
                            </tr>
                            <tr class="table-danger">
                                <th class="px-3">Nomor TBN</th>
                                <td class="px-3">{{$m->no_tbn ??'-'}}</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Tanggal Diterbikan</th>
                                <td class="px-3">{{date(' d F Y', strtotime($m->tgl_diundingkan))}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <?php
                $file = json_decode($m->file);
                $files = $file??[];
                ?>  
                <small>Lampiran</small>
                @foreach($files as $s)
                <a class=" mb-2 text-dark" href="{{asset($s)}}">
                <div class="row no-gutters mt-2">
                    <div class="badge badge-info m-2">
                        <div class="col-lg-auto ">
                            <i class="fa fa-file-pdf p-3" style="font-size: 60px"></i>
                            <div class="row d-flex justify-content-center">
                            download
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection


@section('js')
@endsection