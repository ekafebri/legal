@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Report</h2>
            </div>
        </div>
        <div class="row ">
            <div class="card mx-3 mb-5 p-5" style="max-width: auto;">
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
            </div>
            <div class="card mx-3 mb-3 p-5" style="max-width: auto;">
                <div class="card-body" data-toggle="modal" data-target="#modal-report">
                    <h5 class="card-title font-weight-bold mb-0">Pembelaan Kasus Bully Versi 1</h5>
                    <p class="text-danger mb-0">29 Juli 2020</p>
                    <p class="card-text report">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="modal-report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_1.jpg" class="rounded-circle img-fluid" style="height: 100px; width: 100px;" alt="...">
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

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Pembelaan Kasus Bully Versi 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique laboriosam autem libero quae dicta dolorum corporis suscipit nesciunt at eveniet cum sequi deleniti asperiores praesentium eaque illum, numquam quibusdam nemo?</p>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Lampiran</h5>
                        <p class="card-text">
                            <div class="alert alert-danger text-danger" role="alert">
                                <i class="icon-file-text"></i>
                                <span class="col-4 ml-auto">File pembelian 1.docx</span>
                                <i class="icon-download " style="float: right;"></i>
                            </div>
                            <div class="alert alert-danger text-danger" role="alert">
                                <i class="icon-file-text"></i>
                                <span class="col-4 ml-auto">File pembelian 1.docx</span>
                                <i class="icon-download" style="float: right;"></i>
                            </div>
                            <div class="alert alert-danger text-danger" role="alert">
                                <i class="icon-file-text"></i>
                                <span class="col-4 ml-auto">File pembelian 1.docx</span>
                                <i class="icon-download" style="float: right;"></i>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection