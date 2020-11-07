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
    <div class="container ">
        <div class="row justify-content-center pb-3">
            <div class="col-md-6 heading-section text-center ftco-animate">
                <h2 class="mb-5">Report</h2>
            </div>
        </div>

        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a href="" data-toggle="modal" data-target="#exampleModal">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="width: 70rem;">
                        <div class="card-body">
                            <h4 class="card-title">Pembelaan Kasus Bully Versi 1</h4>
                            <h6 class="card-subtitle mb-2 text-danger">20 Agustus 2020</h6>
                            <p class="card-text text-body mb-3">Lorem ipsum dolor sit amet consectetur
                                adipisicing
                                elit.
                                Commodi
                                delectus odit quas facilis, in eveniet fuga placeat quisquam fugiat. Nobis,
                                debitis
                                consectetur labore veniam alias voluptate dolor quod qui quasi!</p>
                            <a href="detail.html">
                                <i class="icon-file"></i>
                                <span></span>
                            </a>
                            <a href="detail.html">
                                <i class="icon-download"></i>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a href="" data-toggle="modal" data-target="#exampleModal">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="width: 70rem;">
                        <div class="card-body">
                            <h4 class="card-title">Pembelaan Kasus Bully Versi 1</h4>
                            <h6 class="card-subtitle mb-2 text-danger">20 Agustus 2020</h6>
                            <p class="card-text text-body mb-3">Lorem ipsum dolor sit amet consectetur
                                adipisicing
                                elit.
                                Commodi
                                delectus odit quas facilis, in eveniet fuga placeat quisquam fugiat. Nobis,
                                debitis
                                consectetur labore veniam alias voluptate dolor quod qui quasi!</p>
                            <a href="detail.html">
                                <i class="icon-file"></i>
                                <span></span>
                            </a>
                            <a href="detail.html">
                                <i class="icon-download"></i>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row justify-content-center pb-3">
            <div class="col-md-5 col-lg-12">
                <a href="" data-toggle="modal" data-target="#exampleModal">
                    <div class="card mx-auto shadow p-0 mb-2 bg-white rounded" style="width: 70rem;">
                        <div class="card-body">
                            <h4 class="card-title">Pembelaan Kasus Bully Versi 1</h4>
                            <h6 class="card-subtitle mb-2 text-danger">20 Agustus 2020</h6>
                            <p class="card-text text-body mb-3">Lorem ipsum dolor sit amet consectetur
                                adipisicing
                                elit.
                                Commodi
                                delectus odit quas facilis, in eveniet fuga placeat quisquam fugiat. Nobis,
                                debitis
                                consectetur labore veniam alias voluptate dolor quod qui quasi!</p>
                            <a href="detail.html">
                                <i class="icon-file"></i>
                                <span></span>
                            </a>
                            <a href="detail.html">
                                <i class="icon-download"></i>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection

@section('modal')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row no-gutters">
                        <div class="row justify-content-around card-body">
                            <div class="col mx-auto my-auto">
                                <img src="{{url('public/plugins/frontend')}}/images/person_2.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Andira Pramanta</h5>
                                    <p class="card-text"><small class="text-muted">20 Agustus 2020 15.00 WIB</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: auto;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Pembelaan Kasus Bully Versi 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                            laboriosam autem libero quae dicta dolorum corporis suscipit nesciunt at eveniet cum
                            sequi deleniti asperiores praesentium eaque illum, numquam quibusdam nemo?</p>
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
                            <div class="alert alert-danger" role="alert">
                                <i class="icon-file-text"></i>
                                <span class="col-md-3 ml-auto">File pembelian 1.docx</span>
                                <i class="icon-download" style="float: right;"></i>
                            </div>
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
@endsection
@section('js')
@endsection