@extends('landing.layouts.app')
@section('css')

@endsection
@section('content')
<section class="ftco-section" style="background-image: url({{URL('/')}}/public/plugins/frontend/images/bg-5.png); background-size: cover; padding-top: 120px; padding-bottom: 5;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-3s pb-6">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-1 text-white pb-4" style="color:#ff2424;">Kontak Kami</h2>
                <h5 class="mb-1 text-white" style="color:#ff2424;">Temukan Praktisi Hukum yang Tepat Hanya disini</h5>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
    <div class="container">
        <div class="row d-md-flex align-items-center justify-content-end">
            <div class="col-lg-12">
                <div class="ftco-counter-wrap">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class=" row no-gutters d-md-flex align-items-center align-items-stretch">
                            <div class="col-md-6 d-flex">
                                <div id="map" class="bg-white"></div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center counter-wrap ftco-animate" style="background-color: #fff;">
                                <div class="block-18">
                                    <h4>Kontak Kami</h4>
                                    <div class="block-21 mb-4 ml-3 d-flex">
                                        <a class="blog-img mr-2" style="background-image:url('{{url('public/plugins/frontend')}}/images/aset-bursa-hukum-web_aset-bursa-hukum-web-icon-telephone.png')"></a>
                                        <div class="text mt-3 text-left">
                                            <h3 class="heading"><a href="#">Telephone</a>
                                            </h3>
                                            <div class="meta">
                                                <div>
                                                    <p class="text-secondary">021-27659413</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-21 mb-4 ml-3 d-flex">
                                        <a class="blog-img mr-2" style="background-image:url('{{url('public/plugins/frontend')}}/images/aset-bursa-hukum-web_aset-bursa-hukum-web-icon-mail.png')"></a>
                                        <div class="text mt-3 text-left">
                                            <h3 class="heading"><a href="#">Email</a>
                                            </h3>
                                            <div class="meta">
                                                <div>
                                                    <p class="text-secondary">bursa@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-21 mb-4 ml-3 d-flex">
                                        <a class="blog-img mr-2" style="background-image:url('{{url('public/plugins/frontend')}}/images/aset-bursa-hukum-web_aset-bursa-hukum-web-icon-alamat.png')"></a>
                                        <div class="text mt-3 text-left">
                                            <h3 class="heading"><a href="#">Alamat</a>
                                            </h3>
                                            <div class="meta">
                                                <div>
                                                    <p class="text-secondary">Jl.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@endsection


