@extends('frontend-client.layouts.app-putih')

@section('css')
<style>
    hr {
        border-top: 1px solid #007bff;
        width: 70%;
    }

    a {
        color: #000;
    }

    .card {
        background-color: #ffffff;
        padding: 0;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.14), 0 1px 10px 0 rgba(0, 0, 0, 0.12), 0 2px 4px -1px rgba(0, 0, 0, 0.3);
    }

    .card:hover {
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
        color: black;
    }

    address {
        margin-bottom: 0px;
    }
</style>
@endsection

@section('content')
<section class="ftco-section block-23" style="background-image:url({{URL('/')}}/public/plugins/frontend/images/iklan_2.jpg)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-2">Update Peraturan</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($detail_peraturan as $p)
            <div class="col-md-12 mt-3">
                <div class="card">
                    <a href="#" data-toggle="modal" data-target="#modalDetailPeraturan-{{$p->id}}">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">{{$p->nomer}}</div>
                                    <div class="dept_info">{{$p->judul}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- <div class="col-md-12 mt-4">
                <div class="card">
                    <a href="#">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">Perpres No.1 Tahun
                                        2020</div>
                                    <div class="dept_info">UJI KOMPETENSI BAGI PEGAWAI NEGIRI SIPIL PADA KEMENTRIAN
                                        AGAMA</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <a href="#">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">Perpres No.1 Tahun
                                        2020</div>
                                    <div class="dept_info">UJI KOMPETENSI BAGI PEGAWAI NEGIRI SIPIL PADA KEMENTRIAN
                                        AGAMA</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <a href="#">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">Perpres No.1 Tahun
                                        2020</div>
                                    <div class="dept_info">UJI KOMPETENSI BAGI PEGAWAI NEGIRI SIPIL PADA KEMENTRIAN
                                        AGAMA</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <a href="#">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">Perpres No.1 Tahun
                                        2020</div>
                                    <div class="dept_info">UJI KOMPETENSI BAGI PEGAWAI NEGIRI SIPIL PADA KEMENTRIAN
                                        AGAMA</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-12 mt-4">
                <div class="card">
                    <a href="#">
                        <div class="card-body2" style="padding: 20px 0px 20px 0px">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <div class="dept_info" style="font-size: 14px; color: #ff2424">Perpres No.1 Tahun
                                        2020</div>
                                    <div class="dept_info">UJI KOMPETENSI BAGI PEGAWAI NEGIRI SIPIL PADA KEMENTRIAN
                                        AGAMA</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</section>
@endsection

@section('modal')
@foreach($detail_peraturan as $i)
<!-- Start Modal Detail Peraturan -->
<div class="modal fade" id="modalDetailPeraturan-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="padding: 16px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Peraturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 style="color: black">{{$i->judul}}</h5>
                <p style="color: #ff2424; font-size: 14px">{{$i->nomer}}</p>
                <table class="table table-striped table-sm" style="font-size: 15px">
                    <tbody>
                        <tr>
                            <th scope="row">Jenis Peraturan</th>
                            <td>{{$i->jenis}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Instansi</th>
                            <td>{{$i->instansi}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tgl Ditetapkan</th>
                            <td>{{$i->tgl_ditetapkan}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nomor BN</th>
                            <td>{{$i->no_bn}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nomor TBN</th>
                            <td>{{$i->no_tbn}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tgl Diundingkan</th>
                            <td>{{$i->tgl_diundingkan}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row mt-5">
                    <div class="col-2 text-center">
                        <a href="#">
                            <img src="{{url('public/plugins/frontend')}}/images/icon-pdf.png" style="width: 70%" alt="" />
                            <p>Download</p>
                        </a>
                    </div>
                    <div class="col-2 text-center">
                        <a href="#">
                            <img src="{{url('public/plugins/frontend')}}/images/icon-pdf.png" style="width: 70%" alt="" />
                            <p>Download</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- End Modal Detail Peraturan -->
@endsection