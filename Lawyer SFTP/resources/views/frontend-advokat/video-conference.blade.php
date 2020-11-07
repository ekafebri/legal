@extends('frontend-advokat.layouts.app-putih')

@section('css')
@endsection

@section('content')
<!-- content -->
<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-10 text-center ftco-animate">
                <h2 class="pb-3 font-weight-bold">Video Conference</h2>
            </div>
        </div>
        <a href="{{url('advokat/video-conference/detail')}}">
            <div class="card mx-auto  p-3 mt-4 mb-5  " style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm">
                            <div class="row justify-content-center">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg"
                                    class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                <p class="text-info">Menunggu Lawyer</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 my-auto ">
                            <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Video Conference Pertanahan</p>
                        </div>
                    </div>
                </div>

            </div>
        </a>
        <a href="{{url('advokat/video-conference/detail')}}">
            <div class="card mx-auto  p-3 mt-4 mb-5" style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm">
                            <div class="row justify-content-center">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg"
                                    class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                <p class="text-info">Sudah Bayar</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3  my-auto ">
                            <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Video Conference Pertanahan</p>
                        </div>
                    </div>
                </div>

            </div>
        </a>
        <a href="video-detail-sudah.html">
            <div class="card mx-auto  p-3 mt-4 mb-5" style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="row card-body py-0">
                        <div class="col-lg col-md col-sm">
                            <div class="row justify-content-center">
                                <img src="{{url('public/plugins/fronted-advokat')}}/images/person_4.jpg"
                                    class="rounded-circle img-fluid" style="height: 5rem; width: 5rem;" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6  pl-0">
                            <div class="card-body pb-0">
                                <h5 class="card-title mb-0 font-weight-bold">Freza Ade</h5>
                                <p class="text-info">Sudah Bayar</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3  my-auto ">
                            <small class="text-muted d-flex justify-content-end ">1 Agustus 2020</small>
                        </div>
                        <div class="row card-body pb-0">
                            <p class="m-0 text-dark pl-2">Video Conference Pertanahan</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
@endsection


@section('modal')
@endsection


@section('js')
@endsection