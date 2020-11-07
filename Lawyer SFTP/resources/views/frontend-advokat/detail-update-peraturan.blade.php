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
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <div class="card" data-toggle="modal" data-target="#modal-detail-peraturan">
                    <div class="card-body">
                        <div class="col-12 py-2">
                            <small class="text-danger">Perpres No.1 Tahun 2020</small>
                            <p class="text-uppercase mb-0">Uji Kompetisi bagi pegawai negeri sipil pada kementrian agama
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <div class="card" data-toggle="modal" data-target="#modal-detail-peraturan">
                    <div class="card-body">
                        <div class="col-12 py-2">
                            <small class="text-danger">Perpres No.1 Tahun 2020</small>
                            <p class="text-uppercase mb-0">Uji Kompetisi bagi pegawai negeri sipil pada kementrian agama
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <div class="card" data-toggle="modal" data-target="#modal-detail-peraturan">
                    <div class="card-body">
                        <div class="col-12 py-2">
                            <small class="text-danger">Perpres No.1 Tahun 2020</small>
                            <p class="text-uppercase mb-0">Uji Kompetisi bagi pegawai negeri sipil pada kementrian agama
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 py-3" style="width: 100%; border: none">
                <div class="card" data-toggle="modal" data-target="#modal-detail-peraturan">
                    <div class="card-body">
                        <div class="col-12 py-2">
                            <small class="text-danger">Perpres No.1 Tahun 2020</small>
                            <p class="text-uppercase mb-0">Uji Kompetisi bagi pegawai negeri sipil pada kementrian agama
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection


@section('modal')
<div class="modal fade" id="modal-detail-peraturan" tabindex="-1" role="dialog"
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
                <h5 class="font-weight-bold text-uppercase "> Penyelenggaraan layanan rehabilitasi pada lembaga
                    rehabilitasi di lingkungan badan narkotika nasional</h5>
                <div class="mb-3">
                    <small class="text-danger ">No. 1 Tahun 2020</small>
                </div>
                <div class="table-responsive-md">
                    <table class="table table-bordered table-sm" style="font-size: 15px">
                        <tbody>
                            <tr class="table-danger">
                                <th class="px-3">Jenis Peraturan</th>
                                <td class="px-3">Peraturan Lembaga Pemerintah Non Kementrian</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Institusi</th>
                                <td class="px-3">Badan Narkotika Nasional</td>
                            </tr>
                            <tr class="table-danger">
                                <th class="px-3">Tgl Ditetapkan</th>
                                <td class="px-3">2019-01-23</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Nomor BN</th>
                                <td class="px-3">48</td>
                            </tr>
                            <tr class="table-danger">
                                <th class="px-3">Nomor TBN</th>
                                <td class="px-3">-</td>
                            </tr>
                            <tr class="table-active">
                                <th class="px-3">Tgl Diundingkan</th>
                                <td class="px-3">2019-01-23</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <small>Lampiran</small>
                <div class="row no-gutters mt-2">
                    <div class="badge badge-info m-2">
                        <div class="col-lg-auto ">
                            <i class="fa fa-file-pdf p-3" style="font-size: 60px"></i>
                            <div class="row d-flex justify-content-center">
                                <a class=" mb-2 text-dark ">download</a>
                            </div>
                        </div>
                    </div>
                    <div class="badge badge-info m-2">
                        <div class="col-lg-auto">
                            <i class="fa fa-file-pdf p-3" style="font-size: 60px"></i>
                            <div class="row d-flex justify-content-center">
                                <a class=" mb-2 text-dark ">download</a>
                            </div>
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