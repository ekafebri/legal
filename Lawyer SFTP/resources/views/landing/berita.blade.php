@extends('landing.layouts.app')
@section('css')
@endsection
@section('content')
<!-- Berita -->
<section class="ftco-section" style="padding-top: 100px; margin-top:30px;padding-bottom: 30px">
    <div class="container">
        <div class="row justify-content-center mb-3s pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
                <h2 class="mb-1">Berita</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 heading-section ftco-animate">
                <h5 class="mb-5"><strong>Popular News</strong></h5>
            </div>
            <div class="col-md-12 ftco-animate">
                <div class="owl-carousel carousel-berita">
                    <div class="card rounded p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="120" height="120" />
                            </div>
                            <div class="col-lg-7">
                                <div class="news-slide">
                                    <p class="mb-0">BADAN USAHA</p>
                                </div>
                                <p style="font-size: 16px">Hal penting yang seringkali dilupakan dalam membangun</p>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="images/img-artikel-2.jpg" alt="berita1" class="rounded" width="120" height="120" />
                            </div>
                            <div class="col-lg-7">
                                <div class="news-slide">
                                    <p class="mb-0">HKI</p>
                                </div>
                                <p style="font-size: 16px">GoFood X Kontrak Hukum</p>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="images/img-artikel-3.jpg" alt="berita1" class="rounded" width="120" height="120" />
                            </div>
                            <div class="col-lg-7">
                                <div class="news-slide">
                                    <p class="mb-0">HKI</p>
                                </div>
                                <p style="font-size: 16px">Kontrak Hukum Menjadi Layanan Hukum</p>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="120" height="120" />
                            </div>
                            <div class="col-lg-7">
                                <div class="news-slide">
                                    <p class="mb-0">HKI</p>
                                </div>
                                <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="project-tab">
            <div class="nav nav-tabs justify-content-center mx-5" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Berita Terbaru</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Badan Usaha</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">HKI</a>
                <a class="nav-item nav-link" id="nav-peraturan-tab" data-toggle="tab" href="#nav-peraturan" role="tab" aria-controls="nav-peraturan" aria-selected="false">Peraturan</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">HKI</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-2.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">HKI</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                                </div>
                            </div>
                        </div>
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-3.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">HKI</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">Badan Usaha</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">HKI</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-peraturan" role="tabpanel" aria-labelledby="nav-peraturan-tab">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card rounded mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <img src="images/img-artikel-1.jpg" alt="berita1" class="rounded" width="250" height="150" />
                                </div>
                                <div class="col-lg-7">
                                    <div class="news-slide">
                                        <p class="mb-0">Pendaftaran</p>
                                    </div>
                                    <p style="font-size: 16px">Keuntungan Mendaftar Merek</p>
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
